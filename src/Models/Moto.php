<?php

namespace Icharlin\GestionVehiculos\Models;

class Moto extends Vehiculo
{
    protected bool $sidecar;

    public function __construct(
        int $id,
        string $marca,
        string $modelo,
        int $anio,
        bool $sidecar
    ) {
        parent::__construct($id, $marca, $modelo, $anio, "moto");

        $this->sidecar = $sidecar;
    }

    public function getSidecar(): bool
    {
        return $this->sidecar;
    }
}
