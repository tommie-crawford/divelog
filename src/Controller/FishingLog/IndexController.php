<?php

namespace App\Controller\FishingLog;

use App\Repository\FishingLogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/vissen/overzicht', name: 'vissen_overzicht')]
    public function dashboard(FishingLogRepository $fishingLogRepository): Response
    {
        $catches = $fishingLogRepository->findBy([], ['date' => 'DESC']);

        return $this->render('/fishinglog/dashboard.html.twig', ['catches' => $catches]);
    }
}
