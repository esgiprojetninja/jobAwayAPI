<?php

namespace AppBundle\Action;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

class UserDelete
{

    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @Route(
     *     name="safe_user_delete",
     *     path="/api/users/{id}",
     *     defaults={"_api_resource_class"=User::class, "_api_item_operation_name"="safe_user_delete"}
     * )
     * @Method("DELETE")
     */
    public function __invoke(User $user)
    {
        $user->setIsActive(false);

        $this->em->persist($user);
        $this->em->flush();

        return new Response('User '.$user->getUsername().' is no longer active!');
    }
}