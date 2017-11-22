<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="candidate")
 */
class Candidate
{
    public function __construct() {
        $this->updated_at = new \DateTime();
        $this->created_at = new \DateTime();
    }

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\OneToOne(targetEntity="Accomodation", cascade={"persist"})
     * @ORM\JoinColumn(name="accomodation", referencedColumnName="id")
     */
    protected $accomodation;

    /**
     * @ORM\Column(name="from", type="datetime")
     */
    protected $from;

    /**
     * @ORM\Column(name="to", type="datetime")
     */
    protected $to;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updated_at;

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
     * Get the value of user
     * @return array
     */
    public function getUser() {
        return $this->user;
    }
    /**
     * Set the value of host
     * @param array
     * @return self
     */
    public function setUser($user) {
        $this->user = $user;
        return $this;
    }
    /**
     * Removes a host
     * @param Appbundle\Entity\User
     * @return self
     */
    public function removeUser($user) {
        $this->user->removeElement($user);
        return $this;
    }
    /**
     * Adds a host
     * @param Appbundle\Entity\User
     * @return self
     */
    public function addUser($user) {
        $this->user->add($user);
        return $this;
    }

    /**
     * Get the value of accomodation
     * @return array
     */
    public function getAccomodation() {
        return $this->accomodation;
    }
    /**
     * Set the value of accomodation
     * @param array
     * @return self
     */
    public function setAccomodation($accomodation) {
        $this->accomodation = $accomodation;
        return $this;
    }
    /**
     * Removes an accomodation
     * @param Appbundle\Entity\Accomodation
     * @return self
     */
    public function removeAccomodation($accomodation) {
        $this->accomodation->removeElement($accomodation);
        return $this;
    }
    /**
     * Adds an accomodation
     * @param Appbundle\Entity\Accomodation
     * @return self
     */
    public function addAccomodation($accomodation) {
        $this->accomodation->add($accomodation);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

}