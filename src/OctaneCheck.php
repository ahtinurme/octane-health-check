<?php

namespace Ahtinurme;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class OctaneCheck extends Check
{
    protected ApplicationServerEnum $server;

    protected ?string $name = 'Octane';

    public function run(): Result
    {
        $result = Result::make();

        try {
            if (! isset($this->server)) {
                $this->setServer(config('octane.server') ?? '');
            }

            $isRunning = $this->isApplicationServerRunning($this->server);
        } catch (\Exception $exception) {
            return $result->failed('Octane does not seem to be installed correctly: '.$exception->getMessage());
        }

        $serverMessage = "Octane server (with {$this->server->description()})";
        if (! $isRunning) {
            return $result
                ->failed("$serverMessage is not running")
                ->shortSummary('Not running');
        }

        return $result
            ->ok()
            ->shortSummary("$serverMessage is running");
    }

    public function setServer(string|ApplicationServerEnum $server): static
    {
        if ($server instanceof ApplicationServerEnum) {
            $this->server = $server;

            return $this;
        }

        $applicationServer = ApplicationServerEnum::tryFrom($server);

        if ($applicationServer === null) {
            $server = blank($server) ? "''" : $server;

            throw new \Exception(
                "$server is not a valid application server name. Please use one of these values: ".
                ApplicationServerEnum::validValueList()
            );
        }

        $this->server = $applicationServer;

        return $this;
    }

    protected function isApplicationServerRunning(ApplicationServerEnum $applicationServer): bool
    {
        return app($applicationServer->processInspectorClassname())
            ->serverIsRunning();
    }
}
