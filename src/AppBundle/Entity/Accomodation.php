<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="accomodation")
 */
class Accomodation
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param mixed $long
     */
    public function setLong($long)
    {
        $this->long = $long;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getNbBedroom()
    {
        return $this->nb_bedroom;
    }

    /**
     * @param mixed $nb_bedroom
     */
    public function setNbBedroom($nb_bedroom)
    {
        $this->nb_bedroom = $nb_bedroom;
    }

    /**
     * @return mixed
     */
    public function getNbBathroom()
    {
        return $this->nb_bathroom;
    }

    /**
     * @param mixed $nb_bathroom
     */
    public function setNbBathroom($nb_bathroom)
    {
        $this->nb_bathroom = $nb_bathroom;
    }

    /**
     * @return mixed
     */
    public function getNbToilet()
    {
        return $this->nb_toilet;
    }

    /**
     * @param mixed $nb_toilet
     */
    public function setNbToilet($nb_toilet)
    {
        $this->nb_toilet = $nb_toilet;
    }

    /**
     * @return mixed
     */
    public function getNbMaxBaby()
    {
        return $this->nb_max_baby;
    }

    /**
     * @param mixed $nb_max_baby
     */
    public function setNbMaxBaby($nb_max_baby)
    {
        $this->nb_max_baby = $nb_max_baby;
    }

    /**
     * @return mixed
     */
    public function getNbMaxChild()
    {
        return $this->nb_max_child;
    }

    /**
     * @param mixed $nb_max_child
     */
    public function setNbMaxChild($nb_max_child)
    {
        $this->nb_max_child = $nb_max_child;
    }

    /**
     * @return mixed
     */
    public function getNbMaxGuest()
    {
        return $this->nb_max_guest;
    }

    /**
     * @param mixed $nb_max_guest
     */
    public function setNbMaxGuest($nb_max_guest)
    {
        $this->nb_max_guest = $nb_max_guest;
    }

    /**
     * @return mixed
     */
    public function getNbMaxAdult()
    {
        return $this->nb_max_adult;
    }

    /**
     * @param mixed $nb_max_adult
     */
    public function setNbMaxAdult($nb_max_adult)
    {
        $this->nb_max_adult = $nb_max_adult;
    }

    /**
     * @return mixed
     */
    public function getAnimalsAllowed()
    {
        return $this->animals_allowed;
    }

    /**
     * @param mixed $animals_allowed
     */
    public function setAnimalsAllowed($animals_allowed)
    {
        $this->animals_allowed = $animals_allowed;
    }

    /**
     * @return mixed
     */
    public function getSmokersAllowed()
    {
        return $this->smokers_allowed;
    }

    /**
     * @param mixed $smokers_allowed
     */
    public function setSmokersAllowed($smokers_allowed)
    {
        $this->smokers_allowed = $smokers_allowed;
    }

    /**
     * @return mixed
     */
    public function getHasInternet()
    {
        return $this->has_internet;
    }

    /**
     * @param mixed $has_internet
     */
    public function setHasInternet($has_internet)
    {
        $this->has_internet = $has_internet;
    }

    /**
     * @return mixed
     */
    public function getPropertySize()
    {
        return $this->property_size;
    }

    /**
     * @param mixed $property_size
     */
    public function setPropertySize($property_size)
    {
        $this->property_size = $property_size;
    }

    /**
     * @return mixed
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param mixed $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    /**
     * @return mixed
     */
    public function getMinStay()
    {
        return $this->min_stay;
    }

    /**
     * @param mixed $min_stay
     */
    public function setMinStay($min_stay)
    {
        $this->min_stay = $min_stay;
    }

    /**
     * @return mixed
     */
    public function getMaxStay()
    {
        return $this->max_stay;
    }

    /**
     * @param mixed $max_stay
     */
    public function setMaxStay($max_stay)
    {
        $this->max_stay = $max_stay;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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