<?php

namespace App\Components\Viewer;

use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;


class View
{
    protected static $factory;

    public static function render(string $view, ?array $data = []): string
    {
        if (!isset(self::$factory)) {
            $viewPath = viewPath;
            $cachePath = cachePath;
            $files = new Filesystem();
            $blade = new BladeCompiler($files, $cachePath);

            $engines = new EngineResolver();
            $engines->register('blade', function () use ($blade) {
                return new CompilerEngine($blade);
            });

            $events = new \Illuminate\Events\Dispatcher(new Container());

            $finder = new FileViewFinder($files, [$viewPath]);

            self::$factory = new Factory($engines, $finder, $events);
        }

        return self::$factory->make($view, $data)->render();
    }
}

