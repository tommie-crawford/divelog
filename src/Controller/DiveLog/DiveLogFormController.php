<?php

namespace App\Controller\DiveLog;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
Use App\Entity\DiveLog;
use App\Form\DiveLogType;
use App\Service\DiveLogManager;

class DiveLogFormController extends AbstractController
{
    #[Route('/divelog/new', name: 'app_divelog_new')]
    public function new(Request $request, DiveLogManager $manager): Response
    {
        $divelog = new DiveLog();

        $form = $this->createForm(DiveLogType::class, $divelog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->save($divelog);

            $this->addFlash('success', 'Dive saved!');

            return $this->redirectToRoute('dashboard');
        }

        return $this->render('divelog/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

//    #[Route('/divelog/{id}/edit', name: 'app_divelog_edit')]
//    public function edit(Divelog $divelog, Request $request, EntityManagerInterface $em): Response
//    {
//        $form = $this->createForm(DivelogType::class, $divelog);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em->flush(); // entity is already managed
//
//            $this->addFlash('success', 'Dive updated!');
//
//            return $this->redirectToRoute('app_divelog_edit', ['id' => $divelog->getId()]);
//        }
//
//        return $this->render('divelog/edit.html.twig', [
//            'form' => $form->createView(),
//            'divelog' => $divelog,
//        ]);
//    }
}
