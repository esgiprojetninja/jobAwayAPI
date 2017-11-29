<?php

namespace AppBundle\Action;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

class UserDelete
{
    /**
     * @Route(
     *     name="user_delete",
     *     path="/api/users/{id}",
     *     defaults={"_api_resource_class"=User::class, "_api_item_operation_name"="specialUserDelete"}
     * )
     * @Method("DELETE")
     */
    public function __invoke(User $user)
    {

        //$this->myService->doSomething($data);
        var_dump($user);
        die();
        return $data;
    }
}