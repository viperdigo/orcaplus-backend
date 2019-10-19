<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="investments")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity()
 */
class Investment
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
     * @var string
     */
    const TYPE_OWN = 'own';

    /**
     * @var string
     */
    const TYPE_FINANCED = 'financed';

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Unit
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\Unit", inversedBy="investment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_unit", referencedColumnName="id", nullable=false)
     * })
     * @Assert\NotBlank()
     */
    private $unit;

    /**
     * @var TypeContract
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\TypeContract", inversedBy="investment")
     * @ORM\JoinColumn(name="fk_type_contract", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $typeContract;

    /**
     * @var ResourceSource
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\ResourceSource", inversedBy="investment")
     * @ORM\JoinColumn(name="fk_resource_source", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank()
     */
    private $resourceSource;

    /**
     * @var TypeContract
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\Program", inversedBy="investment")
     * @ORM\JoinColumn(name="fk_program", referencedColumnName="id", nullable=true)
     * @Assert\NotBlank()
     */
    private $program;

    /**
     * @var InvestmentMonths
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\InvestmentMonths", mappedBy="investment")
     */
    private $months;

    /**
     * @var File
     *
     * @ORM\OneToMany(targetEntity="Orca\CoreBundle\Entity\File", mappedBy="investment")
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
     * @ORM\Column(name="number_contract_rc", type="string", nullable=false)
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
     */
    private $initialDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="period", type="integer", nullable=true)
     */
    private $period;

    /**
     * @var string
     *
     * @ORM\Column(name="object", type="text", length=255, nullable=true)
     */
    private $object;

    /**
     * @var string
     *
     * @ORM\Column(name="small_object", type="text", length=30, nullable=true)
     * @Assert\Length(
     *     max="30"
     * )
     */
    private $smallObject;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=true, columnDefinition="ENUM('financed', 'own')")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=true, columnDefinition="ENUM('active', 'inactive')")
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
        $this->setStatus(Investment::STATUS_ACTIVE);
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
     * @return Investment
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
     * @return Investment
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
     * @return Investment
     */
    public function setTypeContract($typeContract)
    {
        $this->typeContract = $typeContract;
        return $this;
    }

    /**
     * @return ResourceSource
     */
    public function getResourceSource()
    {
        return $this->resourceSource;
    }

    /**
     * @param ResourceSource $resourceSource
     * @return Investment
     */
    public function setResourceSource($resourceSource)
    {
        $this->resourceSource = $resourceSource;
        return $this;
    }

    /**
     * @return InvestmentMonths
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * @param InvestmentMonths $months
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
     * @return Investment
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
     * @return Investment
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
     * @return Investment
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
     * @return Investment
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
     * @return Investment
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
     * @return Investment
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
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
     * @return Investment
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
     * @return Investment
     */
    public function setObject($object)
    {
        $this->object = $object;
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
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return Investment
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
     * @return Investment
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
     * @return Investment
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @param InvestmentMonths $month
     * @return Investment $this
     */
    public function addMonth(InvestmentMonths $month)
    {
        $this->months[] = $month;

        return $this;
    }

    /**
     * @param InvestmentMonths $month
     */
    public function removeMonth(InvestmentMonths $month)
    {
        $this->months->removeElement($month);
    }

    /**
     * @param File $file
     * @return Investment $this
     */
    public function addFile(File $file)
    {
        $this->files[] = $file;

        return $this;
    }

    /**
     * @param File $file
     */
    public function removeFile(File $file)
    {
        $this->files->removeElement($file);
    }

    /**
     * @return File
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param File $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return string
     */
    public function getSmallObject()
    {
        return $this->smallObject;
    }

    /**
     * @param $smallObject
     * @return $this
     */
    public function setSmallObject($smallObject)
    {
        $this->smallObject = $smallObject;

        return $this;
    }

    /**
     * @return TypeContract
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * @param TypeContract $program
     */
    public function setProgram($program)
    {
        $this->program = $program;
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
     * @return Investment
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    public function __toString()
    {
        $status = $this->getStatus();
        $status == Expense::STATUS_ACTIVE ? 'Ativo' : 'Inativo';

        return $this->getNumberRc() . ' / ' . $this->getYear() . ' / ' . $this->getStatus();
    }

}
