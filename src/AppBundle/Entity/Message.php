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
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
     * @ORM\ManyToOne(targetEntity="Accommodation", cascade={"persist"})
     * @ORM\JoinColumn(name="accommodation", referencedColumnName="id")
     */
    protected $accommodation;

    /**
     * @ORM\ManyToOne(targetEntity="Candidate", cascade={"persist"})
     * @ORM\JoinColumn(name="candidate", referencedColumnName="id")
     */
    protected $candidate;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
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
     * Set accommodation
     *
     * @param \AppBundle\Entity\Accommodation $accommodation
     *
     * @return Message
     */
    public function setAccommodation(\AppBundle\Entity\Accommodation $accommodation = null)
    {
        $this->accommodation = $accommodation;

        return $this;
    }

    /**
     * Get accommodation
     *
     * @return \AppBundle\Entity\Accommodation
     */
    public function getAccommodation()
    {
        return $this->accommodation;
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
