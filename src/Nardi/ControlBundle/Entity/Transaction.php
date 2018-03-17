<?php

namespace App\Nardi\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Transaction
 *
 * @ORM\Table(name="transaction", uniqueConstraints={@ORM\UniqueConstraint(name="transaction_fitid_unique", columns={"fitid"})}, indexes={@ORM\Index(name="transaction_id_category_foreign", columns={"id_category"})})
 * @ORM\Entity(repositoryClass="App\Nardi\ControlBundle\Entity\Repository\TransactionRepository")
 * @Serializer\ExclusionPolicy("none")
 */
class Transaction
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Expose()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     * @Serializer\Expose()
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $value;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="fitid", type="string", length=255, nullable=false)
     */
    private $fitid;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     * })
     */
    private $idCategory;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Transaction
     */
    public function setId(int $id): Transaction
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Transaction
     */
    public function setDescription(string $description): Transaction
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Transaction
     */
    public function setValue(string $value): Transaction
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime|null $createdAt
     * @return Transaction
     */
    public function setCreatedAt(?\DateTime $createdAt): Transaction
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     * @return Transaction
     */
    public function setUpdatedAt(?\DateTime $updatedAt): Transaction
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeletedAt(): ?\DateTime
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime|null $deletedAt
     * @return Transaction
     */
    public function setDeletedAt(?\DateTime $deletedAt): Transaction
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime|null $date
     * @return Transaction
     */
    public function setDate(?\DateTime $date): Transaction
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getFitid(): string
    {
        return $this->fitid;
    }

    /**
     * @param string $fitid
     * @return Transaction
     */
    public function setFitid(string $fitid): Transaction
    {
        $this->fitid = $fitid;
        return $this;
    }

    /**
     * @return \Category
     */
    public function getIdCategory(): \Category
    {
        return $this->idCategory;
    }

    /**
     * @param \Category $idCategory
     * @return Transaction
     */
    public function setIdCategory(\Category $idCategory): Transaction
    {
        $this->idCategory = $idCategory;
        return $this;
    }



}
