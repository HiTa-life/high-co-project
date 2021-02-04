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
     * @ORM\Column(type="integer")
     */
    private $sms_idcontact;

    /**
     * @ORM\Column(type="string", length=190, nullable=true)
     */
    private $sms_contain;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSmsIdcontact(): ?int
    {
        return $this->sms_idcontact;
    }

    public function setSmsIdcontact(int $sms_idcontact): self
    {
        $this->sms_idcontact = $sms_idcontact;

        return $this;
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
}
