<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage() {
        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     */
    public function show($slug) {

        $answers = [
          'Answer 1',
          'Answer 2',
          'Answer 3',
        ];

        // dump for profiler (once debug package pack is installed)
        dump($this);

        // render method is part of AbstractController
        // 1st param is the template, 2nd is array of variables we want to pass
        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers
        ]);
        
    }

}