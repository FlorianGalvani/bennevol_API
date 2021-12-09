<?php

namespace App\Controller;

use App\Entity\Report;
use App\Form\ReportType;
use App\Repository\ReportRepository;
use App\Repository\DumpstersRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;



class ReportController extends AbstractController
{

    
       /**
     * @Route("/api/report/{id}", name="report_new")
     */ 
    public function new(Request $request, EntityManagerInterface $entityManager,DumpstersRepository $dumpstersRepository,int $id): JsonResponse
    {
        $success = false;

        $dumpster = $dumpstersRepository->find($id);
        $data = json_decode($request->getContent(),true);
        $data['dumpsters'] = $dumpster;
        //TODO: Verification des donnÃ©es
        $report = new Report();
        $report->getDumpster($data['dumpsters']);
        $report->setType($data['type'])
        ->setInformation($data['information'])
        ->setDumpster($data['dumpsters']);

        $entityManager->persist($report);
        $entityManager->flush();

        return new JsonResponse(['success' => $success]);
    }
}