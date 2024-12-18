<?php
session_start();

$page = isset($_GET['page']) ? trim($_GET['page']) : 'home';
$page = basename($page);

define('PAGES_DIR', realpath(__DIR__ . '/../frontend/pages') . '/');

// Debugging the path
echo 'PAGES_DIR: ' . PAGES_DIR . '<br>';
echo 'Requested Page: ' . $page . '<br>';

$allowed_pages = ['home', 'login', 'dashboard', '404'];

if (in_array($page, $allowed_pages) && file_exists(PAGES_DIR . $page . '.php')) {
    include PAGES_DIR . $page . '.php';
} else {
    include PAGES_DIR . '404.php';
}

?>
