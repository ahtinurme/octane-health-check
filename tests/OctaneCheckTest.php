<?php

use Ahtinurme\ApplicationServerEnum;
use Ahtinurme\OctaneCheck;
use Spatie\Health\Enums\Status;

function invalidServerNameHelper(string $server, bool $prefixWithGenericError = false): string
{
    if ($server === '') {
        $server = "''";
    }

    $genericError = $prefixWithGenericError ?
        'Octane does not seem to be installed correctly: ' :
        '';

    return "$genericError$server is not a valid application server name. Please use one of these values: ".
        ApplicationServerEnum::validValueList();
}

test('setName throws an exception when using an invalid application server name', function () {
    $invalidServerName = 'invalid';

    expect(ApplicationServerEnum::tryFrom($invalidServerName))
        ->toBeNull()
        ->and(
            fn () => OctaneCheck::new()
                ->setServer($invalidServerName)
                ->run()
        )->toThrow(
            Exception::class,
            invalidServerNameHelper($invalidServerName)
        );
});

it('will fail when Octane is not installed', function () {
    $result = OctaneCheck::new()->run();

    expect($result)
        ->status->toBe(Status::failed())
        ->notificationMessage->toBe(invalidServerNameHelper('', true));
});
