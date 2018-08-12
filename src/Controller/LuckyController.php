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
     * @Route("/welcome", name="app_welcome")
	*/
    public function welcome()
    {
        return new Response('Welcome to first page');
	}

    /**
     * @Route("/slug/{slug}")
     */
    public function article($slug= 'hello')
    {

        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!'.$slug,
            'Woohoo! I m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        //dump($slug, $this);
        return $this->render('article/show.html.twig',[
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
        ]);


    }
    /**
     * @Route("/practice/extend", name="app_extend")
     */
    public function twig(){
        return $this->render('extend.html.twig');
    }

    /**
     * @Route("/practice/include", name="app_include")
     */
    public function twigme(){
        return $this->render('article/inlcude.html.twig');
    }

    /**
     * @Route("/home", name="app_home")
     */
    public function home(){
        return $this->render('article/home.html.twig');
    }
}
?>