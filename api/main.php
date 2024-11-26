<?php

require_once 'router/router.php';

$resources = explode('/', strtolower(trim($_SERVER['REQUEST_URI'], '/'))) ?? '';

$response = match ($resources[1]) {
    'admin' => Router::admin($resources[2]),
    'client' => Router::client($resources[2]),
    default => ['success' => false,'message' => 'Not Found']
};

echo json_encode($response, JSON_UNESCAPED_UNICODE);

exit;


?>
