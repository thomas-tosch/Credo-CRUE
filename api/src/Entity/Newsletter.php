<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\NewsletterRepository")
 * @UniqueEntity(
 *  fields={"mail"},
 *  message="L'email que vous avez indiqué est déjà pris par un autre utilisateur.")
 */
class Newsletter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email(
     *     message = "Erreur d'interprétation. Veuillez renseigner une adresse mail valide !",
     *     checkMX = true)
     */
    public $mail;

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
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Newsletter
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
}
