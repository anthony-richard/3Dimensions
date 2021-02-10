<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Administrator::class, cascade={"persist", "remove"})
     */
    private $Administrator;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="users")
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity=Model3D::class, mappedBy="users")
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

    public function getAdministrator(): ?Administrator
    {
        return $this->Administrator;
    }

    public function setAdministrator(?Administrator $Administrator): self
    {
        $this->Administrator = $Administrator;

        return $this;
    }

    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    public function setComment(?Comment $comment): self
    {
        $this->comment = $comment;

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
            $model3D->setUsers($this);
        }

        return $this;
    }

    public function removeModel3D(Model3D $model3D): self
    {
        if ($this->model3Ds->removeElement($model3D)) {
            // set the owning side to null (unless already changed)
            if ($model3D->getUsers() === $this) {
                $model3D->setUsers(null);
            }
        }

        return $this;
    }
}
