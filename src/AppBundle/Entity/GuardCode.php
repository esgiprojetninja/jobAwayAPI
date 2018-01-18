<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * },
 *      collectionOperations={
 *          "create"={"route_name"="create_guard"}
 *     },
 *     itemOperations={
 *          "get"={"method"="GET"},
 *          "check"={"route_name"="check_guard"}
 *     }
 * )
 * @ORM\Table(name="guard_code")
 */
class GuardCode
{
    public function __construct() {
        $this->updatedAt = new \DateTime();
        $this->createdAt = new \DateTime();
        $codeArray = [];
        for($i = 0; $i < 6; $i++) {
           $codeArray[] = rand(0, 9);
        }
        $this->code = join("", $codeArray);
        $this->nbAttempts = 3;
        $now = new \DateTime();
        $this->validityDateTime = $now->add(new \DateInterval("PT15M"));
    }

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"read"})
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $user;

    /**
     * @ORM\Column(name="code", type="integer")
     * @Groups({"read"})
     */
    protected  $code;

    /**
     * @ORM\Column(name="validity_datetime", type="datetime")
     * @Assert\DateTime()
     * @Groups({"read"})
     */
    protected $validityDateTime;

    /**
     * @ORM\Column(name="nbAttempts", type="integer")
     * @Groups({"read"})
     */
    protected $nbAttempts;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @Assert\DateTime()
     * @Groups({"read"})
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @Assert\DateTime()
     * @Groups({"read"})
     */
    protected $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getValidityDateTime()
    {
        return $this->validityDateTime;
    }

    /**
     * @param mixed $validityDateTime
     */
    public function setValidityDateTime($validityDateTime)
    {
        $this->validityDateTime = $validityDateTime;
    }

    /**
     * @return mixed
     */
    public function getNbAttempts()
    {
        return $this->nbAttempts;
    }

    /**
     * @param mixed $nbAttempts
     */
    public function setNbAttempts($nbAttempts)
    {
        $this->nbAttempts = $nbAttempts;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}