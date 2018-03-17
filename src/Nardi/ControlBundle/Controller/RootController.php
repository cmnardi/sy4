<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 20/02/18
 * Time: 06:42
 */

namespace App\Nardi\ControlBundle\Controller;

use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializationContext;

class RootController
{

    public function indexAction()
    {
        $serializer = SerializerBuilder::create()
            ->build()
        ;
        return new Response(
            $serializer->serialize(
                ['ok'],
                'json',
                SerializationContext::create()
            ),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
        $view = $this->view($categories, 200);
        return $this->handleView($view);
    }
}