<?php

namespace Spaceport\TestCase;

class ListeApiTest extends \Orchestra\Testbench\TestCase
{

    /**
     * @test
     */
    public function testBasicExample()
    {
        $this->visit('/api/lists')
             ->see('potato');
    }
}
