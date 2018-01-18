<?php

namespace AppBundle\Action;

use AppBundle\Entity\GuardCode;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class GuardCodeCreate
{
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @Route(
     *     name="create_guard",
     *     path="/api/guard_code/create",
     *     defaults={"_api_resource_class"=GuardCode::class, "_api_collection_operation_name"="create"}
     * )
     * @Method("POST")
     */
    public function __invoke()
    {
        $code = new GuardCode();
        $this->tokenStorage->getToken()->getUser();
        $code->setUSer($this->tokenStorage->getToken()->getUser());
        return $code;
    }
}