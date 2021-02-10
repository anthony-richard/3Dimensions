<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Model3D::class)
     */
    private $models3D;

    public function __construct()
    {
        $this->models3D = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Model3D[]
     */
    public function getModels3D(): Collection
    {
        return $this->models3D;
    }

    public function addModels3D(Model3D $models3D): self
    {
        if (!$this->models3D->contains($models3D)) {
            $this->models3D[] = $models3D;
        }

        return $this;
    }

    public function removeModels3D(Model3D $models3D): self
    {
        $this->models3D->removeElement($models3D);

        return $this;
    }
}
