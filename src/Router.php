<?php

class Router
{
    public static function handle()
    {

        $url = $_SERVER['REQUEST_URI'];

        if ($url == "/") {
            require "../src/Views/home.php";
        } else if ($url == "/Register") {
            require "../src/Views/register.php";
        } else if ($url == "/Login") {
            require "../src/Views/login.php";
        } else if ($url == "/Owner") {
            require "../src/Views/owner.php";
        } else if ($url == "/House") {
            require "../src/Views/house.php";
        } else if ($url == "/Search") {
            require "../src/Views/search.php";
        } else if ($url == "/About") {
            require "../src/Views/under-construction.php";
        } else if ($url == "/Contact") {
            require "../src/Views/under-construction.php";
        } else if ($url == "/Under-construction") {
            require "../src/Views/under-construction.php";
        } else {
            require "../src/Views/404.php";
        }
    }
}
