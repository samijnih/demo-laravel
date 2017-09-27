<?php

namespace App\Command;

use Assert\Assert;

final class CreateBandCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * Constructor.
     *
     * @param  string $name
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(string $name)
    {
        Assert::that($name)
            ->notEmpty()
            ->string()
            ->maxLength(255);

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
}
