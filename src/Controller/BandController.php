<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BandController extends AbstractController
{
    /**
     * @Route("/concert", name="concert")
     */
    public function indexAction(): Response
    {
        return $this->render('concert/index.html.twig', [
            'controller_name' => 'Licence APIDAE',
        ]);
    }

    public function listAction(): Response
    {
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
            'groupes' => ['Muse','Pink Floyd','Queen'],
        ]);
    }
}
