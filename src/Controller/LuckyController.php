<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class LuckyController
{
    public function number(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
     /**
     * @Route("/questions/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            // 'Future page to show the question "%s"!',
            // $slug,
            ucwords(str_replace('-', ' ', $slug))
        ));
    }
      

}