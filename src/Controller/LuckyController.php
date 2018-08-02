<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

 use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LuckyController
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
     * @Route("/show/article/{article_name}")
	*/
    public function article($article_name)
    {
        return new Response('Future page to show the article: '.
            $article_name);
	}
	//http://localhost:8000/show/article/ploitics   the article name will come from db
}
?>