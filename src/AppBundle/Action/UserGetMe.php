<?php

namespace AppBundle\Action;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use AppBundle\Entity\User;


class UserGetMe
{
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @Route(
     *     name="get_me",
     *     path="/api/users/me.json",
     *     defaults={"_api_resource_class"=User::class, "_api_collection_operation_name"="me"}
     * )
     * @Method("GET")
     */
    public function __invoke()
    {
        $user = $this->tokenStorage->getToken()->getUser();
        return $user;
    }
}