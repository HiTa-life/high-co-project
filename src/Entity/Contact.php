<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $smsMessage;

    /**
     * @ORM\OneToMany(targetEntity=Sms::class, mappedBy="contact")
     */
    private $smsMessages;

    public function __construct()
    {
        $this->smsMessages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSmsMessage(): ?string
    {
        return $this->smsMessage;
    }

    public function setSmsMessage(?string $smsMessage): self
    {
        $this->smsMessage = $smsMessage;

        return $this;
    }

    /**
     * @return Collection|Sms[]
     */
    public function getSmsMessages(): Collection
    {
        return $this->smsMessages;
    }

    public function addSmsMessage(Sms $smsMessage): self
    {
        if (!$this->smsMessages->contains($smsMessage)) {
            $this->smsMessages[] = $smsMessage;
            $smsMessage->setContact($this);
        }

        return $this;
    }

    public function removeSmsMessage(Sms $smsMessage): self
    {
        if ($this->smsMessages->removeElement($smsMessage)) {
            // set the owning side to null (unless already changed)
            if ($smsMessage->getContact() === $this) {
                $smsMessage->setContact(null);
            }
        }

        return $this;
    }
}
