<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ApiResource
 * @ORM\Table(name="accommodation")
 */
class Accommodation
{
    public function __construct() {
        $this->pictures = new ArrayCollection();
        $this->availabilities = new ArrayCollection();
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
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $city;

    /**
     * @ORM\Column(name="region", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $region;

    /**
     * @ORM\Column(name="coutry", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $country;

    /**
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $address;

    /**
     * @ORM\Column(name="longitude", type="float")
     * @Assert\NotBlank()
     */
    protected $longitude;

    /**
     * @ORM\Column(name="latitude", type="float")
     * @Assert\NotBlank()
     */
    protected $latitude;

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
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="host", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $host;

    /**
     * @ORM\Column(name="nb_bedroom", type="integer")
     * @Assert\NotBlank()
     */
    protected $nbBedroom;

    /**
     * @ORM\Column(name="nb_bathroom", type="integer")
     * @Assert\NotBlank()
     */
    protected $nbBathroom;

    /**
     * @ORM\Column(name="nb_toilet", type="integer")
     * @Assert\NotBlank()
     */
    protected $nbToilet;

    /**
     * @ORM\Column(name="nb_max_baby", type="integer")
     * @Assert\NotBlank()
     */
    protected $nbMaxBaby;

    /**
     * @ORM\Column(name="nb_max_child", type="integer")
     * @Assert\NotBlank()
     */
    protected $nbMaxChild;

    /**
     * @ORM\Column(name="nb_max_guest", type="integer")
     * @Assert\NotBlank()
     */
    protected $nbMaxGuest;

    /**
     * @ORM\Column(name="nb_max_adult", type="integer")
     * @Assert\NotBlank()
     */
    protected $nbMaxAdult;

    /**
     * @ORM\Column(name="animals_allowed", type="boolean")
     * @Assert\NotBlank()
     */
    protected $animalsAllowed;

    /**
     * @ORM\Column(name="smokers_allowed", type="boolean")
     * @Assert\NotBlank()
     */
    protected $smokersAllowed;

    /**
     * @ORM\Column(name="has_internet", type="boolean")
     * @Assert\NotBlank()
     */
    protected $hasInternet;

    /**
     * @ORM\Column(name="property_size", type="float")
     * @Assert\NotBlank()
     */
    protected $propertySize;

    /**
     * @ORM\Column(name="floor", type="integer")
     * @Assert\NotBlank()
     */
    protected $floor;

    /**
     * @ORM\Column(name="min_stay", type="integer")
     * @Assert\NotBlank()
     */
    protected $minStay;

    /**
     * @ORM\Column(name="max_stay", type="integer")
     * @Assert\NotBlank()
     */
    protected $maxStay;

    /**
     * @ORM\Column(name="type", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $type;

    /**
     * @ORM\Column(name="checkin_hour", type="datetime")
     * @Assert\DateTime()
     */
    protected $checkinHour;

    /**
     * @ORM\Column(name="checkout_hour", type="datetime")
     * @Assert\DateTime()
     */
    protected $checkoutHour;

    /**
     * @ORM\Column(name="create_at", type="datetime")
     * @Assert\DateTime()
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @Assert\DateTime()
     */
    protected $updatedAt;


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
     * @return Accommodation
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
     * @return Accommodation
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
     * @return Accommodation
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
     * @return Accommodation
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
     * @return Accommodation
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
     * @return Accommodation
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
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Accommodation
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
     * Set pictures
     *
     * @param \AppBundle\Entity\Picture $pictures
     *
     * @return Accommodation
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
     * @return Accommodation
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
     * @return Accommodation
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

    /**
     * @return mixed
     */
    public function getNbBedroom()
    {
        return $this->nbBedroom;
    }

    /**
     * @param mixed $nbBedroom
     */
    public function setNbBedroom($nbBedroom)
    {
        $this->nbBedroom = $nbBedroom;
    }

    /**
     * @return mixed
     */
    public function getNbBathroom()
    {
        return $this->nbBathroom;
    }

    /**
     * @param mixed $nbBathroom
     */
    public function setNbBathroom($nbBathroom)
    {
        $this->nbBathroom = $nbBathroom;
    }

    /**
     * @return mixed
     */
    public function getNbToilet()
    {
        return $this->nbToilet;
    }

    /**
     * @param mixed $nbToilet
     */
    public function setNbToilet($nbToilet)
    {
        $this->nbToilet = $nbToilet;
    }

    /**
     * @return mixed
     */
    public function getNbMaxBaby()
    {
        return $this->nbMaxBaby;
    }

    /**
     * @param mixed $nbMaxBaby
     */
    public function setNbMaxBaby($nbMaxBaby)
    {
        $this->nbMaxBaby = $nbMaxBaby;
    }

    /**
     * @return mixed
     */
    public function getNbMaxChild()
    {
        return $this->nbMaxChild;
    }

    /**
     * @param mixed $nbMaxChild
     */
    public function setNbMaxChild($nbMaxChild)
    {
        $this->nbMaxChild = $nbMaxChild;
    }

    /**
     * @return mixed
     */
    public function getNbMaxGuest()
    {
        return $this->nbMaxGuest;
    }

    /**
     * @param mixed $nbMaxGuest
     */
    public function setNbMaxGuest($nbMaxGuest)
    {
        $this->nbMaxGuest = $nbMaxGuest;
    }

    /**
     * @return mixed
     */
    public function getNbMaxAdult()
    {
        return $this->nbMaxAdult;
    }

    /**
     * @param mixed $nbMaxAdult
     */
    public function setNbMaxAdult($nbMaxAdult)
    {
        $this->nbMaxAdult = $nbMaxAdult;
    }

    /**
     * @return mixed
     */
    public function getAnimalsAllowed()
    {
        return $this->animalsAllowed;
    }

    /**
     * @param mixed $animalsAllowed
     */
    public function setAnimalsAllowed($animalsAllowed)
    {
        $this->animalsAllowed = $animalsAllowed;
    }

    /**
     * @return mixed
     */
    public function getSmokersAllowed()
    {
        return $this->smokersAllowed;
    }

    /**
     * @param mixed $smokersAllowed
     */
    public function setSmokersAllowed($smokersAllowed)
    {
        $this->smokersAllowed = $smokersAllowed;
    }

    /**
     * @return mixed
     */
    public function getHasInternet()
    {
        return $this->hasInternet;
    }

    /**
     * @param mixed $hasInternet
     */
    public function setHasInternet($hasInternet)
    {
        $this->hasInternet = $hasInternet;
    }

    /**
     * @return mixed
     */
    public function getPropertySize()
    {
        return $this->propertySize;
    }

    /**
     * @param mixed $propertySize
     */
    public function setPropertySize($propertySize)
    {
        $this->propertySize = $propertySize;
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
        return $this->minStay;
    }

    /**
     * @param mixed $minStay
     */
    public function setMinStay($minStay)
    {
        $this->minStay = $minStay;
    }

    /**
     * @return mixed
     */
    public function getMaxStay()
    {
        return $this->maxStay;
    }

    /**
     * @param mixed $maxStay
     */
    public function setMaxStay($maxStay)
    {
        $this->maxStay = $maxStay;
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
        return $this->checkoutHour;
    }

    /**
     * @param mixed $checkoutHour
     */
    public function setCheckoutHour($checkoutHour)
    {
        $this->checkoutHour = $checkoutHour;
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
