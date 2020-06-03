<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HabitacionRepository")
 */
class Habitacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoHabitacion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Tipo;

    /**
     * @ORM\Column(type="integer")
     */
    private $num;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $precio;

    /**
     * @ORM\Column(type="boolean")
     */
    private $terraza;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?TipoHabitacion
    {
        return $this->Tipo;
    }

    public function setTipo(?TipoHabitacion $Tipo): self
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(int $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getTerraza(): ?bool
    {
        return $this->terraza;
    }

    public function setTerraza(bool $terraza): self
    {
        $this->terraza = $terraza;

        return $this;
    }

    public function getTv(): ?bool
    {
        return $this->tv;
    }

    public function setTv(bool $tv): self
    {
        $this->tv = $tv;

        return $this;
    }
}
