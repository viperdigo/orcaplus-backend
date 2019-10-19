<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * File
 *
 * @ORM\Table(name="files")
 * @ORM\Entity()
 */
class File
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\FileType")
     * @ORM\JoinColumn(name="fk_file_type", referencedColumnName="id", nullable=true)
     */
    private $fileType;

    /**
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\Expense")
     * @ORM\JoinColumn(name="fk_expense", referencedColumnName="id", nullable=true)
     */
    private $expense;

    /**
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\Investment")
     * @ORM\JoinColumn(name="fk_investment", referencedColumnName="id", nullable=true)
     */
    private $investment;

    /**
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\Analyze")
     * @ORM\JoinColumn(name="fk_analyze", referencedColumnName="id", nullable=true)
     */
    private $analyze;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Valid()
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=5)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255)
     * @Assert\Valid()
     * @Assert\NotBlank()
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     * @Assert\Valid()
     * @Assert\NotBlank()
     */
    private $path;

    /**
     * @var \DateTime $createdAt
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_id", referencedColumnName="id")
     * })
     */
    private $createdId;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="updated_id", referencedColumnName="id")
     * })
     */
    private $updatedId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return File
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param mixed $fileType
     * @return File
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * @param mixed $expense
     * @return File
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInvestment()
    {
        return $this->investment;
    }

    /**
     * @param mixed $investment
     * @return File
     */
    public function setInvestment($investment)
    {
        $this->investment = $investment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnalyze()
    {
        return $this->analyze;
    }

    /**
     * @param mixed $analyze
     * @return File
     */
    public function setAnalyze($analyze)
    {
        $this->analyze = $analyze;
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
     * @return File
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     * @return File
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return File
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return File
     */
    public function setPath($path)
    {
        $this->path = $path;
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
     * @return File
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
     * @return File
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return User
     */
    public function getCreatedId()
    {
        return $this->createdId;
    }

    /**
     * @param User $createdId
     * @return File
     */
    public function setCreatedId($createdId)
    {
        $this->createdId = $createdId;
        return $this;
    }

    /**
     * @return User
     */
    public function getUpdatedId()
    {
        return $this->updatedId;
    }

    /**
     * @param User $updatedId
     * @return File
     */
    public function setUpdatedId($updatedId)
    {
        $this->updatedId = $updatedId;
        return $this;
    }

}
