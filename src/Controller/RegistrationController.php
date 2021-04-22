<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="registration")
     */
    public function register(): Response
    {
        $form = $this ->createFormBuilder()
        ->add('username')
//         ->add('password',RepeatedType::class, [
//         'type' =>PasswordType::class,
//         'required' => true,
//         'first_options' => ['label' =>'Password'],
//         'second_options' => ['label' =>'Confirm Password']
//         ])
//         ->add('register',SubmitType::class, [
//             'attr' => [
//                 'class' => 'btn btn-success float-right'
//             ]
//
//         ])
        ->getForm();

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView()


        ]);
    }
}
