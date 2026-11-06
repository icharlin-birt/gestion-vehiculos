<?php

namespace Icharlin\GestionVehiculos\Controllers;

use Icharlin\GestionVehiculos\Models\Vehiculo;
use Icharlin\GestionVehiculos\Models\Coche;
use Icharlin\GestionVehiculos\Models\Moto;

class VehicleController
{
    private function leerVehiculos(): array
    {
        require_once __DIR__ . '/../../data/vehiculos_bbdd.php';

        $vehiculos = [];

        foreach (VEHICULOS as $datos) {
            if ($datos['tipo'] === 'coche') {
                $vehiculos[] = new Coche(
                    $datos['id'],
                    $datos['marca'],
                    $datos['modelo'],
                    $datos['anio'],
                    $datos['puertas']
                );
            } elseif ($datos['tipo'] === 'moto') {
                $vehiculos[] = new Moto(
                    $datos['id'],
                    $datos['marca'],
                    $datos['modelo'],
                    $datos['anio'],
                    $datos['sidecar']
                );
            }
        }

        return $vehiculos;
    }

    public function getById($id): ?Vehiculo
    {
        $vehiculos = $this->leerVehiculos();

        foreach ($vehiculos as $vehiculo) {
            if ($vehiculo->getId() === (int) $id) {
                return $vehiculo;
            }
        }

        return null;
    }

    public function store($vehiculoData): array
    {
        $vehiculos = $this->leerVehiculos();

        if ($vehiculoData['tipo'] === 'coche') {
            $nuevoVehiculo = new Coche(
                (int) $vehiculoData['id'],
                $vehiculoData['marca'],
                $vehiculoData['modelo'],
                (int) $vehiculoData['anio'],
                (int) $vehiculoData['puertas']
            );
        } else {
            $nuevoVehiculo = new Moto(
                (int) $vehiculoData['id'],
                $vehiculoData['marca'],
                $vehiculoData['modelo'],
                (int) $vehiculoData['anio'],
                filter_var($vehiculoData['sidecar'], FILTER_VALIDATE_BOOLEAN)
            );
        }

        $vehiculos[] = $nuevoVehiculo;

        return $vehiculos;
    }
}
