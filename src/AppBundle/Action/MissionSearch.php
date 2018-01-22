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

class MissionSearch
{

    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @Route(
     *     name="mission_search",
     *     path="/api/missions/search",
     *     defaults={"_api_resource_class"=Mission::class, "_api_collection_operation_name"="mission_search"}
     * )
     * @Method("GET")
     * @param Request $request
     * @return Mission|JsonResponse|Response
     * @throws \Doctrine\ORM\OptimisticLockException
     */

    public function __invoke(Request $request)
    {
        $missionsByCity = $this->em
            ->getRepository('AppBundle:Accommodation')
            ->createQueryBuilder('a')
            ->join('a.mission', 'm')
            ->where('a.city LIKE :query OR a.country LIKE :query')
            ->setParameter('query', '%'.$request->request->get('q').'%')
            ->getQuery()
            ->getResult();

        return $missionsByCity;
    }
}
