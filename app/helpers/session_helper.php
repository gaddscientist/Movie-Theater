<?php
    // Included in Bootstrap.php
    // Helper functions for interacting with sessions

    // Allows you to use sessions
    session_start();

    // Flash Message Helper
    // Ex. flash('register_failure', 'You are not registered', 'alert alert-danger');
    // DISPLAY IN VIEW - <?php echo flash('register_failure'); ? >
    function flash($name = '', $message = '', $class = 'alert alert-success') {
        if(!empty($name)) {
            // Checks if there is a message and a session variable with the given name
            if(!empty($message) && empty($_SESSION[$name])) {
                // If the session variables exists, unset it
                if(!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                if(!empty($_SESSION[$name . '_class'])) {
                    unset($_SESSION[$name . '_class']);
                }

                // Sets the new values for the session variables
                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            }
            elseif(empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                echo  '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>'; 
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']); }
        }
    }

    // Returns true if a manager is logged in
    function isLoggedIn() {
        if(isset($_SESSION['manager_id'])) {
            return true;
        }
        else {
            return false;
        }
    }