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
     * @ORM\OneToOne(targetEntity="Accomodation")
     * @ORM\JoinColumn(name="accomodation", referencedColumnName="id")
     */
    protected $accommodation;

    /**
     * @ORM\OneToOne(targetEntity="User")
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
    public function getAccommodation()
    {
        return $this->accommodation;
    }

    /**
     * @param mixed $accommodation
     */
    public function setAccommodation($accommodation)
    {
        $this->accommodation = $accommodation;
    }

    /**
     * @return mixed
     */
    public function getTraveller()
    {
        return $this->traveller;
    }

    /**
     * @param mixed $traveller
     */
    public function setTraveller($traveller)
    {
        $this->traveller = $traveller;
    }

    /**
     * @return mixed
     */
    public function getCheckinDate()
    {
        return $this->checkin_date;
    }

    /**
     * @param mixed $checkin_date
     */
    public function setCheckinDate($checkin_date)
    {
        $this->checkin_date = $checkin_date;
    }

    /**
     * @return mixed
     */
    public function getCheckoutDate()
    {
        return $this->checkout_date;
    }

    /**
     * @param mixed $checkout_date
     */
    public function setCheckoutDate($checkout_date)
    {
        $this->checkout_date = $checkout_date;
    }

    /**
     * @return mixed
     */
    public function getCheckinHour()
    {
        return $this->checkin_hour;
    }

    /**
     * @param mixed $checkin_hour
     */
    public function setCheckinHour($checkin_hour)
    {
        $this->checkin_hour = $checkin_hour;
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
        return $this->checkin_details;
    }

    /**
     * @param mixed $checkin_details
     */
    public function setCheckinDetails($checkin_details)
    {
        $this->checkin_details = $checkin_details;
    }

    /**
     * @return mixed
     */
    public function getCheckoutDetails()
    {
        return $this->checkout_details;
    }

    /**
     * @param mixed $checkout_details
     */
    public function setCheckoutDetails($checkout_details)
    {
        $this->checkout_details = $checkout_details;
    }

    /**
     * @return mixed
     */
    public function getNbNights()
    {
        return $this->nb_nights;
    }

    /**
     * @param mixed $nb_nights
     */
    public function setNbNights($nb_nights)
    {
        $this->nb_nights = $nb_nights;
    }

    /**
     * @return mixed
     */
    public function getNbPersons()
    {
        return $this->nb_persons;
    }

    /**
     * @param mixed $nb_persons
     */
    public function setNbPersons($nb_persons)
    {
        $this->nb_persons = $nb_persons;
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