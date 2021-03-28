<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, LoginFormAuthenticator $authenticator,  EntityManagerInterface $manager): Response
    {
        // instance of user
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);
        

       if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            
            var_dump($user);
            $user->setRole(0);
            $hash = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);
            $manager->flush();
            
            return $this->redirectToRoute("showcase_home");
       }

        
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
