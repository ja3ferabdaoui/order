<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $refId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statusMarketPlace;

    /**
     * @ORM\Column(type="string")
     */
    private $statusLengow;

    /**
     * @ORM\Column(type="datetime")
     */
    private $purchaseDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefId(): ?string
    {
        return $this->refId;
    }

    public function setRefId(string $refId): self
    {
        $this->refId = $refId;

        return $this;
    }

    public function getStatusMarketPlace(): ?string
    {
        return $this->statusMarketPlace;
    }

    public function setStatusMarketPlace(string $statusMarketPlace): self
    {
        $this->statusMarketPlace = $statusMarketPlace;

        return $this;
    }

    public function getStatusLengow(): ?string
    {
        return $this->statusLengow;
    }

    public function setStatusLengow(string $statusLengow): self
    {
        $this->statusLengow = $statusLengow;

        return $this;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(\DateTimeInterface $purchaseDate): self
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }
}
