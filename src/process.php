<?php

use React\EventLoop\Factory as LoopFactory;
use WyriHaximus\React\ChildProcess\Messenger\Factory as MessengerFactory;
use WyriHaximus\React\ChildProcess\Messenger\Process;

foreach ([
    __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../../autoload.php',
] as $file) {
    if (file_exists($file)) {
        require $file;
        break;
    }
}

$loop = LoopFactory::create();
$messenger = MessengerFactory::child($loop);

Process::create($loop, $messenger);
$loop->run();
