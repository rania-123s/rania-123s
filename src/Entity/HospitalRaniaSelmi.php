<?php

namespace App\Entity;

use App\Repository\HospitalRaniaSelmiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HospitalRaniaSelmiRepository::class)]
class HospitalRaniaSelmi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomRaniaSelmi = null;

    #[ORM\Column]
    private ?int $nbrchRaniaSelmi = null;

    /**
     * @var Collection<int, ChambreRaniaSelmi>
     */
    #[ORM\OneToMany(targetEntity: ChambreRaniaSelmi::class, mappedBy: 'hospitalRaniaSelmi')]
    private Collection $chambresRaniaSelmi;

    public function __construct()
    {
        $this->chambresRaniaSelmi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRaniaSelmi(): ?string
    {
        return $this->nomRaniaSelmi;
    }

    public function setNomRaniaSelmi(string $nomRaniaSelmi): static
    {
        $this->nomRaniaSelmi = $nomRaniaSelmi;

        return $this;
    }

    public function getNbrchRaniaSelmi(): ?int
    {
        return $this->nbrchRaniaSelmi;
    }

    public function setNbrchRaniaSelmi(int $nbrchRaniaSelmi): static
    {
        $this->nbrchRaniaSelmi = $nbrchRaniaSelmi;

        return $this;
    }

    /**
     * @return Collection<int, ChambreRaniaSelmi>
     */
    public function getChambresRaniaSelmi(): Collection
    {
        return $this->chambresRaniaSelmi;
    }

    public function addChambresRaniaSelmi(ChambreRaniaSelmi $chambresRaniaSelmi): static
    {
        if (!$this->chambresRaniaSelmi->contains($chambresRaniaSelmi)) {
            $this->chambresRaniaSelmi->add($chambresRaniaSelmi);
            $chambresRaniaSelmi->setHospitalRaniaSelmi($this);
        }

        return $this;
    }

    public function removeChambresRaniaSelmi(ChambreRaniaSelmi $chambresRaniaSelmi): static
    {
        if ($this->chambresRaniaSelmi->removeElement($chambresRaniaSelmi)) {
            // set the owning side to null (unless already changed)
            if ($chambresRaniaSelmi->getHospitalRaniaSelmi() === $this) {
                $chambresRaniaSelmi->setHospitalRaniaSelmi(null);
            }
        }

        return $this;
    }
}
