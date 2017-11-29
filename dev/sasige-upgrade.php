<?php

namespace Nullix\Sasige;

require __DIR__ . "/../sasige/src/_init.php";

$opts = [
    'http' => [
        'method' => 'GET',
        'header' => [
            'User-Agent: PHP'
        ]
    ]
];

$outputDirectory = dirname(__DIR__) . "/sasige";
$zipFile = __DIR__ . "/release.zip";

$context = stream_context_create($opts);
$data = file_get_contents("https://api.github.com/repos/brainfoolong/sasige/releases/latest", false, $context);
$data = json_decode($data, true);

$zipContent = file_get_contents($data["assets"][0]["browser_download_url"], false, $context);

file_put_contents($zipFile, $zipContent);

File::deleteDirectory($outputDirectory, true);

exec("unzip -d " . escapeshellarg($outputDirectory) . " " . escapeshellarg($zipFile));
unlink($zipFile);