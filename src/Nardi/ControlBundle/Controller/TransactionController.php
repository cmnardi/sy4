<?php

namespace App\Nardi\ControlBundle\Controller;

use App\Nardi\ControlBundle\Entity\Transaction;


use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializationContext;


class TransactionController extends FOSRestController
{

    /**
     * @Rest\Get("")
     * @Rest\View()
     */
    public function transactionIndexAction()
    {

        $transactions = $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findAll()
        ;
        $serializer = SerializerBuilder::create()
            ->build()
        ;
        return new Response(
            $serializer->serialize(
                $transactions,
                'json',
                SerializationContext::create()
            ),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
        $view = $this->view($categories, 200);
        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/category/{id_category}")
     * @Rest\View()
     */
    public function transactionCategoryAction($id_category)
    {
        $transactions = $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findByCategory($id_category)
        ;
        $serializer = SerializerBuilder::create()
            ->build()
        ;
        return new Response(
            $serializer->serialize(
                $transactions,
                'json',
                SerializationContext::create()
            ),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
        $view = $this->view($categories, 200);
        return $this->handleView($view);
    }

    /**
     *
     * @Rest\Get("/date/{year}/{month}")
     * @Rest\View
     * @param $year
     * @param $month
     */
    public function transactionMonthAction($year,$month)
    {
        $transactions = $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->findByMonth($year, $month)
            ->getResult()
            ;
        //return new JsonResponse($transactions, 200);
        $serializer = SerializerBuilder::create()
            ->build()
        ;
        return new Response(
            $serializer->serialize(
                $transactions,
                'json',
                SerializationContext::create()
            ),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }
}