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
     *     path="/api/users/add",
     *     defaults={"_api_resource_class"=User::class, "_api_collection_operation_name"="list"}
     * )
     * @Method("POST")
     */
    public function __invoke(Request $request)
    {
        $user = new User();
        $user->setUsername($request->request->get('username'));
        $user->setEmail($request->request->get('email'));
        $user->setFirstName($request->request->get('first_name'));
        $user->setLastName($request->request->get('last_name'));
        $user->setLanguages($request->request->get('languages'));
        $user->setSkills($request->request->get('skills'));
        $user->setPassword($request->request->get('password'));

        $this->em->persist($user);
        $this->em->flush();

        var_dump($user);

        return new Response('You just subscribed!');
    }
}