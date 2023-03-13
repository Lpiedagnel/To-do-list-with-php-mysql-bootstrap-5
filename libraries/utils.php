<?php
session_start();

function render(string $path, array $variables = [])
{
    extract($variables);
    ob_start();
    require('templates/' . $path . '.php');
    $pageContent = ob_get_clean();

    require('templates/layout.php');
}