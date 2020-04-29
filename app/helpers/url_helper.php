<?php
    // Simple page redirect
    function redirect($page) {
    // Redirects page back to register
    header('location: ' . URLROOT . '/' . $page);
    }