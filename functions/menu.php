<?php

require_once 'functions/sessions.php';
require_once 'functions/menu.php';

// Create Nav Item
function createNavItem(string $link, string $title, string $linkClass = ''): string
{
    $linkClass = ($_SERVER['SCRIPT_NAME'] == $link) ? $linkClass.' active' : $linkClass;
    $html =
    '
    <li class="nav-item">
    <a class="'.$linkClass.'" href="'.$link.'">'.$title.'</a> 
    </li>
    ';

    return $html;
};

// Create Menu
function createMenu(string $linkClass = '')
{
    // Check if user is connected
    if (isset($_SESSION['is_connected']) && ($_SESSION['is_connected'] === true)) {
        $authNavItem = createNavItem('/To-do-list-with-php-mysql-bootstrap-5/logout.php', 'Déconnexion', $linkClass);
    } else {
        $authNavItem = createNavItem('/To-do-list-with-php-mysql-bootstrap-5/login.php', 'Connexion', $linkClass);
    }
    // Create menu
    return
    createNavItem('/To-do-list-with-php-mysql-bootstrap-5/index.php', 'Accueil', $linkClass).
    createNavItem('/To-do-list-with-php-mysql-bootstrap-5/add_task.php', 'Ajouter une tâche', $linkClass).
    $authNavItem;
}
