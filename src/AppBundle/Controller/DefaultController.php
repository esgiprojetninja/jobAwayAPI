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
     * @Rest\Get("/api/getLocationList" , name="get_cities")
     */
    public function getLocationListAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("select city, country from accommodation where city like :query or country like :query");
        $statement->bindValue('query', '%'.$request->query->get('q').'%');
        $statement->execute();
        $results = $statement->fetchAll();

        $return = [];
        foreach($results as $values){
            $return["cities"][] = $values['city'];
            $return["countries"][] = $values['country'];
        }
        $return['countries'] = array_unique($return['countries']);
        $return['cities'] = array_unique($return['cities']);

        $response = new Response(json_encode($return));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
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
