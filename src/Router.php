<?php

class Router
{
    public static function handle(): void
    {
        $path = self::normalizePath($_SERVER['REQUEST_URI']);

        $routes = [
            '/' => 'home.php',
            '/register' => 'register.php',
            '/login' => 'login.php',
            '/register-owner' => 'register-owner.php',
            '/house' => 'house.php',
            '/search' => 'search.php',
            '/about' => 'under-construction.php',
            '/contact' => 'under-construction.php',
            '/under-construction' => 'under-construction.php',
            '/redirect' => 'redirect.php',
            '/owner' => 'owner-dashboard.php',
            '/admin' => 'admin-dashboard.php',
        ];

        $view = $routes[$path] ?? '404.php';
        require __DIR__ . "/Views/{$view}";
    }

    private static function normalizePath(string $requestUri): string
    {
        $path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
        return rtrim(strtolower($path), '/') ?: '/';
    }
}
