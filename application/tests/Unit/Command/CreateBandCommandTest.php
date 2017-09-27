<?php

namespace Tests\Unit\Command;

use App\Command\CreateBandCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateBandCommandTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBeInstantiable()
    {
        $reflection = new \ReflectionClass(CreateBandCommand::class);

        $this->assertTrue($reflection->isInstantiable());

        return [
            'instance' => new CreateBandCommand('Veil Of Maya'),
            'reflection' => $reflection,
        ];
    }


    /**
     * @test
     * @depends shouldBeInstantiable
     */
    public function shouldGetNameAttribute()
    {
        $this->assertClassHasAttribute('name', CreateBandCommand::class);
        $this->assertTrue(func_get_arg(0)['reflection']->hasMethod('getName'));
        $this->assertEquals(func_get_arg(0)['instance']->getName(), 'Veil Of Maya');
    }
}
