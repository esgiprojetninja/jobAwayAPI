<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends FOSRestController
{
    /**
     * @Rest\Get("/api")
     */
    public function indexAction(Request $request)
    {
        $data = ['hello' => 'api world route get'];
        $view = $this->view($data, Response::HTTP_OK);
        return $view;
    }
}
