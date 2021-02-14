<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function show(Environment $twig, Request $request, EntityManagerInterface $entityManager)
    {
       $user = new User();
       $form= $this->createForm(UserFormType::class,$user);

       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
          $agreeTerms = $form->get('agreeTerms')->getData();
         // dd($agreeTerms);
          $entityManager->persist($user);
          $entityManager->flush();
          return new Response('User is created where user number is '.$user->getId());
       }

       return new Response($twig->render('user/index.html.twig',[
           'user_form' => $form->createView()
       ]));
    }
}
