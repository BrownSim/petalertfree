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
    public const GENDER_MALE = 10;
    public const GENDER_FEMALE = 20;

    public const SILHOUETTE_THIN = 10;
    public const SILHOUETTE_NORMAL = 20;
    public const SILHOUETTE_PLUMP = 30;

    public const SIZE_SMALL = 10;
    public const SIZE_NORMAL = 20;
    public const SIZE_TALL = 30;

    public const FUR_SHORT = 10;
    public const FUR_MID_LENGTH = 20;
    public const FUR_LONG = 30;
    public const FUR_HARD = 40;
    public const FUR_CURLY = 50;
    public const FUR_WITHOUT = 60;

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

    #[ORM\ManyToOne(targetEntity: Contact::class)]
    #[ORM\JoinColumn(name: 'contact_id', referencedColumnName: 'id')]
    private ?Contact $contact = null;

    #[ORM\Column(name: 'hybrid', type: Types::BOOLEAN, nullable: true)]
    private ?bool $hybrid;

    #[ORM\Column(name: 'castrated', type: Types::BOOLEAN, nullable: true)]
    private ?bool $castrated;

    #[ORM\Column(name: 'chipped', type: Types::BOOLEAN, nullable: true)]
    private ?bool $chipped;

    #[ORM\Column(name: 'tattoo', type: Types::BOOLEAN, nullable: true)]
    private ?bool $tattoo;

    #[ORM\Column(name: 'collar', type: Types::BOOLEAN, nullable: true)]
    private ?bool $collar;

    #[ORM\Column(name: 'silhouette', type: Types::INTEGER, nullable: true)]
    private ?int $silhouette;

    #[ORM\Column(name: 'size', type: Types::INTEGER, nullable: true)]
    private ?int $size;

    #[ORM\Column(name: 'fur_type', type: Types::INTEGER, nullable: true)]
    private ?int $furType;

    #[ORM\Column(name: 'name', type: Types::STRING)]
    private ?string $name = null;

    #[ORM\Column(name: 'description', type: Types::STRING, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'lost_date', type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $lostDate = null;


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

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getHybrid(): ?bool
    {
        return $this->hybrid;
    }

    public function setHybrid(?bool $hybrid): self
    {
        $this->hybrid = $hybrid;

        return $this;
    }

    public function getCastrated(): ?bool
    {
        return $this->castrated;
    }

    public function setCastrated(?bool $castrated): self
    {
        $this->castrated = $castrated;

        return $this;
    }

    public function getChipped(): ?bool
    {
        return $this->chipped;
    }

    public function setChipped(?bool $chipped): self
    {
        $this->chipped = $chipped;

        return $this;
    }

    public function getTattoo(): ?bool
    {
        return $this->tattoo;
    }

    public function setTattoo(?bool $tattoo): self
    {
        $this->tattoo = $tattoo;

        return $this;
    }

    public function getCollar(): ?bool
    {
        return $this->collar;
    }

    public function setCollar(?bool $collar): self
    {
        $this->collar = $collar;

        return $this;
    }

    public function getSilhouette(): ?int
    {
        return $this->silhouette;
    }

    public function setSilhouette(?int $silhouette): self
    {
        $this->silhouette = $silhouette;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getFurType(): ?int
    {
        return $this->furType;
    }

    public function setFurType(?int $furType): self
    {
        $this->furType = $furType;

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

    public function getLostDate(): ?\DateTimeImmutable
    {
        return $this->lostDate;
    }

    public function setLostDate(?\DateTimeImmutable $lostDate): self
    {
        $this->lostDate = $lostDate;

        return $this;
    }
}
