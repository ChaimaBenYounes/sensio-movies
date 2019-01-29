<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movie", mappedBy="producer")
     */
    private $producer_movies;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Movie", mappedBy="actors")
     */
    private $actors_movies;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="text")
     */
    private $biography;

    public function __construct()
    {
        $this->producer_movies = new ArrayCollection();
        $this->actors_movies = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Movie[]
     */
    public function getProducerMovies(): Collection
    {
        return $this->producer_movies;
    }

    public function addProducerMovie(Movie $producerMovie): self
    {
        if (!$this->producer_movies->contains($producerMovie)) {
            $this->producer_movies[] = $producerMovie;
            $producerMovie->setProducer($this);
        }

        return $this;
    }

    public function removeProducerMovie(Movie $producerMovie): self
    {
        if ($this->producer_movies->contains($producerMovie)) {
            $this->producer_movies->removeElement($producerMovie);
            // set the owning side to null (unless already changed)
            if ($producerMovie->getProducer() === $this) {
                $producerMovie->setProducer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Movie[]
     */
    public function getActorsMovies(): Collection
    {
        return $this->actors_movies;
    }

    public function addActorsMovie(Movie $actorsMovie): self
    {
        if (!$this->actors_movies->contains($actorsMovie)) {
            $this->actors_movies[] = $actorsMovie;
            $actorsMovie->addActor($this);
        }

        return $this;
    }

    public function removeActorsMovie(Movie $actorsMovie): self
    {
        if ($this->actors_movies->contains($actorsMovie)) {
            $this->actors_movies->removeElement($actorsMovie);
            $actorsMovie->removeActor($this);
        }

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }
}
