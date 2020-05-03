<?php
    // Helper functions for using URL's

    // Simple page redirect
    function redirect($page) {
        // Redirects to $page
        header('location: ' . URLROOT . '/' . $page);
    }

    // Allows for logging to browser console
    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';

        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }

        echo $js_code;
    }