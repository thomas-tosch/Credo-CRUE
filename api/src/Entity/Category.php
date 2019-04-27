<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      collectionOperations={
 *     "get",
 *     "post"={"access_control"="is_granted('ROLE_USER')"}
 *     },
 *     itemOperations={
 *     "get",
 *     "put"={"access_control"="is_granted('ROLE_USER')"},
 *     "delete"={"access_control"="is_granted('ROLE_USER')"}
 *     })
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\OneToMany(targetEntity="App\Entity\Resources", mappedBy="category")
     * @ApiSubresource()
     */
    private $resources;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->resources = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function __toString()
    {
        return $this->getName();
        // TODO: Implement __toString() method.
    }

    /**
     * @return Collection|Resources[]
     */
    public function getResources(): Collection
    {
        return $this->resources;
    }

    /**
     * @param Resources $resource
     * @return Category
     */
    public function addResource(Resources $resource): self
    {
        if (!$this->resources->contains($resource)) {
            $this->resources[] = $resource;
            $resource->setCategory($this);
        }

        return $this;
    }

    /**
     * @param Resources $resources
     * @return Category
     */
    public function removeResource(Resources $resources): self
    {
        if ($this->resources->contains($resources)) {
            $this->resources->removeElement($resources);
            // set the owning side to null (unless already changed)
            if ($resources->getCategory() === $this) {
                $resources->setCategory(null);
            }
        }

        return $this;
    }
}
