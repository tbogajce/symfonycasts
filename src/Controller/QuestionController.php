<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
{
    /**
     * @Route("/")
     */
    public function homepage() {
        return new Response('This is the response');
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function show($slug) {
        return new Response(sprintf(
            'This is how slug "%s" can be shown',
            ucwords(str_replace('-', ' ', $slug))
        ));
    }

}