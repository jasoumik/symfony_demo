<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comments/{id}/vote/{direction<up|down>}", methods="POST")
     */
    public function commentOnAnswers($id, $direction, LoggerInterface $logger)
    {
        // todo - use id to query the database
        // use real logic here to save this to the database
        if ($direction === 'up') {
            $logger->info('voting up');
            $currentVoteCount = rand(10, 20);
        } else {
            $logger->info('voting down');
            $currentVoteCount = rand(0, 5);
        }
       // return new JsonResponse(['votes' => $currentVoteCount]);
        return $this->json(['votes' => $currentVoteCount]);
    }
}
