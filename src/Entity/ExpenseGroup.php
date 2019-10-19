<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ExpenseGroup
 * @ORM\Table(name="expense_groups")
 * @ORM\Entity
 * @package App\Entity
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 */
class ExpenseGroup
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Expense
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\Expense", mappedBy="group")
     */
    private $expense;

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
     * @return ExpenseGroup
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
     * @return ExpenseGroup
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
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
     * @return ExpenseGroup
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
     * @return ExpenseGroup
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
     * @return ExpenseGroup
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
        $this->expense = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add expense
     *
     * @param Expense $expense
     *
     * @return ExpenseGroup
     */
    public function addExpense(Expense $expense)
    {
        $this->expense[] = $expense;

        return $this;
    }

    /**
     * Remove expense
     *
     * @param Expense $expense
     */
    public function removeExpense(Expense $expense)
    {
        $this->expense->removeElement($expense);
    }

    public function __toString()
    {
        return str_pad($this->getId(), 3, "0", STR_PAD_LEFT) . ' - ' . $this->getName();
    }
}
