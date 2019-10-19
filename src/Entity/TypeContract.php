<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="type_contracts")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity()
 */
class TypeContract
{

    const TYPE_EXPENSE = 'expense';
    const TYPE_INVESTMENT = 'investment';

    /**
     * @var \Orca\CoreBundle\Entity\Expense
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\Expense", mappedBy="typeContract")
     */
    private $expense;

    /**
     * @var \Orca\CoreBundle\Entity\Investment
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\Investment", mappedBy="typeContract")
     */
    private $investment;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=true, columnDefinition="ENUM('expense', 'investment')")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    /**
     * @var \DateTime $createdAt
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime $createdAt
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @return Expense
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * @param Expense $expense
     * @return TypeContract
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
     * @return TypeContract
     */
    public function setInvestment($investment)
    {
        $this->investment = $investment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return TypeContract
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return TypeContract
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return TypeContract
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return TypeContract
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return TypeContract
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
     * @return TypeContract
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
     * @return TypeContract
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
        return $this->getName();
    }
}
