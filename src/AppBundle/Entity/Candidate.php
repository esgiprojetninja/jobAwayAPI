<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\User;

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
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Accomodation", cascade={"persist"})
     * @ORM\JoinColumn(name="accomodation", referencedColumnName="id")
     */
    protected $accomodation;

    /**
     * @ORM\Column(name="from_date", type="datetime")
     */
    protected $from_date;

    /**
     * @ORM\Column(name="to_date", type="datetime")
     */
    protected $to_date;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updated_at;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fromDate
     *
     * @param \DateTime $fromDate
     *
     * @return Candidate
     */
    public function setFromDate($fromDate)
    {
        $this->from_date = $fromDate;

        return $this;
    }

    /**
     * Get fromDate
     *
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->from_date;
    }

    /**
     * Set toDate
     *
     * @param \DateTime $toDate
     *
     * @return Candidate
     */
    public function setToDate($toDate)
    {
        $this->to_date = $toDate;

        return $this;
    }

    /**
     * Get toDate
     *
     * @return \DateTime
     */
    public function getToDate()
    {
        return $this->to_date;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Candidate
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Candidate
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }


    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Candidate
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set accomodation
     *
     * @param \AppBundle\Entity\Accomodation $accomodation
     *
     * @return Candidate
     */
    public function setAccomodation(\AppBundle\Entity\Accomodation $accomodation = null)
    {
        $this->accomodation = $accomodation;

        return $this;
    }

    /**
     * Get accomodation
     *
     * @return \AppBundle\Entity\Accomodation
     */
    public function getAccomodation()
    {
        return $this->accomodation;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Candidate
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }
}
