<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(collectionOperations={
 *     "get"
 *     },
 *     itemOperations={"get"}
)
 * @ApiFilter(SearchFilter::class, properties={"name": "istart"}
 *
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CitiesRepository")
 */
class Cities
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $lat;

    /**
     * @ORM\Column(type="float")
     */
    private $lon;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\GeoPoints", mappedBy="city", orphanRemoval=true)
     */
    private $geoPoints;

    public function __construct()
    {
        $this->geoPoints = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * @return Collection|GeoPoints[]
     */
    public function getGeoPoints(): Collection
    {
        return $this->geoPoints;
    }

    public function addGeoPoint(GeoPoints $geoPoint): self
    {
        if (!$this->geoPoints->contains($geoPoint)) {
            $this->geoPoints[] = $geoPoint;
            $geoPoint->setCity($this);
        }

        return $this;
    }

    public function removeGeoPoint(GeoPoints $geoPoint): self
    {
        if ($this->geoPoints->contains($geoPoint)) {
            $this->geoPoints->removeElement($geoPoint);
            // set the owning side to null (unless already changed)
            if ($geoPoint->getCity() === $this) {
                $geoPoint->setCity(null);
            }
        }

        return $this;
    }
}
