<?php
// Generate Header
function createHeader(string $title, string $description): string {
    $header = 
    '
        <!doctype html>
        <html lang="fr">
            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>' . $title . '</title>
            <meta name="description" content="' . $description . '"
            <script src="https://kit.fontawesome.com/ef8b364259.js" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            </head>
        <body>
    ';
    return $header;
}

// Create Nav Item
function createNavItem(string $link, string $title, string $linkClass = ''): string {
    //  Check if server link = link
    $class = 'nav-item';
    /*
    $ifCurrentUrl = str_contains($_SERVER['SCRIPT_NAME'], $link);
    if ($ifCurrentUrl) {
        $class .= ' active';
    };
    */
    // Generate HTML
    $html = 
    '
        <li class="' . $class . '">    
            <a class="' . $linkClass . '" href="' . $link . '">' . $title .'</a> 
        </li>
    ';
    return $html;
};

// Create Menu
function createMenu(string $linkClass = '') {
    return
    createNavItem('./index.php', 'Accueil', $linkClass) .
    createNavItem('./add_task.php', 'Ajouter une tâche', $linkClass) .
    createNavItem('./connexion.php', 'Connexion', $linkClass);
}