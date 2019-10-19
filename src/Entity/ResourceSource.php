<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ResourceSource
 * @ORM\Table(name="resource_source")
 * @ORM\Entity
 * @package App\Entity
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 */
class ResourceSource
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Investment
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\ResourceSource", mappedBy="resourceSource")
     */
    private $investment;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return ResourceSource
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Investment
     */
    public function getInvestment()
    {
        return $this->investment;
    }

    /**
     * @param Investment $investment
     * @return ResourceSource
     */
    public function setInvestment($investment)
    {
        $this->investment = $investment;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ResourceSource
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
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
     * @return ResourceSource
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
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
     * @return ResourceSource
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->investment = new ArrayCollection();
    }

    /**
     * Add investment
     *
     * @param ResourceSource $investment
     *
     * @return ResourceSource
     */
    public function addInvestment(ResourceSource $investment)
    {
        $this->investment[] = $investment;

        return $this;
    }

    /**
     * Remove investment
     *
     * @param ResourceSource $investment
     */
    public function removeInvestment(ResourceSource $investment)
    {
        $this->investment->removeElement($investment);
    }

    public function __toString()
    {
        return $this->getReference() . ' - ' . $this->getName();
    }
}
