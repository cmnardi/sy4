<?php

namespace App\Nardi\ControlBundle\Controller;

use App\Nardi\ControlBundle\Entity\Category;
use Doctrine\Common\Collections\Criteria;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
//use FOS\RestBundle\Controller\Annotations\Get;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializationContext;


class CategoryController extends FOSRestController
{
    /**
     * @Rest\Get("")
     * @Rest\View()
     * @param Request $request
     * @Route("/category", name="category")
     */
    public function categoryIndexAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findBy(
                ['idCategory'=>null],
                ['name' => 'ASC']
            )
        ;

        $serializer = SerializerBuilder::create()
            ->build()
        ;
        return new Response(
            $serializer->serialize(
                $categories,
                'json',
                SerializationContext::create()
            ),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * @Rest\Get("/{c}")
     * @param $id
     * @return mixed
     */
    public function getCategoryAction(Category $c)
    {
        $serializer = SerializerBuilder::create()
            ->build()
        ;
        return new Response(
            $serializer->serialize(
                $c,
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
     * @Rest\Get("/sub/{id_parent}")
     * @Rest\View()
     * @param Request $request
     * @Route("/category", name="category")
     */
    public function subCategoryAction($id_parent)
    {
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findBy(
                ['idCategory' => $id_parent],
                ['name' => 'ASC']
            )
        ;

        $serializer = SerializerBuilder::create()
            ->build()
        ;
        return new Response(
            $serializer->serialize(
                $categories,
                'json',
                SerializationContext::create()
            ),
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }
}
