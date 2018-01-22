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
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("SELECT * FROM mission
                                                    inner JOIN accommodation ON mission.accommodation = accommodation.id
                                                    WHERE accommodation.city LIKE :query OR accommodation.country LIKE :query");
        $statement->bindValue('query', '%'.$request->query->get('q').'%');
        $statement->execute();
        $missionsByCity = $statement->fetchAll();

        return $missionsByCity;
    }
}
