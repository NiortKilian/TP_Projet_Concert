<?php

namespace App\Controller;

use App\Entity\Concert;
use App\Entity\Member;
use App\Form\ConcertType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('concert/index.html.twig', [
            'controller_name' => 'ConcertController'
        ]);
    }


    /**
     * Affiche une liste de concerts
     *
     * @return Response
     *
     * @Route("/concerts", name="list_concerts")
     */
    public function list(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Concert::class);

        try{
            $results = $repository->findAll();
        }
        catch(\Exception $e)
        {
            dump($e); die;
        }

        return $this->render('concert/list.html.twig', [
            'concerts' => $results
            ]
        );
    }

    /**
     * Crée un nouveau concert
     *
     * @Route("/concert/create", name="concert_create")
     *
     */
    public function createConcert(Request $request): Response
    {
        $concert = new Concert();

        $form = $this->createForm(ConcertType::class, $concert);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $concert = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($concert);
             $entityManager->flush();

            $this->addFlash('success', 'Concert crée! Music is power!');
            return $this->redirectToRoute('homepage');
        }

        return $this->render('concert/new.html.twig', [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * Update un concert
     *
     * @Route("/concert/edit/{id}", name="concert_edit")
     *
     */
    public function editConcert(Request $request, Concert $concert): Response
    {
        $form = $this->createForm(ConcertType::class, $concert);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $show = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($concert);
            $entityManager->flush();

            $this->addFlash('success', 'Concert update! Music is power!');
            return $this->redirectToRoute('list_concerts');
        }

        return $this->render('concert/new.html.twig', [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @param Concert $concert
     *
     * @Route("/delete/{id}", name="concert_delete")
     */
    public function delete(Request $request, Concert $concert): Response
    {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($concert);
                $entityManager->flush();

            return $this->redirectToRoute('list_concerts');
    }
}
