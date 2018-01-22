<?php

namespace AppBundle\Action;

use AppBundle\Entity\Mission;
use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class MissionSearch
{

    protected $em;

    public function __construct(EntityManager $em, ValidatorInterface $validator)
    {
        $this->em = $em;
        $this->validator = $validator;
    }

    /**
     * @Route(
     *     name="mission_search",
     *     path="/api/missions",
     *     defaults={"_api_resource_class"=Mission::class, "_api_collection_operation_name"="mission_search"}
     * )
     * @Method("POST")
     * @param Request $request
     * @return User|JsonResponse|Response
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function __invoke(Request $request)
    {
        $mission = new Mission();

        $errors = $this->validator->validate($mission);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new JsonResponse($errorsString);
        }

        $this->em->persist($mission);
        $this->em->flush();

        return $mission;
    }
}
