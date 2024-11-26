<?php

class FilesController {

    public function __construct() {}

    
    public function getImage($name) {

        $imagePath = file_exists("src/imgs/{$name}") ? "src/imgs/{$name}" : "src/imgs/default.jpg";
        
        $contentType = match (pathinfo($imagePath, PATHINFO_EXTENSION)) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            default => 'application/octet-stream',
        };
        
        header("Content-Type: $contentType");

        readfile($imagePath);

        exit;

    }

}


?>