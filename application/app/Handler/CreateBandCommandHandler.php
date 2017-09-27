<?php

namespace App\Handler;

use App\Command\CreateBandCommand;
use App\Model\Band;

final class CreateBandCommandHandler
{
    public function __invoke(CreateBandCommand $command) : Band
    {
        $band = new Band();

        $band->name = $command->getName();
        $band->save();

        return $band;
    }
}
