<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'animal')]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'id', type: Types::INTEGER)]
    private ?int $id = null;

    /**
     * @var Collection<int, AnimalPicture>
     */
    #[ORM\OneToMany(targetEntity: AnimalPicture::class, mappedBy: 'animal' ,cascade: ['persist'], orphanRemoval: true)]
    private Collection $pictures;

    #[ORM\OneToOne(targetEntity: Species::class)]
    #[ORM\JoinColumn(name: 'species_id', referencedColumnName: 'id')]
    private ?Species $species = null;

    #[ORM\OneToOne(targetEntity: Breed::class)]
    #[ORM\JoinColumn(name: 'breed_id', referencedColumnName: 'id')]
    private ?Breed $breed = null;

    #[ORM\ManyToOne(targetEntity: Department::class)]
    #[ORM\JoinColumn(name: 'department_id', referencedColumnName: 'id')]
    private ?Department $department = null;

    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'city_id', referencedColumnName: 'id')]
    private ?City $city = null;

    #[ORM\Column(name: 'name', type: Types::STRING)]
    private ?string $name = null;

    #[ORM\Column(name: 'description', type: Types::STRING, nullable: true)]
    private ?string $description = null;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(AnimalPicture $picture): self
    {
        $this->pictures->add($picture);
        $picture->setAnimal($this);

        return $this;
    }

    public function removePicture(AnimalPicture $picture): self
    {
        $this->pictures->removeElement($picture);
        $picture->setAnimal(null);

        return $this;
    }

    public function getSpecies(): ?Species
    {
        return $this->species;
    }

    public function setSpecies(?Species $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getBreed(): ?Breed
    {
        return $this->breed;
    }

    public function setBreed(?Breed $breed): self
    {
        $this->breed = $breed;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
