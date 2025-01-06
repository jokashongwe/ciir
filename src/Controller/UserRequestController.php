<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserRequestController extends AbstractController
{
    #[Route('/user/request', name: 'app_user_request')]
    public function index(): Response
    {
        return $this->render('user_request/index.html.twig', [
            'controller_name' => 'UserRequestController',
        ]);
    }
}
