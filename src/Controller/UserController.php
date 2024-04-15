<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/inscription.html', name: 'user_register', methods: ['GET','POST'], priority: 10 )]
    public function register(): \Symfony\Component\HttpFoundation\Response
    {
        # 1. Création de mon utilisateur
        $user = new User();
        $user->setRoles(['ROLE_USER']);

        # 2. Création de mon formulaire
        $form = $this->createForm(UserType::class, $user);

        # 3. Passage de mon formulaire à la vue
        return $this->render('user/register.html.twig', [
            'form' => $form
        ]);
    }
}