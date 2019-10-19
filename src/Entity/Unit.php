<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="units")
 * @ORM\Entity
 */
class Unit
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Orca\CoreBundle\Entity\Expense
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\Expense", mappedBy="unit")
     */
    private $expense;

    /**
     * @var \Orca\CoreBundle\Entity\Investment
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\Investment", mappedBy="unit")
     */
    private $investment;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="initials", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $initials;

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
     * @return Unit
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Expense
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * @param Expense $expense
     * @return Unit
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
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
     * @return Unit
     */
    public function setInvestment($investment)
    {
        $this->investment = $investment;
        return $this;
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
     * @return Unit
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * @param string $initials
     * @return Unit
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;
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
     * @return Unit
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
     * @return Unit
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
        $this->expense = new ArrayCollection();
        $this->investment = new ArrayCollection();
    }

    /**
     * Add expense
     *
     * @param \Orca\CoreBundle\Entity\Expense $expense
     *
     * @return Unit
     */
    public function addExpense(Expense $expense)
    {
        $this->expense[] = $expense;

        return $this;
    }

    /**
     * Remove expense
     *
     * @param \Orca\CoreBundle\Entity\Expense $expense
     */
    public function removeExpense(Expense $expense)
    {
        $this->expense->removeElement($expense);
    }

    /**
     * Add investment
     *
     * @param \Orca\CoreBundle\Entity\Investment $investment
     *
     * @return Unit
     */
    public function addInvestment(Investment $investment)
    {
        $this->investment[] = $investment;

        return $this;
    }

    /**
     * Remove investment
     *
     * @param \Orca\CoreBundle\Entity\Investment $investment
     */
    public function removeInvestment(Investment $investment)
    {
        $this->investment->removeElement($investment);
    }

    public function __toString()
    {
        return $this->getInitials();
    }
}
