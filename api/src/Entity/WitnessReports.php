<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      collectionOperations={
 *     "get"={"access_control"="is_granted('ROLE_USER')"},
 *     "post"
 *     },
 *     itemOperations={
 *     "get"={"access_control"="is_granted('ROLE_USER')"},
 *     "put"={"access_control"="is_granted('ROLE_USER')"},
 *     "delete"={"access_control"="is_granted('ROLE_USER')"}
 *     })
 * @ORM\Entity(repositoryClass="App\Repository\WitnessReportsRepository")
 */
class WitnessReports
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    private $content;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     *     )
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $quality;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $others;

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
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return WitnessReports
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return WitnessReports
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

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
     * @return WitnessReports
     */
    public function setFile($file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return WitnessReports
     */
    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     * @return WitnessReports
     */
    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     * @return WitnessReports
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuality(): ?string
    {
        return $this->quality;
    }

    /**
     * @param string|null $quality
     * @return WitnessReports
     */
    public function setQuality(?string $quality): self
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOthers(): ?string
    {
        return $this->others;
    }

    /**
     * @param string|null $others
     * @return WitnessReports
     */
    public function setOthers(?string $others): self
    {
        $this->others = $others;

        return $this;
    }
}
