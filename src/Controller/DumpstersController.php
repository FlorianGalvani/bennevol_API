<?php

namespace App\Controller;

use App\Entity\Cities;
use App\Repository\CitiesRepository;

use App\Entity\Dumpsters;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DumpstersController extends AbstractController
{
    #[Route('/api/dumpsters/{name}', name: 'dumpsters_ByCity')]
    public function getDumpstersByCity(CitiesRepository $citiesRepository, string $name): JsonResponse
    {
        $repo = $citiesRepository->findOneBy(['name' => $name])->getDumpsters();
        $dumpsters = array();
        foreach ($repo as $data) {
            $dumpsters[] = array(
                'id' => $data->getId(),
                'lat' => $data->getLat(),
                'lng' => $data->getLng(),
                'ville' => $name
            );
        }

        return new JsonResponse($dumpsters);
    }
}
