<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 1/5/2018
 * Time: 11:48 AM
 */

namespace App\Controller;


use App\Entity\User;
use App\Form\LoginForm;
use App\Form\Type\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class UserController
 */
class UserController extends Controller
{

    /**
     * @Route("/user/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils, Session $session)
    {
        $form = $this->createForm(\App\Form\Type\LoginForm::class);
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('user/login.html.twig', array(
            'form' => $form->createView(),
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

    /**
     * @Route("/user/register", name="user_register")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $user->setGender(0);

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('login');
        }

        return $this->render('user/register.html.twig', array(
            'form' => $form->createView()
        ));
    }
}