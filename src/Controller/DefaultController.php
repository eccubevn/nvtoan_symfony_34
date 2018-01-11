<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 1/5/2018
 * Time: 3:17 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(){
        $number = mt_rand(10000000000, 999999999999999);

        return $this->render('lucky/index.html.twig', array(
            'number' => $number,
        ));
    }
}