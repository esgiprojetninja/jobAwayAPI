<?php

namespace AppBundle\Action;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class UserSubscribe
{

    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @Route(
     *     name="user_add",
     *     path="/api/users/",
     *     defaults={"_api_resource_class"=User::class, "_api_item_operation_name"="user_add"}
     * )
     * @Method("POST")
     */
    public function __invoke($data)
    {
       /* var_dump($data);
        $user = new User();
        $username = $this->get('request')->request->get('username');
        var_dump($username);
        die();
        $user->setUsername($username);

        $this->em->persist($user);
        $this->em->flush();

        var_dump($user);*/

        return new Response('You just subscribed!');
    }
}