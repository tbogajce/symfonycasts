<?php

namespace App\Controller;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(Environment $twig) {

        // example of using Twig service manually
        // $html = $twig->render('question/homepage.html.twig');
        // return new Response($html);

        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     */
    public function show($slug, MarkdownParserInterface $markdownParser) {

        $answers = [
          '`Answer 1`',
          'Answer 2',
          'Answer 3',
        ];

        $questionText = "I've been turned into a cat, any thoughts on how to turn back? While I'm **adorable**, I don't really care for cat food.";
        $parsedQuestionText = $markdownParser->transformMarkdown($questionText);
        // dump for profiler (once debug package pack is installed)
        dump($this);

        // render method is part of AbstractController
        // 1st param is the template, 2nd is array of variables we want to pass
        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers,
            'questionText' => $parsedQuestionText,
        ]);
        
    }

}