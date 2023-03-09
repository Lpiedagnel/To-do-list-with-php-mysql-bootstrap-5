<?php

function render(string $path, string $title, $description)
{
    ob_start();
    require_once('templates/layout/header.php');
    require_once('elements/' . $path . '.php');
    require_once('templates/layout/footer.php');
    $pageContent = ob_get_clean();
    
    return $pageContent;
}