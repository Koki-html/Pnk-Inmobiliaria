<?php
require_once __DIR__ . '/models/UserModel.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/OwnerController.php';
require_once __DIR__ . '/controllers/AdminController.php';
require_once __DIR__ . '/controllers/PropertyController.php';
require_once __DIR__ . '/controllers/ImageController.php';

class Router
{
    public static function handle(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $path = self::normalizePath(
            $_SERVER['REQUEST_URI']
        );

        switch ($path) {

            case '/login':

                $authController =
                    new AuthController();

                if (
                    $_SERVER['REQUEST_METHOD']
                    === 'POST'
                ) {

                    $authController->login();

                } else {

                    $authController->showLogin();

                }

                return;

            case '/logout':

                (
                    new AuthController()
                )->logout();

                return;

            case '/admin':

                (
                    new AdminController()
                )->dashboard();

                return;

            case '/owner':

                (
                    new OwnerController()
                )->dashboard();

                return;

            case '/owner/property/create':

                (
                    new PropertyController()
                )->create();

                return;

            case '/owner/property/store':

                (
                    new PropertyController()
                )->store();

                return;

            case '/owner/property/edit':

                (
                    new PropertyController()
                )->edit(
                    (int) ($_GET['id'] ?? 0)
                );

                return;

            case '/owner/property/update':

                (
                    new PropertyController()
                )->update(
                    (int) ($_GET['id'] ?? 0)
                );

                return;

            case '/owner/property/delete':

                (
                    new PropertyController()
                )->delete(
                    (int) ($_GET['id'] ?? 0)
                );

                return;

            case '/owner/property/disable':

                (
                    new PropertyController()
                )->disable(
                    (int) ($_GET['id'] ?? 0)
                );

                return;

            case '/owner/images':

                AuthController::requireOwner();

                require __DIR__ .
                    '/Views/property-images.php';

                return;

            case '/owner/image/upload':

                (
                    new ImageController()
                )->upload();

                return;
                
                case '/house':

                    (
                        new PropertyController()
                    )->show(
                        (int) ($_GET['id'] ?? 0)
                    );

                    return;
                case '/search':

                    $propertyController =
                        new PropertyController();

                    $propiedades =
                        $propertyController->search();

                    require __DIR__ .
                        '/Views/search.php';

                    return;
                
                case '/register-owner':

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                        require_once __DIR__ .
                            '/models/UserModel.php';

                        $userModel =
                            new UserModel();

                        $accountType =
                            $_POST['account_type']
                            ?? 'owner';

                        $data = [

                            'rut' =>
                                trim(
                                    $_POST['rut']
                                ),

                            'nombre_completo' =>
                                trim(
                                    $_POST['full_name']
                                ),

                            'fecha_nacimiento' =>
                                $_POST['birthdate'],

                            'correo' =>
                                trim(
                                    $_POST['email']
                                ),

                            'password_hash' =>
                                password_hash(
                                    $_POST['password'],
                                    PASSWORD_DEFAULT
                                ),

                            'sexo' => match ($_POST['gender']) {

                                'male'   => 'M',

                                'female' => 'F',

                                'other'  => 'Otro',

                                default  => 'Otro'
                            },

                            'telefono' =>
                                $_POST['mobile'],

                            'estado' =>
                                'Pendiente',

                            'penka_id' =>
                                null,

                            'certificado_antecedentes' =>
                                null,

                            'id_rol' =>
                                $accountType === 'owner'
                                    ? 2
                                    : 3
                        ];

                        $registroExitoso =
                            $userModel->crear(
                                $data
                            );

                        if ($registroExitoso) {

                            header(
                                'Location: /register-owner?success=1'
                            );

                        } else {

                            header(
                                'Location: /register-owner?error=1'
                            );
                        }

                        exit;
                    }

                    require __DIR__ .
                        '/Views/register-owner.php';

                    return;

        }

        $routes = [

            '/' => 'home.php',

            '/register-owner' =>
                'register-owner.php',

            '/search' => 'search.php',

            '/about' =>
                'under-construction.php',

            '/contact' =>
                'under-construction.php',

            '/under-construction' =>
                'under-construction.php',

            '/redirect' =>
                'redirect.php',
        ];

        $view =
            $routes[$path]
            ?? '404.php';

        require __DIR__ .
            "/Views/{$view}";
    }

    private static function normalizePath(
        string $requestUri
    ): string {

        $path =
            parse_url(
                $requestUri,
                PHP_URL_PATH
            ) ?: '/';

        return
            rtrim(
                strtolower($path),
                '/'
            ) ?: '/';
    }
}