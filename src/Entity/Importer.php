<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Importer
 * @package App\Entity
 * @author Rodrigo Alfieri <viperdigo@gmail.com>
 * @ORM\Table(name="importer")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity()
 */
class Importer
{
    const TYPE_NEW_CONTRACTS = 'newContracts';
    const TYPE_UPDATE_CONTRACTS = 'updateContracts';

    const TYPE_CONTRACT_EXPENSE = 'expense';
    const TYPE_CONTRACT_INVESTMENT = 'investment';

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=true, columnDefinition="ENUM('newContracts', 'updateContracts')")
     * @Assert\NotBlank()
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="type_contract", type="string", nullable=true, columnDefinition="ENUM('expense', 'investment')")
     * @Assert\NotBlank()
     */
    private $typeContract;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $file;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Orca\CoreBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_user", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_records", type="integer", nullable=false)
     */
    private $quantityRecords;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_imports", type="integer", nullable=false)
     */
    private $quantityImports;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_errors", type="integer", nullable=false)
     */
    private $quantityErrors;

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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getQuantityRecords()
    {
        return $this->quantityRecords;
    }

    /**
     * @param int $quantityRecords
     */
    public function setQuantityRecords($quantityRecords)
    {
        $this->quantityRecords = $quantityRecords;
    }

    /**
     * @return int
     */
    public function getQuantityImports()
    {
        return $this->quantityImports;
    }

    /**
     * @param int $quantityImports
     */
    public function setQuantityImports($quantityImports)
    {
        $this->quantityImports = $quantityImports;
    }

    /**
     * @return int
     */
    public function getQuantityErrors()
    {
        return $this->quantityErrors;
    }

    /**
     * @param int $quantityErrors
     */
    public function setQuantityErrors($quantityErrors)
    {
        $this->quantityErrors = $quantityErrors;
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
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
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
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getTypeContract()
    {
        return $this->typeContract;
    }

    /**
     * @param string $typeContract
     */
    public function setTypeContract($typeContract)
    {
        $this->typeContract = $typeContract;
    }

}
