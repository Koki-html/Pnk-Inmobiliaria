<?php

require_once __DIR__ . '/../models/PropiedadModel.php';
require_once __DIR__ . '/AuthController.php';

class OwnerController
{
    private PropiedadModel $propiedadModel;

    public function __construct()
    {
        $this->propiedadModel =
            new PropiedadModel();
    }

    public function dashboard(): void
    {
        AuthController::requireOwner();

        $idUsuario =
            $_SESSION['user_id'];

        $propiedades =
            $this->propiedadModel
                ->obtenerPorPropietario(
                    $idUsuario
                );

        require __DIR__ .
            '/../Views/owner-dashboard.php';
    }
}