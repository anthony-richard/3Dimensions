<?php

namespace App\Entity;

use App\Repository\FileModel3DRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FileModel3DRepository::class)
 */
class FileModel3D
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $arrayModel = [];

    /**
     * @ORM\OneToMany(targetEntity=Model3D::class, mappedBy="fileModel")
     */
    private $model3Ds;

    public function __construct()
    {
        $this->model3Ds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrayModel(): ?array
    {
        return $this->arrayModel;
    }

    public function setArrayModel(array $arrayModel): self
    {
        $this->$arrayModel = $arrayModel;

        return $this;
    }

    /**
     * @return Collection|Model3D[]
     */
    public function getModel3Ds(): Collection
    {
        return $this->model3Ds;
    }

    public function addModel3D(Model3D $model3D): self
    {
        if (!$this->model3Ds->contains($model3D)) {
            $this->model3Ds[] = $model3D;
            $model3D->setFileModel($this);
        }

        return $this;
    }

    public function removeModel3D(Model3D $model3D): self
    {
        if ($this->model3Ds->removeElement($model3D)) {
            // set the owning side to null (unless already changed)
            if ($model3D->getFileModel() === $this) {
                $model3D->setFileModel(null);
            }
        }

        return $this;
    }
}
