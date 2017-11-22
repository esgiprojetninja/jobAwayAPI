<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="accomodation")
 */
class Accomodation
{
    public function __construct() {
        $this->pictures = new ArrayCollection();
        $this->availabilities = new ArrayCollection();
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\Column(name="city", type="string", length=255)
     */
    protected $city;

    /**
     * @ORM\Column(name="region", type="string", length=255)
     */
    protected $region;

    /**
     * @ORM\Column(name="coutry", type="string", length=255)
     */
    protected $country;

    /**
     * @ORM\Column(name="address", type="string", length=255)
     */
    protected $address;

    /**
     * @ORM\Column(name="long", type="float")
     */
    protected $long;

    /**
     * @ORM\Column(name="lat", type="float")
     */
    protected $lat;

    /**
     * @ORM\ManyToOne(targetEntity="Picture",cascade={"persist"})
     * @ORM\JoinColumn(name="pictures", referencedColumnName="id")
     */
    protected $pictures;

    /**
     * @ORM\ManyToOne(targetEntity="Availability", cascade={"persist"})
     * @ORM\JoinColumn(name="availabilities", referencedColumnName="id")
     */
    protected $availabilities;

    /**
     * @ORM\OneToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="host", referencedColumnName="id")
     */
    protected $host;

    /**
     * @ORM\Column(name="nb_bedroom", type="integer")
     */
    protected $nb_bedroom;

    /**
     * @ORM\Column(name="nb_bathroom", type="integer")
     */
    protected $nb_bathroom;

    /**
     * @ORM\Column(name="nb_toilet", type="integer")
     */
    protected $nb_toilet;

    /**
     * @ORM\Column(name="nb_max_baby", type="integer")
     */
    protected $nb_max_baby;

    /**
     * @ORM\Column(name="nb_max_child", type="integer")
     */
    protected $nb_max_child;

    /**
     * @ORM\Column(name="nb_max_guest", type="integer")
     */
    protected $nb_max_guest;

    /**
     * @ORM\Column(name="nb_max_adult", type="integer")
     */
    protected $nb_max_adult;

    /**
     * @ORM\Column(name="animals_allowed", type="boolean")
     */
    protected $animals_allowed;

    /**
     * @ORM\Column(name="smokers_allowed", type="boolean")
     */
    protected $smokers_allowed;

    /**
     * @ORM\Column(name="has_internet", type="boolean")
     */
    protected $has_internet;

    /**
     * @ORM\Column(name="property_size", type="float")
     */
    protected $property_size;

    /**
     * @ORM\Column(name="floor", type="integer")
     */
    protected $floor;

    /**
     * @ORM\Column(name="min_stay", type="integer")
     */
    protected $min_stay;

    /**
     * @ORM\Column(name="max_stay", type="integer")
     */
    protected $max_stay;

    /**
     * @ORM\Column(name="type", type="string", length=255)
     */
    protected $type;

    /**
     * @ORM\Column(name="checkin_hour", type="datetime")
     */
    protected $checkin_hour;

    /**
     * @ORM\Column(name="checkout_hour", type="datetime")
     */
    protected $checkout_hour;

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
     * Set title
     *
     * @param string $title
     *
     * @return Accomodation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Accomodation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Accomodation
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Accomodation
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Accomodation
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Accomodation
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set long
     *
     * @param float $long
     *
     * @return Accomodation
     */
    public function setLong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Get long
     *
     * @return float
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Accomodation
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set nbBedroom
     *
     * @param integer $nbBedroom
     *
     * @return Accomodation
     */
    public function setNbBedroom($nbBedroom)
    {
        $this->nb_bedroom = $nbBedroom;

        return $this;
    }

    /**
     * Get nbBedroom
     *
     * @return integer
     */
    public function getNbBedroom()
    {
        return $this->nb_bedroom;
    }

    /**
     * Set nbBathroom
     *
     * @param integer $nbBathroom
     *
     * @return Accomodation
     */
    public function setNbBathroom($nbBathroom)
    {
        $this->nb_bathroom = $nbBathroom;

        return $this;
    }

    /**
     * Get nbBathroom
     *
     * @return integer
     */
    public function getNbBathroom()
    {
        return $this->nb_bathroom;
    }

    /**
     * Set nbToilet
     *
     * @param integer $nbToilet
     *
     * @return Accomodation
     */
    public function setNbToilet($nbToilet)
    {
        $this->nb_toilet = $nbToilet;

        return $this;
    }

    /**
     * Get nbToilet
     *
     * @return integer
     */
    public function getNbToilet()
    {
        return $this->nb_toilet;
    }

    /**
     * Set nbMaxBaby
     *
     * @param integer $nbMaxBaby
     *
     * @return Accomodation
     */
    public function setNbMaxBaby($nbMaxBaby)
    {
        $this->nb_max_baby = $nbMaxBaby;

        return $this;
    }

    /**
     * Get nbMaxBaby
     *
     * @return integer
     */
    public function getNbMaxBaby()
    {
        return $this->nb_max_baby;
    }

    /**
     * Set nbMaxChild
     *
     * @param integer $nbMaxChild
     *
     * @return Accomodation
     */
    public function setNbMaxChild($nbMaxChild)
    {
        $this->nb_max_child = $nbMaxChild;

        return $this;
    }

    /**
     * Get nbMaxChild
     *
     * @return integer
     */
    public function getNbMaxChild()
    {
        return $this->nb_max_child;
    }

    /**
     * Set nbMaxGuest
     *
     * @param integer $nbMaxGuest
     *
     * @return Accomodation
     */
    public function setNbMaxGuest($nbMaxGuest)
    {
        $this->nb_max_guest = $nbMaxGuest;

        return $this;
    }

    /**
     * Get nbMaxGuest
     *
     * @return integer
     */
    public function getNbMaxGuest()
    {
        return $this->nb_max_guest;
    }

    /**
     * Set nbMaxAdult
     *
     * @param integer $nbMaxAdult
     *
     * @return Accomodation
     */
    public function setNbMaxAdult($nbMaxAdult)
    {
        $this->nb_max_adult = $nbMaxAdult;

        return $this;
    }

    /**
     * Get nbMaxAdult
     *
     * @return integer
     */
    public function getNbMaxAdult()
    {
        return $this->nb_max_adult;
    }

    /**
     * Set animalsAllowed
     *
     * @param boolean $animalsAllowed
     *
     * @return Accomodation
     */
    public function setAnimalsAllowed($animalsAllowed)
    {
        $this->animals_allowed = $animalsAllowed;

        return $this;
    }

    /**
     * Get animalsAllowed
     *
     * @return boolean
     */
    public function getAnimalsAllowed()
    {
        return $this->animals_allowed;
    }

    /**
     * Set smokersAllowed
     *
     * @param boolean $smokersAllowed
     *
     * @return Accomodation
     */
    public function setSmokersAllowed($smokersAllowed)
    {
        $this->smokers_allowed = $smokersAllowed;

        return $this;
    }

    /**
     * Get smokersAllowed
     *
     * @return boolean
     */
    public function getSmokersAllowed()
    {
        return $this->smokers_allowed;
    }

    /**
     * Set hasInternet
     *
     * @param boolean $hasInternet
     *
     * @return Accomodation
     */
    public function setHasInternet($hasInternet)
    {
        $this->has_internet = $hasInternet;

        return $this;
    }

    /**
     * Get hasInternet
     *
     * @return boolean
     */
    public function getHasInternet()
    {
        return $this->has_internet;
    }

    /**
     * Set propertySize
     *
     * @param float $propertySize
     *
     * @return Accomodation
     */
    public function setPropertySize($propertySize)
    {
        $this->property_size = $propertySize;

        return $this;
    }

    /**
     * Get propertySize
     *
     * @return float
     */
    public function getPropertySize()
    {
        return $this->property_size;
    }

    /**
     * Set floor
     *
     * @param integer $floor
     *
     * @return Accomodation
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get floor
     *
     * @return integer
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set minStay
     *
     * @param integer $minStay
     *
     * @return Accomodation
     */
    public function setMinStay($minStay)
    {
        $this->min_stay = $minStay;

        return $this;
    }

    /**
     * Get minStay
     *
     * @return integer
     */
    public function getMinStay()
    {
        return $this->min_stay;
    }

    /**
     * Set maxStay
     *
     * @param integer $maxStay
     *
     * @return Accomodation
     */
    public function setMaxStay($maxStay)
    {
        $this->max_stay = $maxStay;

        return $this;
    }

    /**
     * Get maxStay
     *
     * @return integer
     */
    public function getMaxStay()
    {
        return $this->max_stay;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Accomodation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set checkinHour
     *
     * @param \DateTime $checkinHour
     *
     * @return Accomodation
     */
    public function setCheckinHour($checkinHour)
    {
        $this->checkin_hour = $checkinHour;

        return $this;
    }

    /**
     * Get checkinHour
     *
     * @return \DateTime
     */
    public function getCheckinHour()
    {
        return $this->checkin_hour;
    }

    /**
     * Set checkoutHour
     *
     * @param \DateTime $checkoutHour
     *
     * @return Accomodation
     */
    public function setCheckoutHour($checkoutHour)
    {
        $this->checkout_hour = $checkoutHour;

        return $this;
    }

    /**
     * Get checkoutHour
     *
     * @return \DateTime
     */
    public function getCheckoutHour()
    {
        return $this->checkout_hour;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Accomodation
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
     * @return Accomodation
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
     * Set pictures
     *
     * @param \AppBundle\Entity\Picture $pictures
     *
     * @return Accomodation
     */
    public function setPictures(\AppBundle\Entity\Picture $pictures = null)
    {
        $this->pictures = $pictures;

        return $this;
    }

    /**
     * Get pictures
     *
     * @return \AppBundle\Entity\Picture
     */
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Set availabilities
     *
     * @param \AppBundle\Entity\Availability $availabilities
     *
     * @return Accomodation
     */
    public function setAvailabilities(\AppBundle\Entity\Availability $availabilities = null)
    {
        $this->availabilities = $availabilities;

        return $this;
    }

    /**
     * Get availabilities
     *
     * @return \AppBundle\Entity\Availability
     */
    public function getAvailabilities()
    {
        return $this->availabilities;
    }

    /**
     * Set host
     *
     * @param \AppBundle\Entity\User $host
     *
     * @return Accomodation
     */
    public function setHost(\AppBundle\Entity\User $host = null)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get host
     *
     * @return \AppBundle\Entity\User
     */
    public function getHost()
    {
        return $this->host;
    }
}
