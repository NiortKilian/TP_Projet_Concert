<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Entity\Band;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BandController extends AbstractController
{
    /**
     * @Route("/band", name="band")
     */
    public function index(): Response
    {
        return $this->render('band/index.html.twig', [
            'controller_name' => 'BandController',
        ]);
    }
    /**
     * @Route("/bands", name="bands_list")
     */
    public function listAction(): Response
    {
        $bandRepo = $this->getDoctrine()->getRepository(Band::class);
        $band = $bandRepo->findAll();
        return $this->render('band/list.html.twig', [
            'controller_name' => 'BandController',
            'bands' => $band,
        ]);
    }

    /**
     * @Route(/bands/{id} name="band_show")
     */
    public function showAction(): Response
    {
        $artistRepo = $this->getDoctrine()->getRepository(Artist::class);
        $artist = $artistRepo->findAll();
        return $this->render('band/show.html.twig',[
           'controller-name' => 'BandController',
           'artists' => $artist,
        ]);
    }
}
