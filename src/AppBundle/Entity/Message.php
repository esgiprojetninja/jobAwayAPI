<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="message")
 */
class Message
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
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * @ORM\OneToOne(targetEntity="Accomodation", cascade={"persist"})
     * @ORM\JoinColumn(name="accomodation", referencedColumnName="id")
     */
    protected $accomodation;

    /**
     * @ORM\OneToOne(targetEntity="Candidate", cascade={"persist"})
     * @ORM\JoinColumn(name="candidate", referencedColumnName="id")
     */
    protected $candidate;

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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
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
     * Get the value of candidate
     * @return array
     */
    public function getCandidate() {
        return $this->candidate;
    }
    /**
     * Set the value of candidate
     * @param array
     * @return self
     */
    public function setCandidate($candidate) {
        $this->candidate = $candidate;
        return $this;
    }
    /**
     * Removes a candidate
     * @param Appbundle\Entity\Candidate
     * @return self
     */
    public function removeCandidate($candidate) {
        $this->candidate->removeElement($candidate);
        return $this;
    }
    /**
     * Adds a candidate
     * @param Appbundle\Entity\Candidate
     * @return self
     */
    public function addCandidate($candidate) {
        $this->candidate->add($candidate);
        return $this;
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