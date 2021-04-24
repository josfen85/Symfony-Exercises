<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Author;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Publication;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }


  public function getAuthor(): ?string
  {
      return $this->Author;
  }

  public function setAuthor(string $Author): self
  {
      $this->Author = $Author;

      return $this;
  }

  public function getYear(): ?string
  {
      return $this->Year;
  }

  public function setYear(?string $Year): self
  {
      $this->Year = $Year;

      return $this;
  }

  public function getPublication(): ?string
  {
      return $this->Publication;
  }

  public function setPublication(string $Publication): self
  {
      $this->Publication = $Publication;

      return $this;
  }
}
