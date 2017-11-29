<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ApiResource(attributes={
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * }, itemOperations={
 *     "delete"={"method"="DELETE", "route_name"="safe_user_delete"}
 * })
 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable
{
    public function __construct() {
        $this->updatedAt = new \DateTime();
        $this->createdAt = new \DateTime();
        $this->isActive = true;
        $this->roles = ['ROLE_USER'];
    }

    /**
    * @ORM\Id
    * @ORM\Column(name="id", type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    * @Groups({"read"})
    */
    protected $id;

    /**
    * @ORM\Column(name="email", type="string", length=255, unique=true)
    * @Groups({"read", "write"})
    * @Assert\Email
    */
    protected $email;

    /**
     * @ORM\Column(name="roles", type="json_array")
     * @Groups({"read", "write"})
     * @Assert\NotBlank
     */
    protected $roles = [];

    /**
     * @ORM\Column(name="username", type="string", length=25, unique=true)
     * @Groups({"read", "write"})
     * @Assert\NotBlank()
     */
    protected $username;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     * @Groups({"write"})
     * @Assert\Length(
     *      min = 4,
     *      max = 20,
     * )
     */
    protected $password;

    /**
     * @ORM\Column(name="last_name", type="string", length=255)
     * @Groups({"read", "write"})
     * @Assert\NotBlank()
     */
    protected $lastName;

    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Groups({"read", "write"})
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @ORM\Column(name="languages", type="text")
     * @Groups({"read", "write"})
     * @Assert\NotBlank()
     */
    protected $languages;

    /**
     * @ORM\Column(name="skills", type="text")
     * @Groups({"read", "write"})
     * @Assert\NotBlank()
     */
    protected $skills;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     * @Assert\NotBlank()
     */
    protected $isActive;


    /**
     * @ORM\Column(name="createdAt", type="datetime")
     * @Groups({"read", "write"})
     * @Assert\DateTime()
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updatedAt", type="datetime")
     * @Groups({"read", "write"})
     * @Assert\DateTime()
     */
    protected $updatedAt;

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param mixed $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
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

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized);
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
}