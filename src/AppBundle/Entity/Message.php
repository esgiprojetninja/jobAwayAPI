<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ApiResource
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
     * @ORM\ManyToOne(targetEntity="Accomodation", cascade={"persist"})
     * @ORM\JoinColumn(name="accomodation", referencedColumnName="id")
     */
    protected $accomodation;

    /**
     * @ORM\ManyToOne(targetEntity="Candidate", cascade={"persist"})
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Message
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
     * @return Message
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
     * Set accomodation
     *
     * @param \AppBundle\Entity\Accomodation $accomodation
     *
     * @return Message
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
     * Set candidate
     *
     * @param \AppBundle\Entity\Candidate $candidate
     *
     * @return Message
     */
    public function setCandidate(\AppBundle\Entity\Candidate $candidate = null)
    {
        $this->candidate = $candidate;

        return $this;
    }

    /**
     * Get candidate
     *
     * @return \AppBundle\Entity\Candidate
     */
    public function getCandidate()
    {
        return $this->candidate;
    }
}
