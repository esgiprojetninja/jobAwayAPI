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
    public function __invoke($data)
    {

        //$this->myService->doSomething($data);
        var_dump($data);
        die();
        return $data;
    }
}