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


}
?>