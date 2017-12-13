<?php

namespace AppBundle\Action;

use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserSubscribe
{

    protected $em;

    public function __construct(EntityManager $em, ValidatorInterface $validator)
    {
        $this->em = $em;
        $this->validator = $validator;
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
        if(strlen($request->request->get('password')) < 6 ||  strlen($request->request->get('password')) > 20) {
            return new Response('Password should be 6-20 ');
        }

        if($request->request->get('password') != $request->request->get('confirm_password')) {
            return new Response('Passwords are different');
        }


        $user = new User();
        $user->setUsername($request->request->get('username'));
        $user->setEmail($request->request->get('email'));
        $user->setFirstName($request->request->get('first_name'));
        $user->setLastName($request->request->get('last_name'));
        $user->setLanguages($request->request->get('languages'));
        $user->setSkills($request->request->get('skills'));
        $user->setPassword($request->request->get('password'));

        $errors = $this->validator->validate($user);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $this->em->persist($user);
        $this->em->flush();

        return new Response('You just subscribed!');
    }
}