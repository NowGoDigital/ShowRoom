<?php
/* Penyimpan content.json untuk CMS admin. Upload sejajar index.html. */
header('Content-Type: application/json');
$file = __DIR__ . '/content.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $d = json_decode(file_get_contents('php://input'), true);
    if (!$d) { echo json_encode(['ok'=>false]); exit; }
    file_put_contents($file, json_encode($d, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    echo json_encode(['ok'=>true]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    @unlink($file);
    echo json_encode(['ok'=>true]);
} else {
    echo json_encode(['ok'=>false]);
}
