<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="availability")
 */
class Availability
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
     * @ORM\Column(name="from", type="datetime")
     */
    protected $from;

    /**
     * @ORM\Column(name="to", type="datetime")
     */
    protected $to;

    /**
     * @ORM\OneToOne(targetEntity="Accomodation")
     * @ORM\JoinColumn(name="accomodation", referencedColumnName="id")
     */
    protected $accomodation;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updated_at;


}