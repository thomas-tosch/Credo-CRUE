<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
 * @ApiFilter(SearchFilter::class)
 * @ApiFilter(DateFilter::class, properties={"date"})
 * @ORM\Entity(repositoryClass="App\Repository\ResourcesRepository")
 */
class Resources
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\File
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="resources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $work_direction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $revue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $work_title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $editor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pages;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $director;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $producer;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $link;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comments", mappedBy="resources")
     * @ApiSubresource()
     */
    private $comments;

    /**
     * Resources constructor.
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Resources
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Resources
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Resources
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    /**
     * @param string $thumbnail
     * @return Resources
     */
    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return Resources
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param DateTimeInterface|null $date
     * @return Resources
     */
    public function setDate(?DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWorkDirection(): ?string
    {
        return $this->work_direction;
    }

    /**
     * @param string|null $work_direction
     * @return Resources
     */
    public function setWorkDirection(?string $work_direction): self
    {
        $this->work_direction = $work_direction;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRevue(): ?string
    {
        return $this->revue;
    }

    /**
     * @param string|null $revue
     * @return Resources
     */
    public function setRevue(?string $revue): self
    {
        $this->revue = $revue;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWorkTitle(): ?string
    {
        return $this->work_title;
    }

    /**
     * @param string|null $work_title
     * @return Resources
     */
    public function setWorkTitle(?string $work_title): self
    {
        $this->work_title = $work_title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     * @return Resources
     */
    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEditor(): ?string
    {
        return $this->editor;
    }

    /**
     * @param string|null $editor
     * @return Resources
     */
    public function setEditor(?string $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPages(): ?string
    {
        return $this->pages;
    }

    /**
     * @param string|null $pages
     * @return Resources
     */
    public function setPages(?string $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlace(): ?string
    {
        return $this->place;
    }

    /**
     * @param string|null $place
     * @return Resources
     */
    public function setPlace(?string $place): self
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     * @return Resources
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     * @return Resources
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Resources
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDirector(): ?string
    {
        return $this->director;
    }

    /**
     * @param string|null $director
     * @return Resources
     */
    public function setDirector(?string $director): self
    {
        $this->director = $director;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProducer(): ?string
    {
        return $this->producer;
    }

    /**
     * @param string|null $producer
     * @return Resources
     */
    public function setProducer(?string $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     * @return Resources
     */
    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * @param Comments $comments
     * @return Resources
     */
    public function addComment(Comments $comments): self
    {
        if (!$this->comments->contains($comments)) {
            $this->comments[] = $comments;
            $comments->setResources($this);
        }

        return $this;
    }

    /**
     * @param Comments $comments
     * @return Resources
     */
    public function removeComment(Comments $comments): self
    {
        if ($this->comments->contains($comments)) {
            $this->comments->removeElement($comments);
            // set the owning side to null (unless already changed)
            if ($comments->getResources() === $this) {
                $comments->setResources(null);
            }
        }

        return $this;
    }
}
