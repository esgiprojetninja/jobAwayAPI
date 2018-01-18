<?php

namespace AppBundle\Controller;

use JMS\Serializer\Exception\Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;
use Doctrine\ORM\EntityManager;

use AppBundle\Entity\GuardCode;

/**
 * Class GuardCodeController
 * @package AppBundle\Controller
 * @Route("/api/guard_code")
 */
class GuardCodeController extends Controller
{
    private $em;
    private $jwtManager;

    public function __construct(EntityManager $em, JWTManager $jwtManager)
    {
        $this->em = $em;
        $this->jwtManager = $jwtManager;
    }

    /**
     * @Route("/check")
     * @Method({"POST"})
     * @param Request $req
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function checkAction(Request $req)
    {
        try {
            $repo = $this->em->getRepository(GuardCode::class);
            $code = $repo->findOneBy(["code" => $req->get("code")]);
            if ($code == null) {
                return new JsonResponse([
                    "hasError" => true,
                    "message" => "Couldn't authenticate"
                ]);
            }
            $user = $code->getUser();
            if ($user->getEmail() == $req->get("email")) {
                return new JsonResponse(["token" => $this->jwtManager->create($user)]);
            }
        } catch (Exception $exception) {
            return new JsonResponse([
                "hasError" => true,
                "message" => $exception->getMessage(),
                "trace" => $exception->getTraceAsString()
            ]);
        }
    }
}