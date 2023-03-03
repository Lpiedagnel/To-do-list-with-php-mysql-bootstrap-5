<?php

function getSession() {
    if (session_status() === 1) {
        session_start();
    }
}

function getName() {
    if (isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) {
        $name = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
        return $name;
    }
}