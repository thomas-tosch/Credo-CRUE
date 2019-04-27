<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
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
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
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
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="comments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $articles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Resources", inversedBy="comments")
     * @ORM\JoinColumn(nullable=true)
     */
    private $resources;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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
     * @return Comments
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Comments
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Articles|null
     */
    public function getArticles(): ?Articles
    {
        return $this->articles;
    }

    /**
     * @param Articles|null $articles
     * @return Comments
     */
    public function setArticles(?Articles $articles): self
    {
        $this->articles = $articles;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getUser(): ?Users
    {
        return $this->user;
    }

    /**
     * @param Users|null $user
     * @return Comments
     */
    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Resources|null
     */
    public function getResources(): ?Resources
    {
        return $this->resources;
    }

    /**
     * @param Resources $resources
     * @return Comments
     */
    public function setResources(Resources $resources): self
    {
        $this->resources = $resources;

        return $this;
    }
}
