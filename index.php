<?php

declare(strict_types=1);

use Icharlin\GestionVehiculos\Controllers\VehicleController;

require_once __DIR__ . '/vendor/autoload.php';

function request(): void
{
    $controller = new VehicleController();

    $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

    if ($method === 'GET') {
        $id = $_GET['id'] ?? null;

        if ($id !== null && $id !== '') {
            $vehiculo = $controller->getById($id);
            require __DIR__ . '/app/Views/vehiculo_get.html';
        } else {
            require __DIR__ . '/index.html';
        }

    } elseif ($method === 'POST') {
        $json = $_POST['jsonPost'] ?? '';

        $vehiculoData = json_decode($json, true);

        if (is_array($vehiculoData)) {
            $vehiculos = $controller->store($vehiculoData);
        } else {
            $vehiculos = [];
            $error = 'Los datos introducidos no tienen un formato JSON valido.';
        }

        require __DIR__ . '/app/Views/vehiculo_post.html';
    }
}

request();

