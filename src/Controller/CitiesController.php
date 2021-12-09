<?php

namespace App\Controller;

use App\Entity\Cities;
use App\Repository\CitiesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CitiesController extends AbstractController
{   
    /**
     * @Route("/api/cities", name="cities")
     */ 
    public function getCities(CitiesRepository $citiesRepository): JsonResponse
    {
        $repo = $citiesRepository->findAll();
        $cities = array();
        foreach ($repo as $data) {
            $cities[] = $data->getName();
        }

        return new JsonResponse($cities);
    }
}
