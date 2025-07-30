<?php
require_once 'config/database.php';

if (!isset($_GET['token']) || empty($_GET['token'])) {
    http_response_code(404);
    exit('Invalid download link.');
}

$token = $_GET['token'];

// Lookup file info by token
$stmt = $pdo->prepare("SELECT original_filename, stored_filename FROM shared_files WHERE token = ?");
$stmt->execute([$token]);
$file = $stmt->fetch();

if (!$file) {
    http_response_code(404);
    exit('File not found or link expired.');
}

$filepath = __DIR__ . '/uploads/' . $file['stored_filename'];

if (!file_exists($filepath)) {
    http_response_code(404);
    exit('File no longer available.');
}

// Set headers to force download
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file['original_filename']) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filepath));
flush();
readfile($filepath);
exit;
