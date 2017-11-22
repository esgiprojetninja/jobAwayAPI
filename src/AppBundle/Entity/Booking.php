<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="booking")
 */
class Booking
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
     * @ORM\Column(name="checkin_date", type="datetime")
     */
    protected $checkin_date;

    /**
     * @ORM\Column(name="checkout_date", type="datetime")
     */
    protected $checkout_date;

    /**
     * @ORM\Column(name="checkin_hour", type="string", length=255)
     */
    protected $checkin_hour;

    /**
     * @ORM\Column(name="checkout_hour", type="string", length=255)
     */
    protected $checkout_hour;

    /**
     * @ORM\Column(name="checkin_details", type="string", length=255)
     */
    protected $checkin_details;

    /**
     * @ORM\Column(name="checkout_details", type="string", length=255)
     */
    protected $checkout_details;

    /**
     * @ORM\Column(name="nb_nights", type="integer")
     */
    protected $nb_nights;

    /**
     * @ORM\Column(name="nb_persons", type="integer")
     */
    protected $nb_persons;

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
     * Set checkinDate
     *
     * @param \DateTime $checkinDate
     *
     * @return Booking
     */
    public function setCheckinDate($checkinDate)
    {
        $this->checkin_date = $checkinDate;

        return $this;
    }

    /**
     * Get checkinDate
     *
     * @return \DateTime
     */
    public function getCheckinDate()
    {
        return $this->checkin_date;
    }

    /**
     * Set checkoutDate
     *
     * @param \DateTime $checkoutDate
     *
     * @return Booking
     */
    public function setCheckoutDate($checkoutDate)
    {
        $this->checkout_date = $checkoutDate;

        return $this;
    }

    /**
     * Get checkoutDate
     *
     * @return \DateTime
     */
    public function getCheckoutDate()
    {
        return $this->checkout_date;
    }

    /**
     * Set checkinHour
     *
     * @param string $checkinHour
     *
     * @return Booking
     */
    public function setCheckinHour($checkinHour)
    {
        $this->checkin_hour = $checkinHour;

        return $this;
    }

    /**
     * Get checkinHour
     *
     * @return string
     */
    public function getCheckinHour()
    {
        return $this->checkin_hour;
    }

    /**
     * Set checkoutHour
     *
     * @param string $checkoutHour
     *
     * @return Booking
     */
    public function setCheckoutHour($checkoutHour)
    {
        $this->checkout_hour = $checkoutHour;

        return $this;
    }

    /**
     * Get checkoutHour
     *
     * @return string
     */
    public function getCheckoutHour()
    {
        return $this->checkout_hour;
    }

    /**
     * Set checkinDetails
     *
     * @param string $checkinDetails
     *
     * @return Booking
     */
    public function setCheckinDetails($checkinDetails)
    {
        $this->checkin_details = $checkinDetails;

        return $this;
    }

    /**
     * Get checkinDetails
     *
     * @return string
     */
    public function getCheckinDetails()
    {
        return $this->checkin_details;
    }

    /**
     * Set checkoutDetails
     *
     * @param string $checkoutDetails
     *
     * @return Booking
     */
    public function setCheckoutDetails($checkoutDetails)
    {
        $this->checkout_details = $checkoutDetails;

        return $this;
    }

    /**
     * Get checkoutDetails
     *
     * @return string
     */
    public function getCheckoutDetails()
    {
        return $this->checkout_details;
    }

    /**
     * Set nbNights
     *
     * @param integer $nbNights
     *
     * @return Booking
     */
    public function setNbNights($nbNights)
    {
        $this->nb_nights = $nbNights;

        return $this;
    }

    /**
     * Get nbNights
     *
     * @return integer
     */
    public function getNbNights()
    {
        return $this->nb_nights;
    }

    /**
     * Set nbPersons
     *
     * @param integer $nbPersons
     *
     * @return Booking
     */
    public function setNbPersons($nbPersons)
    {
        $this->nb_persons = $nbPersons;

        return $this;
    }

    /**
     * Get nbPersons
     *
     * @return integer
     */
    public function getNbPersons()
    {
        return $this->nb_persons;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Booking
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
     * @return Booking
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
}
