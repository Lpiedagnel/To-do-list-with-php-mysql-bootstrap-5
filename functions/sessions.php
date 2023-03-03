<?php

function getSession() {
    if (session_status() === 1) {
        session_start();
    }
}