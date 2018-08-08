<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

 use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{

    /**
     * @Route("/")
	*/
    public function homepage()
    {
        return new Response('This is homepage');
	}

	/**
     * @Route("/welcome")
	*/
    public function welcome()
    {
        return new Response('Welcome to first page');
	}

    /**
     * @Route("/news/{slug}")
     */
    public function article($article_name= 'hello')
    {

        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!'.$article_name,
            'Woohoo! I m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        return $this->render('article/show.html.twig',[
            'title' => ucwords(str_replace('-', ' ', $article_name)),
            'comments' => $comments,
        ]);

    }
    /**
     * @Route("/practice/extend")
     */
    public function twig(){
        return $this->render('article/extend.html.twig');
    }

    /**
     * @Route("/practice/example")
     */
    public function twigme(){
        return $this->render('article/example.html.twig');
    }
}
?>