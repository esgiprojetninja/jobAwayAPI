<?php

namespace AppBundle\Action;

use AppBundle\Entity\Accommodation;
use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AccommodationCreate
{

    protected $em;

    public function __construct(EntityManager $em, ValidatorInterface $validator)
    {
        $this->em = $em;
        $this->validator = $validator;
    }

    /**
     * @Route(
     *     name="acommodation_add",
     *     path="/api/accommodation/add",
     *     defaults={"_api_resource_class"=User::class, "_api_collection_operation_name"="accommodation_add"}
     * )
     * @Method("POST")
     * @param Request $request
     * @return User|JsonResponse|Response
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function __invoke(Request $request)
    {
        $user = new Accommodation();
        $user->setHost($request->request->get('host'));
        $user->setTitle($request->request->get('title'));
        $user->setDescription($request->request->get('description'));
        $user->setPictures($request->request->get('pictures'));

        $user->setCity($request->request->get('city'));
        $user->setRegion($request->request->get('region'));
        $user->setCountry($request->request->get('country'));
        $user->setAddress($request->request->get('address'));
        $user->setLongitude($request->request->get('longitude'));
        $user->setLatitude($request->request->get('latitude'));

        $user->setNbBedroom($request->request->get('nbBedroom'));
        $user->setNbToilet($request->request->get('nbBedroom'));
        $user->setNbMaxBaby($request->request->get('nbBedroom'));
        $user->setNbMaxGuest($request->request->get('nbBedroom'));
        $user->setNbMaxAdult($request->request->get('nbBedroom'));
        $user->setAnimalsAllowed($request->request->get('animalsAllowed'));
        $user->setSmokersAllowed($request->request->get('smokersAllowed'));
        $user->setHasInternet($request->request->get('hasInternet'));

        $user->setPropertySize($request->request->get('hasInternet'));
        $user->setFloor($request->request->get('hasInternet'));
        $user->setMinStay($request->request->get('hasInternet'));
        $user->setMaxStay($request->request->get('hasInternet'));
        $user->setType($request->request->get('hasInternet'));
        $user->setCheckinHour($request->request->get('hasInternet'));
        $user->setCheckoutHour($request->request->get('hasInternet'));
        $user->setCreatedAt(date('m/d/Y h:i:s a', time()));

        $errors = $this->validator->validate($accommodation);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new JsonResponse($errorsString);
        }

        $this->em->persist($accommodation);
        $this->em->flush();

        return $accommodation;
    }
}
