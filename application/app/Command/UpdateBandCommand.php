<?php

namespace App\Command;

use Assert\Assert;

final class UpdateBandCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * Constructor.
     *
     * @param  int         $id
     * @param  string|null $name
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(int $id, $name)
    {
        Assert::that($id)
            ->greaterThan(0)
            ->integer();
        Assert::that($name)
            ->nullOr()
            ->notEmpty()
            ->string()
            ->maxLength(255);

        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }
}
