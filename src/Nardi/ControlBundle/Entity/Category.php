<?php

namespace App\Nardi\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category", indexes={@ORM\Index(name="category_id_category_foreign", columns={"id_category"})})
 * @ORM\Entity(repositoryClass="App\Nardi\ControlBundle\Entity\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pattern", type="string", length=255, nullable=true)
     */
    private $pattern;

    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer", nullable=false)
     */
    private $order;

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
     * @var bool
     *
     * @ORM\Column(name="debit", type="boolean", nullable=false, options={"default"="1"})
     */
    private $debit = '1';

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     * @return Category
     */
    public function setDescription(?string $description): Category
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    /**
     * @param null|string $pattern
     * @return Category
     */
    public function setPattern(?string $pattern): Category
    {
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return Category
     */
    public function setOrder(int $order): Category
    {
        $this->order = $order;
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
     * @return Category
     */
    public function setCreatedAt(?\DateTime $createdAt): Category
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
     * @return Category
     */
    public function setUpdatedAt(?\DateTime $updatedAt): Category
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
     * @return Category
     */
    public function setDeletedAt(?\DateTime $deletedAt): Category
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDebit(): bool
    {
        return $this->debit;
    }

    /**
     * @param bool $debit
     * @return Category
     */
    public function setDebit(bool $debit): Category
    {
        $this->debit = $debit;
        return $this;
    }

    /**
     * @return \Category
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * @param \Category $idCategory
     * @return Category
     */
    public function setIdCategory($idCategory): Category
    {
        $this->idCategory = $idCategory;
        return $this;
    }

}
