<?php
// connect to the session
session_start();
// remove all session vairables
session_unset();
// destroy the session and redirect to login
session_destroy();
header('Location: /index.html');
?>
