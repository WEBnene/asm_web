<?php

namespace App\Entity;

use App\Repository\BillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillRepository::class)
 */
class Bill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=BillDetail::class)
     */
    private $BillDetail;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Customer;

    /**
     * @ORM\ManyToOne(targetEntity=Staff::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Staff;

    /**
     * @ORM\Column(type="float")
     */
    private $Discount;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    public function __construct()
    {
        $this->BillDetail = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, BillDetail>
     */
    public function getBillDetail(): Collection
    {
        return $this->BillDetail;
    }

    public function addBillDetail(BillDetail $billDetail): self
    {
        if (!$this->BillDetail->contains($billDetail)) {
            $this->BillDetail[] = $billDetail;
        }

        return $this;
    }

    public function removeBillDetail(BillDetail $billDetail): self
    {
        $this->BillDetail->removeElement($billDetail);

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->Customer;
    }

    public function setCustomer(?Customer $Customer): self
    {
        $this->Customer = $Customer;

        return $this;
    }

    public function getStaff(): ?Staff
    {
        return $this->Staff;
    }

    public function setStaff(?Staff $Staff): self
    {
        $this->Staff = $Staff;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->Discount;
    }

    public function setDiscount(float $Discount): self
    {
        $this->Discount = $Discount;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
