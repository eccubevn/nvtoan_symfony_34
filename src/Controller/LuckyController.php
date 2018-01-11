<?php
/**
 * Created by PhpStorm.
 * User: HP570
 * Date: 1/5/2018
 * Time: 11:48 AM
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LuckyController
 */
class LuckyController
{

    /**
     * @Route("/lucky/number", name="lucky")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}