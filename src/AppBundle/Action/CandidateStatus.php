<?php

namespace AppBundle\Action;

use AppBundle\Entity\Candidate;
use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class CandidateStatus
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @Route(
     *     name="candidates_status",
     *     path="/api/candidates/status",
     *     defaults={"_api_resource_class"=Candidate::class, "_api_collection_operation_name"="candidates_status"}
     * )
     * @Method("GET")
     * @param Request $request
     * @return Candidate|JsonResponse|Response
     * @throws \Doctrine\ORM\OptimisticLockException
     */

    public function __invoke(Request $request)
    {

        $connection = $this->em->getConnection();
        if($request->query->has('status')){
            if(strtoupper($request->query->get('status')) == "ALL"){
                $statement = $connection->prepare("SELECT * FROM candidate WHERE user = :user_id");
            } else {
                switch (strtoupper($request->query->get('status'))) {
                    case "ACCEPTED":
                        $statusCode = 1;
                        break;
                    case "DECLINED":
                        $statusCode = 0;
                        break;
                    case "PENDING":
                        $statusCode = 2;
                        break;
                    default:
                        return json_encode(["error_msg" => "Undefined status variable"]);
                }
                $statement = $connection->prepare("SELECT * FROM candidate WHERE user = :user_id AND status = " . $statusCode);
            }
        }else{
            $statement = $connection->prepare("SELECT * FROM candidate WHERE user = :user_id");
        }
        $statement->bindValue('user_id', $request->query->get('user_id'));
        $statement->execute();
        $candidatesStatus = $statement->fetchAll();

        return $candidatesStatus;
    }
}