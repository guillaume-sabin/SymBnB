<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/hello/{name}", name="hello")
     * Show Hello page
     *
     * @return void
     */
    public function hello($name = '')
    {

        return new Response("coucou " . $name);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render(
            'home.html.twig',
            [
                'title' => '/home'
            ]
        );
    }
}