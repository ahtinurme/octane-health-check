<?php

declare(strict_types=1);

namespace Ahtinurme;

use Laravel\Octane\FrankenPhp\ServerProcessInspector as FrankenPhpServerProcessInspector;
use Laravel\Octane\RoadRunner\ServerProcessInspector as RoadRunnerServerProcessInspector;
use Laravel\Octane\Swoole\ServerProcessInspector as SwooleServerProcessInspector;

enum ApplicationServerEnum: string
{
    case Swoole = 'swoole';
    case RoadRunner = 'roadrunner';
    case FrankenPhp = 'frankenphp';

    /**
     * Return a comma separated list of valid application server values.
     */
    public static function validValueList(): string
    {
        return collect(self::cases())
            ->map(fn (self $value) => $value->value)
            ->implode(', ');
    }

    public function description(): string
    {
        return match ($this) {
            self::Swoole => 'Swoole',
            self::RoadRunner => 'RoadRunner',
            self::FrankenPhp => 'FrankenPHP',
        };
    }

    public function processInspectorClassname(): string
    {
        return match ($this) {
            self::Swoole => SwooleServerProcessInspector::class,
            self::RoadRunner => RoadRunnerServerProcessInspector::class,
            self::FrankenPhp => FrankenPhpServerProcessInspector::class,
        };
    }
}
