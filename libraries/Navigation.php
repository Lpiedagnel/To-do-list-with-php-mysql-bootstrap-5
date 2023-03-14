<?php

class Navigation
{
    public static function createNavItem(string $link, string $title, string $linkClass = '', string $controller = null, string $action = null): string
    {

        if (isset($_GET['controller']) && (isset($_GET['action']))) {
            if ($_GET['controller'] === $controller && $_GET['action'] === $action) {
                $linkClass = $linkClass . ' active';
            } 
        } else {
            $linkClass = ($_SERVER['SCRIPT_NAME'] == $link) ? $linkClass.' active' : $linkClass;
        }


        // $linkClass = ($_SERVER['SCRIPT_NAME'] == $link) ? $linkClass.' active' : $linkClass;
        $html =
        '
        <li class="nav-item">
        <a class="'.$linkClass.'" href="'.$link.'">'.$title.'</a> 
        </li>
        ';

        return $html;
    }

    // Create Menu
    public static function createMenu(string $linkClass = '')
    {
        // Check if user is connected
        if (isset($_SESSION['is_connected']) && ($_SESSION['is_connected'] === true)) {
            $authNavItem = \Navigation::createNavItem ('/To-do-list-with-php-mysql-bootstrap-5/index.php?controller=user&action=logout', 'Déconnexion', $linkClass, 'user', 'logout');
        } else {
            $authNavItem = \Navigation::createNavItem('/To-do-list-with-php-mysql-bootstrap-5/index.php?controller=user&action=loginform', 'Connexion', $linkClass, 'user', 'loginform');
        }
        // Create menu

        return
        \Navigation::createNavItem('/To-do-list-with-php-mysql-bootstrap-5/index.php', 'Accueil', $linkClass).
        \Navigation::createNavItem('/To-do-list-with-php-mysql-bootstrap-5/index.php?controller=task&action=addform', 'Ajouter une tâche', $linkClass, 'task', 'addform').
        $authNavItem;
    }
}