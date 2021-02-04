<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class SignupController extends AbstractController
{
    /**
     * @Route("/}")
     */
    public function index(Environment  $twig_env){
        $html = $twig_env->render('signup/index.html.twig');
        return new Response($html);
    }

    /**
     * @Route("/sign/{slug}")
     */


    public function show1($slug)
    {
        $answers = [
            'hello 1 ',
            'hello 2',
            'hello 3',
        ];
        //dump($slug, $this);
        return $this->render('signup/index.html.twig', [
            'controller_name' => 'SignupController',
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers,
        ]);
        
    }
}
