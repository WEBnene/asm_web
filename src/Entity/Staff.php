<?php

namespace App\Entity;

use App\Repository\StaffRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StaffRepository::class)
 */
class Staff
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $First_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Last_name;
    public function __toString() {
        return $this->First_name;
    }

    /**
     * @ORM\Column(type="date")
     */
    private $Birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Phone_number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->First_name;
    }

    public function setFirstName(string $First_name): self
    {
        $this->First_name = $First_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->Last_name;
    }

    public function setLastName(string $Last_name ): self
    {
        $this->Last_name = $Last_name;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->Birthday;
    }

    public function setBirthday(\DateTimeInterface $Birthday): self
    {
        $this->Birthday = $Birthday;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->Phone_number;
    }

    public function setPhoneNumber(string $Phone_number): self
    {
        $this->Phone_number = $Phone_number;

        return $this;
    }
}
