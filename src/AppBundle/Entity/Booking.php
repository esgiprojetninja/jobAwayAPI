<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ApiResource
 * @ORM\Table(name="booking")
 */
class Booking
{
    public function __construct() {
        $this->updatedAt = new \DateTime();
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Accomodation", cascade={"persist"})
     * @ORM\JoinColumn(name="accomodation", referencedColumnName="id")
     */
    protected $accommodation;

    /**
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="traveller", referencedColumnName="id")
     */
    protected $traveller;

    /**
     * @ORM\Column(name="checkinDate", type="datetime")
     */
    protected $checkinDate;

    /**
     * @ORM\Column(name="checkoutDate", type="datetime")
     */
    protected $checkoutDate;

    /**
     * @ORM\Column(name="checkinHour", type="string", length=255)
     */
    protected $checkinHour;

    /**
     * @ORM\Column(name="checkout_hour", type="string", length=255)
     */
    protected $checkout_hour;

    /**
     * @ORM\Column(name="checkinDetails", type="string", length=255)
     */
    protected $checkinDetails;

    /**
     * @ORM\Column(name="checkoutDetails", type="string", length=255)
     */
    protected $checkoutDetails;

    /**
     * @ORM\Column(name="nbNights", type="integer")
     */
    protected $nbNights;

    /**
     * @ORM\Column(name="nbPersons", type="integer")
     */
    protected $nbPersons;

    /**
     * @ORM\Column(name="createdAt", type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    protected $updatedAt;

    /**
     * Set accommodation
     *
     * @param \AppBundle\Entity\Accomodation $accommodation
     *
     * @return Booking
     */
    public function setAccommodation(\AppBundle\Entity\Accomodation $accommodation = null)
    {
        $this->accommodation = $accommodation;

        return $this;
    }

    /**
     * Get accommodation
     *
     * @return \AppBundle\Entity\Accomodation
     */
    public function getAccommodation()
    {
        return $this->accommodation;
    }

    /**
     * Set traveller
     *
     * @param \AppBundle\Entity\User $traveller
     *
     * @return Booking
     */
    public function setTraveller(\AppBundle\Entity\User $traveller = null)
    {
        $this->traveller = $traveller;

        return $this;
    }

    /**
     * Get traveller
     *
     * @return \AppBundle\Entity\User
     */
    public function getTraveller()
    {
        return $this->traveller;
    }

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
    public function getCheckinDate()
    {
        return $this->checkinDate;
    }

    /**
     * @param mixed $checkinDate
     */
    public function setCheckinDate($checkinDate)
    {
        $this->checkinDate = $checkinDate;
    }

    /**
     * @return mixed
     */
    public function getCheckoutDate()
    {
        return $this->checkoutDate;
    }

    /**
     * @param mixed $checkoutDate
     */
    public function setCheckoutDate($checkoutDate)
    {
        $this->checkoutDate = $checkoutDate;
    }

    /**
     * @return mixed
     */
    public function getCheckinHour()
    {
        return $this->checkinHour;
    }

    /**
     * @param mixed $checkinHour
     */
    public function setCheckinHour($checkinHour)
    {
        $this->checkinHour = $checkinHour;
    }

    /**
     * @return mixed
     */
    public function getCheckoutHour()
    {
        return $this->checkout_hour;
    }

    /**
     * @param mixed $checkout_hour
     */
    public function setCheckoutHour($checkout_hour)
    {
        $this->checkout_hour = $checkout_hour;
    }

    /**
     * @return mixed
     */
    public function getCheckinDetails()
    {
        return $this->checkinDetails;
    }

    /**
     * @param mixed $checkinDetails
     */
    public function setCheckinDetails($checkinDetails)
    {
        $this->checkinDetails = $checkinDetails;
    }

    /**
     * @return mixed
     */
    public function getCheckoutDetails()
    {
        return $this->checkoutDetails;
    }

    /**
     * @param mixed $checkoutDetails
     */
    public function setCheckoutDetails($checkoutDetails)
    {
        $this->checkoutDetails = $checkoutDetails;
    }

    /**
     * @return mixed
     */
    public function getNbNights()
    {
        return $this->nbNights;
    }

    /**
     * @param mixed $nbNights
     */
    public function setNbNights($nbNights)
    {
        $this->nbNights = $nbNights;
    }

    /**
     * @return mixed
     */
    public function getNbPersons()
    {
        return $this->nbPersons;
    }

    /**
     * @param mixed $nbPersons
     */
    public function setNbPersons($nbPersons)
    {
        $this->nbPersons = $nbPersons;
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
