<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoHabitacionRepository")
 */
class TipoHabitacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $cod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numcamas;

    /**
     * @ORM\Column(type="blob")
     */
    private $pic;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCod(): ?int
    {
        return $this->cod;
    }

    public function setCod(int $cod): self
    {
        $this->cod = $cod;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getNumcamas(): ?int
    {
        return $this->Numcamas;
    }

    public function setNumcamas(int $Numcamas): self
    {
        $this->Numcamas = $Numcamas;

        return $this;
    }

    public function getPic()
    {
        return $this->pic;
    }

    public function setPic($pic): self
    {
        $this->pic = $pic;

        return $this;
    }
}
