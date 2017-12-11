<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FOSRestController
{
    /**
     * @Rest\Get("/default")
     */
    public function indexAction(Request $request)
    {
        $data = ['hello' => 'world default'];
        $view = $this->view($data, Response::HTTP_OK);
        return $view;
    }

    /**
     * @Rest\Get("/default/users")
     */
    public function usersAction(Request $request)
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/login_check',
            array(
                '_username' => 'r.lambot',
                '_password' => 'Rootroot9',
            )
        );

        $data = json_decode($client->getResponse()->getContent(), true);

        $client = static::createClient();
        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $data['token']));

        var_dump($client->request('GET', '/api/users'));
    }
}
