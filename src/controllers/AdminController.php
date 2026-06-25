<?php

require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../models/PropiedadModel.php';
require_once __DIR__ . '/AuthController.php';

class AdminController
{
    private UserModel $userModel;
    private PropiedadModel $propiedadModel;

    public function __construct()
    {
        $this->userModel =
            new UserModel();

        $this->propiedadModel =
            new PropiedadModel();
    }

    public function dashboard(): void
    {
        AuthController::requireAdmin();

        $usuarios =
            $this->userModel
                ->findAll();

        $propiedades =
            $this->propiedadModel
                ->findAll();

        require __DIR__ .
            '/../Views/admin-dashboard.php';
    }

    public function usuarios(): void
    {
        AuthController::requireAdmin();

        $usuarios =
            $this->userModel
                ->findAll();

        require __DIR__ .
            '/../Views/admin-users.php';
    }

    public function propiedades(): void
    {
        AuthController::requireAdmin();

        $propiedades =
            $this->propiedadModel
                ->findAll();

        require __DIR__ .
            '/../Views/admin-properties.php';
    }
}