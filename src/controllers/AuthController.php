<?php

require_once __DIR__ . '/../models/UserModel.php';

class AuthController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function showLogin(): void
    {
        require __DIR__ . '/../Views/login.php';
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            header('Location: /login');
            exit;
        }

        $correo = trim(
            $_POST['correo'] ?? ''
        );

        $password = $_POST['password'] ?? '';

        if (
            empty($correo) ||
            empty($password)
        ) {

            $_SESSION['error'] =
                'Debe completar todos los campos.';

            header('Location: /login');
            exit;
        }

        $usuario =
            $this->userModel
                ->buscarPorCorreo($correo);

        if (!$usuario) {

            $_SESSION['error'] =
                'Usuario no encontrado.';

            header('Location: /login');
            exit;
        }

        if (
            !password_verify(
                $password,
                $usuario['password_hash']
            )
        ) {

            $_SESSION['error'] =
                'Contraseña incorrecta.';

            header('Location: /login');
            exit;
        }
        if (
            ($usuario['estado'] ?? '')
            === 'Pendiente'
        ) {

            $_SESSION['error'] =
                'Tu cuenta aún está pendiente de aprobación por un Administrador de PNK Inmobiliaria.';

            header('Location: /login');
            exit;
        }

        $_SESSION['user_id'] =
            $usuario['id_usuario'];

        $_SESSION['nombre'] =
            $usuario['nombre_completo'];

        $_SESSION['rol'] =
            $usuario['id_rol'];

        switch ($usuario['id_rol']) {

            case 1:

                header('Location: /admin');
                break;

            case 2:

                header('Location: /owner');
                break;

            case 3:

                header('Location: /owner');
                break;

            default:

                header('Location: /');
                break;
        }   

        exit;
    }

    public function logout(): void
    {
        $_SESSION = [];

        if (
            ini_get(
                'session.use_cookies'
            )
        ) {

            $params =
                session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        header('Location: /login');
        exit;
    }

    public static function check(): bool
    {
        return isset(
            $_SESSION['user_id']
        );
    }

    public static function requireLogin(): void
    {
        if (!self::check()) {

            header('Location: /login');
            exit;
        }
    }

    public static function requireAdmin(): void
    {
        self::requireLogin();

        if (
            !isset($_SESSION['rol']) ||
            $_SESSION['rol'] != 1
        ) {

            header('Location: /');
            exit;
        }
    }

    public static function requireOwner(): void
    {
        self::requireLogin();

        if (
            !isset($_SESSION['rol']) ||
            !in_array(
                $_SESSION['rol'],
                [2, 3]
            )
        ) {

            header('Location: /');
            exit;
        }
    }
}