<?php

namespace App\Entity;

use App\Repository\ChambreRaniaSelmiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChambreRaniaSelmiRepository::class)]
class ChambreRaniaSelmi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numchRaniaSelmi = null;

    #[ORM\Column(length: 255)]
    private ?string $patientRaniaSelmi = null;

    #[ORM\ManyToOne(inversedBy: 'chambresRaniaSelmi')]
    private ?HospitalRaniaSelmi $hospitalRaniaSelmi = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumchRaniaSelmi(): ?int
    {
        return $this->numchRaniaSelmi;
    }

    public function setNumchRaniaSelmi(int $numchRaniaSelmi): static
    {
        $this->numchRaniaSelmi = $numchRaniaSelmi;

        return $this;
    }

    public function getPatientRaniaSelmi(): ?string
    {
        return $this->patientRaniaSelmi;
    }

    public function setPatientRaniaSelmi(string $patientRaniaSelmi): static
    {
        $this->patientRaniaSelmi = $patientRaniaSelmi;

        return $this;
    }

    public function getHospitalRaniaSelmi(): ?HospitalRaniaSelmi
    {
        return $this->hospitalRaniaSelmi;
    }

    public function setHospitalRaniaSelmi(?HospitalRaniaSelmi $hospitalRaniaSelmi): static
    {
        $this->hospitalRaniaSelmi = $hospitalRaniaSelmi;

        return $this;
    }
}
