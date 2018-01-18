<?php

namespace AppBundle\Controller;

use Doctrine\ORM\OptimisticLockException;
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

    private function saveCode($code) {
        $this->em->persist($code);
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
            throw $e;
        }
    }

    /**
     * @Route("/check")
     * @Method({"POST"})
     * @param Request $req
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws OptimisticLockException
     */
    public function checkAction(Request $req)
    {
        try {
            $repo = $this->em->getRepository(GuardCode::class);
            $code = $repo->findOneBy(["code" => $req->get("code")]);
            if ($code !== null) {
                $now = new \DateTime();
                if ($code->getNbAttempts() <= 0 || $now > $code->getValidityDateTime()) {
                    $code->setActive(false);
                }
                if (!$code->getActive()) {
                    $this->saveCode($code);
                    return new JsonResponse([
                        "hasError" => true,
                        "message" => "Code is not active anymore."
                    ]);
                }
                $code->decrementAttempts();
            }
            if ($code == null || $code->getUser()->getEmail() != $req->get("email")) {
                return new JsonResponse([
                    "hasError" => true,
                    "message" => "Couldn't authenticate."
                ]);
            }
            $user = $code->getUser();
            $code->setActive(false);
            $this->saveCode($code);
            return new JsonResponse([
                "token" => $this->jwtManager->create($user)
            ]);
        } catch (Exception $exception) {
            return new JsonResponse([
                "hasError" => true,
                "message" => $exception->getMessage(),
                "trace" => $exception->getTraceAsString()
            ]);
        }
    }
}