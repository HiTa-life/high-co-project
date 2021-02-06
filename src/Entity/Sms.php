<?php

namespace App\Entity;

use App\Repository\SmsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SmsRepository::class)
 */
class Sms
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
    private $sms_contain;

    /**
     * @ORM\ManyToOne(targetEntity=Contact::class, inversedBy="smsMessages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contact;

    public function getId(): ?int
    {
        return $this->id;
    }

     public function getSmsContain(): ?string
    {
        return $this->sms_contain;
    }

    public function setSmsContain(?string $sms_contain): self
    {
        $this->sms_contain = $sms_contain;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }
}
