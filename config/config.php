<?php
session_start(); // Ensures sessions work across your site

define('APP_NAME', 'HelloEveryone'); // Your project name
define('BASE_URL', 'http://localhost/HelloEveryone/'); // Adjust if your folder name or URL is different

// Include the database connection so every page that requires this config also gets access to $pdo
require_once 'database.php';
?>
