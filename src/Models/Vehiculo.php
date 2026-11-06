<?php

namespace Icharlin\GestionVehiculos\Models;

class Vehiculo
{
    protected int $id;
    protected string $marca;
    protected string $modelo;
    protected int $anio;
    protected string $tipo;

    public function __construct(
        int $id,
        string $marca,
        string $modelo,
        int $anio,
        string $tipo
    ) {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anio = $anio;
        $this->tipo = $tipo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getAnio(): int
    {
        return $this->anio;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }
}
