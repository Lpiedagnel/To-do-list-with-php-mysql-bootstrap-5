<?php

class Session
{
    public static function getName()
    {
        if (isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
            $name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
            return $name;
        }
    }

    public static function destroySession()
    {
        session_destroy();
        $html = '<p class="my-5">Vous avez été déconnecté. <a href="index.php">Retourner à l\'accueil.</a></p>';
        return $html;
    }

}