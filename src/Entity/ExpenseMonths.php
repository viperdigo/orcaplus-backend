<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="expense_months")
 * @ORM\Entity
 */
class ExpenseMonths
{
    /**
     * @var string
     */
    const TYPE_EXPECTED_MN = 'expectedMn';

    /**
     * @var string
     */
    const TYPE_EXPECTED_SAP = 'expectedSap';

    /**
     * @var string
     */
    const TYPE_FULFILLED_CALCULATED = 'fulfilledCalculated';

    /**
     * @var string
     */
    const TYPE_FULFILLED_PAID = 'fulfilledPaid';

    /**
     * @var string
     */
    const TYPE_DIFFERENCE = 'difference';

    /**
     * @var string
     */
    const TYPE_TOTALS = 'totals';

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Expense
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\Expense", inversedBy="months")
     * @ORM\JoinColumn(name="fk_expense", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $expense;

    /**
     * @var double
     *
     * @ORM\Column(name="year", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $year;

    /**
     * @var double
     *
     * @ORM\Column(name="type", type="string", nullable=true, columnDefinition="ENUM('expectedMn', 'expectedSap', 'fulfilledCalculated', 'fulfilledPaid')")
     */
    private $type;

    /**
     * @var double
     *
     * @ORM\Column(name="january", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $january;

    /**
     * @var double
     *
     * @ORM\Column(name="february", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $february;

    /**
     * @var double
     *
     * @ORM\Column(name="march", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $march;

    /**
     * @var double
     *
     * @ORM\Column(name="april", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $april;

    /**
     * @var double
     *
     * @ORM\Column(name="may", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $may;

    /**
     * @var double
     *
     * @ORM\Column(name="june", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $june;

    /**
     * @var double
     *
     * @ORM\Column(name="july", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $july;

    /**
     * @var double
     *
     * @ORM\Column(name="august", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $august;

    /**
     * @var double
     *
     * @ORM\Column(name="september", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $september;

    /**
     * @var double
     *
     * @ORM\Column(name="october", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $october;

    /**
     * @var double
     *
     * @ORM\Column(name="november", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $november;

    /**
     * @var double
     *
     * @ORM\Column(name="december", type="decimal", precision=14, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $december;

    /**
     * @var double
     *
     * @ORM\Column(name="total", type="decimal", precision=16, scale=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $total;

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
     * @return ExpenseMonths
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
     * @return ExpenseMonths
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
        return $this;
    }

    /**
     * @return float
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param float $year
     * @return ExpenseMonths
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return float
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param float $type
     * @return ExpenseMonths
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getJanuary()
    {
        return $this->january;
    }

    /**
     * @param float $january
     * @return ExpenseMonths
     */
    public function setJanuary($january)
    {
        $this->january = $january;
        return $this;
    }

    /**
     * @return float
     */
    public function getFebruary()
    {
        return $this->february;
    }

    /**
     * @param float $february
     * @return ExpenseMonths
     */
    public function setFebruary($february)
    {
        $this->february = $february;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarch()
    {
        return $this->march;
    }

    /**
     * @param float $march
     * @return ExpenseMonths
     */
    public function setMarch($march)
    {
        $this->march = $march;
        return $this;
    }

    /**
     * @return float
     */
    public function getApril()
    {
        return $this->april;
    }

    /**
     * @param float $april
     * @return ExpenseMonths
     */
    public function setApril($april)
    {
        $this->april = $april;
        return $this;
    }

    /**
     * @return float
     */
    public function getMay()
    {
        return $this->may;
    }

    /**
     * @param float $may
     * @return ExpenseMonths
     */
    public function setMay($may)
    {
        $this->may = $may;
        return $this;
    }

    /**
     * @return float
     */
    public function getJune()
    {
        return $this->june;
    }

    /**
     * @param float $june
     * @return ExpenseMonths
     */
    public function setJune($june)
    {
        $this->june = $june;
        return $this;
    }

    /**
     * @return float
     */
    public function getJuly()
    {
        return $this->july;
    }

    /**
     * @param float $july
     * @return ExpenseMonths
     */
    public function setJuly($july)
    {
        $this->july = $july;
        return $this;
    }

    /**
     * @return float
     */
    public function getAugust()
    {
        return $this->august;
    }

    /**
     * @param float $august
     * @return ExpenseMonths
     */
    public function setAugust($august)
    {
        $this->august = $august;
        return $this;
    }

    /**
     * @return float
     */
    public function getSeptember()
    {
        return $this->september;
    }

    /**
     * @param float $september
     * @return ExpenseMonths
     */
    public function setSeptember($september)
    {
        $this->september = $september;
        return $this;
    }

    /**
     * @return float
     */
    public function getOctober()
    {
        return $this->october;
    }

    /**
     * @param float $october
     * @return ExpenseMonths
     */
    public function setOctober($october)
    {
        $this->october = $october;
        return $this;
    }

    /**
     * @return float
     */
    public function getNovember()
    {
        return $this->november;
    }

    /**
     * @param float $november
     * @return ExpenseMonths
     */
    public function setNovember($november)
    {
        $this->november = $november;
        return $this;
    }

    /**
     * @return float
     */
    public function getDecember()
    {
        return $this->december;
    }

    /**
     * @param float $december
     * @return ExpenseMonths
     */
    public function setDecember($december)
    {
        $this->december = $december;
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
     * @return ExpenseMonths
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
     * @return ExpenseMonths
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param $total
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

}
