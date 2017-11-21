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
     * @ORM\ManyToOne(targetEntity="Accomodation")
     * @ORM\JoinColumn(name="accomodation_id", referencedColumnName="id")
     */
    protected $accomodation_id;

    /**
     * @ORM\OneToOne(targetEntity="Candidate")
     * @ORM\JoinColumn(name="candidate_id", referencedColumnName="id")
     */
    protected $candidate_id;

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
     * @return mixed
     */
    public function getAccomodationId()
    {
        return $this->accomodation_id;
    }

    /**
     * @param mixed $accomodation_id
     */
    public function setAccomodationId($accomodation_id)
    {
        $this->accomodation_id = $accomodation_id;
    }

    /**
     * @return mixed
     */
    public function getCandidateId()
    {
        return $this->candidate_id;
    }

    /**
     * @param mixed $candidate_id
     */
    public function setCandidateId($candidate_id)
    {
        $this->candidate_id = $candidate_id;
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