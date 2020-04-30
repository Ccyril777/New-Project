<?php

namespace App\Controller;

use App\Entity\SystemInformation;
use App\Form\SystemInformationType;
use App\Repository\SystemInformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Confidentialite;
use App\Entity\ConfidentialiteRepository;
use App\Entity\Domaine;
use App\Entity\DomaineRepository;
use App\Entity\TypologyMI;
use App\Entity\TypologyMIRepository;

/**
 * @Route("/system/information")
 */
class SystemInformationController extends AbstractController
{
    /**
     * @Route("/", name="system_information_index", methods={"GET"})
     */
    public function index(SystemInformationRepository $systemInformationRepository): Response
    {
        return $this->render('system_information/index.html.twig', [
            'system_informations' => $systemInformationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="system_information_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $systemInformation = new SystemInformation();
        $form = $this->createForm(SystemInformationType::class, $systemInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($systemInformation);
            $entityManager->flush();

            return $this->redirectToRoute('system_information_index');
        }

        return $this->render('system_information/new.html.twig', [
            'system_information' => $systemInformation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="system_information_show", methods={"GET"})
     */
    public function show(SystemInformation $systemInformation): Response
    {
        return $this->render('system_information/show.html.twig', [
            'system_information' => $systemInformation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="system_information_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SystemInformation $systemInformation): Response
    {
        $form = $this->createForm(SystemInformationType::class, $systemInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('system_information_index');
        }

        return $this->render('system_information/edit.html.twig', [
            'system_information' => $systemInformation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="system_information_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SystemInformation $systemInformation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$systemInformation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($systemInformation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('system_information_index');
    }
}
