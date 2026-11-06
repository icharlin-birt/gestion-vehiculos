<?php

namespace Icharlin\GestionVehiculos\Models;

class Coche extends Vehiculo
{
    protected int $puertas;

    public function __construct(
        int $id,
        string $marca,
        string $modelo,
        int $anio,
        int $puertas
    ) {
        parent::__construct($id, $marca, $modelo, $anio, "coche");

        $this->puertas = $puertas;
    }

    public function getPuertas(): int
    {
        return $this->puertas;
    }
}
