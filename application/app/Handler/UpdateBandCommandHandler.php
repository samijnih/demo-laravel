<?php

namespace App\Handler;

use App\Command\UpdateBandCommand;
use App\Model\Band;

final class UpdateBandCommandHandler
{
    public function __invoke(UpdateBandCommand $command) : Band
    {
        $id = $command->getId();
        $name = $command->getName();
        $band = Band::find($id);

        if ($name) {
            $band->name = $name;
        }

        $band->save();

        return $band;
    }
}
