<?php

return [
    'inflector' => League\Tactician\Handler\MethodNameInflector\InvokeInflector::class,
    'extractor' => League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor::class,
    'locator' => TillKruss\LaravelTactician\Locators\NamespaceLocator::class,
    'middleware' => [
        League\Tactician\Plugins\LockingMiddleware::class,
        TillKruss\LaravelTactician\Middleware\TransactionMiddleware::class,
        League\Tactician\Handler\CommandHandlerMiddleware::class,
    ],
    'namespaces' => [
        'commands' => 'App\Command',
        'handlers' => 'App\Handler',
    ],
    'handlers' => [
        'CreateBandCommand' => 'CreateBandCommandHandler',
    ],
];
