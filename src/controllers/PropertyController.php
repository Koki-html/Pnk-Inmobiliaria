<?php

require_once __DIR__ . '/../models/PropiedadModel.php';
require_once __DIR__ . '/../models/UbicacionModel.php';
require_once __DIR__ . '/../models/ImagenPropiedadModel.php';
require_once __DIR__ . '/AuthController.php';

class PropertyController
{
    private PropiedadModel $propiedadModel;
    private UbicacionModel $ubicacionModel;

    public function __construct()
    {
        $this->propiedadModel =
            new PropiedadModel();

        $this->ubicacionModel =
            new UbicacionModel();
    }

    public function index(): void
    {
        AuthController::requireOwner();

        $propiedades =
            $this->propiedadModel
                ->obtenerPorPropietario(
                    $_SESSION['user_id']
                );

        require __DIR__ .
            '/../Views/owner-properties.php';
    }

    public function show(int $id): void
    {
        $propiedad =
            $this->propiedadModel
                ->obtenerDetalle($id);

        if (!$propiedad) {

            require __DIR__ .
                '/../Views/404.php';

            return;
        }

        $imageModel =
            new ImagenPropiedadModel();

        $imagenes =
            $imageModel
                ->obtenerPorPropiedad($id);

        require __DIR__ .
            '/../Views/house.php';
    }

    public function create(): void
    {
        AuthController::requireOwner();

        require __DIR__ .
            '/../Views/owner-property-form.php';
    }

    public function store(): void
    {
        AuthController::requireOwner();

        $idUbicacion =
            $this->ubicacionModel->crear([

                'comuna' =>
                    $_POST['comuna'],

                'direccion' =>
                    $_POST['direccion']
            ]);

        $data = [

            'codigo_publicacion' =>
                $_POST['codigo_publicacion'],

            'propietario_id' =>
                $_SESSION['user_id'],

            'id_ubicacion' =>
                $idUbicacion,

            'tipo_propiedad' =>
                $_POST['tipo_propiedad'],

            'descripcion' =>
                $_POST['descripcion'],

            'dormitorios' =>
                $_POST['dormitorios'] ?? 0,

            'banos' =>
                $_POST['banos'] ?? 0,

            'area_terreno' =>
                !empty($_POST['area_terreno'])
                    ? $_POST['area_terreno']
                    : null,

            'area_construida' =>
                !empty($_POST['area_construida'])
                    ? $_POST['area_construida']
                    : null,

            'precio_pesos' =>
                $_POST['precio_pesos'],

            'precio_uf' =>
                !empty($_POST['precio_uf'])
                    ? $_POST['precio_uf']
                    : null,

            'fecha_publicacion' =>
                date('Y-m-d'),

            'bodega' =>
                isset($_POST['bodega']) ? 1 : 0,

            'estacionamiento' =>
                isset($_POST['estacionamiento']) ? 1 : 0,

            'logia' =>
                isset($_POST['logia']) ? 1 : 0,

            'cocina_amoblada' =>
                isset($_POST['cocina_amoblada']) ? 1 : 0,

            'antejardin' =>
                isset($_POST['antejardin']) ? 1 : 0,

            'patio_trasero' =>
                isset($_POST['patio_trasero']) ? 1 : 0,

            'piscina' =>
                isset($_POST['piscina']) ? 1 : 0,

            'latitud' =>
                !empty($_POST['latitud'])
                    ? $_POST['latitud']
                    : null,

            'longitud' =>
                !empty($_POST['longitud'])
                    ? $_POST['longitud']
                    : null,

            'activa' => 1
        ];

        $this->propiedadModel
            ->crear($data);

        header('Location: /owner');
        exit;
    }

    public function edit(int $id): void
    {
        AuthController::requireOwner();

        $propiedad =
            $this->propiedadModel
                ->findById($id);

        if (!$propiedad) {

            require __DIR__ .
                '/../Views/404.php';

            return;
        }

        require __DIR__ .
            '/../Views/edit-property.php';
    }

    public function update(int $id): void
    {
        AuthController::requireOwner();

        $data = [

            'descripcion' =>
                $_POST['descripcion'],

            'precio_pesos' =>
                $_POST['precio_pesos'],

            'precio_uf' =>
                $_POST['precio_uf'],

            'activa' =>
                isset($_POST['activa'])
                    ? 1
                    : 0
        ];

        $this->propiedadModel
            ->actualizar(
                $id,
                $data
            );

        header('Location: /owner');
        exit;
    }

    public function disable(int $id): void
    {
        AuthController::requireOwner();

        $this->propiedadModel
            ->desactivar($id);

        header('Location: /owner');
        exit;
    }

    public function delete(int $id): void
    {
        AuthController::requireOwner();

        $this->propiedadModel
            ->delete($id);

        header('Location: /owner');
        exit;
    }

    public function search(): array
    {
        return $this->propiedadModel
            ->buscar(
                null,
                $_GET['comuna'] ?? null,
                null
            );
    }
}