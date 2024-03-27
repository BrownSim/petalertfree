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

    #[ORM\OneToOne(targetEntity: AnimalType::class)]
    #[ORM\JoinColumn(name: 'animal_type_id', referencedColumnName: 'id')]
    private ?AnimalType $animalType = null;

    #[ORM\OneToOne(targetEntity: Breed::class)]
    #[ORM\JoinColumn(name: 'breed_id', referencedColumnName: 'id')]
    private ?Breed $breed = null;

    #[ORM\ManyToOne(targetEntity: Department::class)]
    #[ORM\JoinColumn(name: 'department_id', referencedColumnName: 'id')]
    private ?Department $department = null;

    #[ORM\ManyToOne(targetEntity: City::class)]
    #[ORM\JoinColumn(name: 'city_id', referencedColumnName: 'id')]
    private ?City $city = null;

    #[ORM\Column(name: 'label', type: Types::STRING)]
    private ?string $label = null;

    #[ORM\Column(name: 'description', type: Types::STRING)]
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

    public function getAnimalType(): ?AnimalType
    {
        return $this->animalType;
    }

    public function setAnimalType(?AnimalType $animalType): self
    {
        $this->animalType = $animalType;

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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

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
