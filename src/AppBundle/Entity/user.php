<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="Email already taken")
 */
class user implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="phone", type="string", length=20)
     */
    private $phone;

    /**
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $role;

    /**
     * @Assert\Length(max=4096)
     */
    protected $plainPassword;

    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $password;

    /**
     * @ORM\OneToMany(targetEntity="cart", mappedBy="user", cascade={"remove"})
     */
    private $carts;

    public function __construct()
    {
        $this->carts = new ArrayCollection();
    }

    public function eraseCredentials()
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setRole($role = null)
    {
        $this->role = $role;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getRoles()
    {
        return [$this->getRole()];
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * Add cart
     *
     * @param \AppBundle\Entity\cart $cart
     *
     * @return user
     */
    public function addToList(\AppBundle\Entity\cart $cart)
    {
        $this->cart[] = $cart;

        return $this;
    }

    /**
     * Remove cart
     *
     * @param \AppBundle\Entity\cart $cart
     */
    public function removeCart(\AppBundle\Entity\cart $cart)
    {
        $this->cart->removeElement($cart);

    }
    /**
     * Get carts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarts()
    {
        return $this->carts;
    }
}

