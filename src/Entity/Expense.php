<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="expenses")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity()
 */
class Expense
{

    /**
     * @var string
     */
    const STATUS_ACTIVE = 'active';

    /**
     * @var string
     */
    const STATUS_INACTIVE = 'inactive';

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Unit
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\Unit", inversedBy="expense")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_unit", referencedColumnName="id", nullable=false)
     * })
     * @Assert\NotBlank()
     */
    private $unit;

    /**
     * @var TypeContract
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\TypeContract", inversedBy="expense")
     * @ORM\JoinColumn(name="fk_type_contract", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $typeContract;

    /**
     * @var ExpenseGroup
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\ExpenseGroup", inversedBy="expense")
     * @ORM\JoinColumn(name="fk_group", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $group;

    /**
     * @var ExpenseMonths
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\ExpenseMonths", mappedBy="expense")
     */
    private $months;

    /**
     * @var File
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\File", mappedBy="expense")
     */
    private $files;

    /**
     * @var string
     *
     * @ORM\Column(name="number_contract", type="string", nullable=true)
     */
    private $numberContract;

    /**
     * @var string
     *
     * @ORM\Column(name="number_contract_sap", type="string", nullable=true)
     */
    private $numberContractSap;

    /**
     * @var string
     *
     * @ORM\Column(name="number_rc", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $numberRc;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     * @Assert\NotBlank()
     */
    private $year;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initial_date", type="date", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Expression(
     *     "value < this.getEndDate()",
     *     message="Essa data não pode ser maior que a data final do contrato."
     * )
     */
    private $initialDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Date()
     * @Assert\Expression(
     *     "value > this.getInitialDate()",
     *     message="Essa data não pode ser menor que a data inicial do contrato."
     * )
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="period", type="integer", nullable=false)
     */
    private $period;

    /**
     * @var string
     *
     * @ORM\Column(name="object", type="text", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $object;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=true, columnDefinition="ENUM('active', 'inactive')")
     * @Assert\NotBlank()
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="owner", type="string", nullable=true)
     */
    private $owner;

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

    public function __construct()
    {
        $this->months = new ArrayCollection();
        $this->files = new ArrayCollection();
        $this->setStatus(Expense::STATUS_ACTIVE);
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
     * @return Expense
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param Unit $unit
     * @return Expense
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * @return TypeContract
     */
    public function getTypeContract()
    {
        return $this->typeContract;
    }

    /**
     * @param TypeContract $typeContract
     * @return Expense
     */
    public function setTypeContract($typeContract)
    {
        $this->typeContract = $typeContract;
        return $this;
    }

    /**
     * @return ExpenseGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param ExpenseGroup $group
     * @return Expense
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return ExpenseMonths
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * @param ExpenseMonths $months
     */
    public function setMonths($months)
    {
        $this->months = $months;
    }

    /**
     * @return string
     */
    public function getNumberContract()
    {
        return $this->numberContract;
    }

    /**
     * @param string $numberContract
     * @return Expense
     */
    public function setNumberContract($numberContract)
    {
        $this->numberContract = $numberContract;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumberContractSap()
    {
        return $this->numberContractSap;
    }

    /**
     * @param string $numberContractSap
     * @return Expense
     */
    public function setNumberContractSap($numberContractSap)
    {
        $this->numberContractSap = $numberContractSap;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumberRc()
    {
        return $this->numberRc;
    }

    /**
     * @param string $numberRc
     * @return Expense
     */
    public function setNumberRc($numberRc)
    {
        $this->numberRc = $numberRc;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return Expense
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInitialDate()
    {
        return $this->initialDate;
    }

    /**
     * @param \DateTime $initialDate
     * @return Expense
     */
    public function setInitialDate($initialDate)
    {
        $this->initialDate = $initialDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     * @return Expense
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @param mixed $fulfilledValue
     * @return Expense
     */
    public function setFulfilledValue($fulfilledValue)
    {
        $this->fulfilledValue = $fulfilledValue;
        return $this;
    }

    /**
     * @return int
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param int $period
     * @return Expense
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param string $object
     * @return Expense
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Expense
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return Expense
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
     * @return Expense
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Add month
     *
     * @param ExpenseMonths $month
     *
     * @return Expense
     */
    public function addMonth(ExpenseMonths $month)
    {
        $this->months[] = $month;

        return $this;
    }

    /**
     * Remove month
     *
     * @param ExpenseMonths $month
     */
    public function removeMonth(ExpenseMonths $month)
    {
        $this->months->removeElement($month);
    }

    /**
     * @param File $file
     * @return $this
     */
    public function addFile(File $file)
    {
        $this->files[] = $file;

        return $this;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     * @return Expense
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @param File $file
     */
    public function removeFile(File $file)
    {
        $this->files->removeElement($file);
    }

    public function __toString()
    {
        $status = $this->getStatus();
        $status == Expense::STATUS_ACTIVE ? 'Ativo' : 'Inativo';

        return $this->getNumberRc() . ' / ' . $this->getYear() . ' / ' . $this->getStatus();
    }
}
