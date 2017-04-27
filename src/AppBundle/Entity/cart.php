<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * cart
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\cartRepository")
 */
class cart
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;

    /**
     * @var string
     *
     * @ORM\Column(name="order_price", type="decimal", precision=2, scale=0)
     */
    private $orderPrice;

    /**
     * @ORM\ManyToOne(targetEntity="user", inversedBy="carts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="product", mappedBy="cart", cascade={"remove"})
     */
    private $products;


    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function eraseCredentials()
    {
        return null;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return cart
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set orderPrice
     *
     * @param string $orderPrice
     *
     * @return cart
     */
    public function setOrderPrice($orderPrice)
    {
        $this->orderPrice = $orderPrice;

        return $this;
    }

    /**
     * Get orderPrice
     *
     * @return string
     */
    public function getOrderPrice()
    {
        return $this->orderPrice;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return ToList
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Add product
     *
     * @param \AppBundle\Entity\product $product
     *
     * @return Cart
     */
    public function addToList(\AppBundle\Entity\product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AppBundle\Entity\product $product
     */
    public function removeProduct(\AppBundle\Entity\product $product)
    {
        $this->products->removeElement($product);

    }
    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
}

