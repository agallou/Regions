<?php

namespace agallou\Regions\Tests\Units;

use atoum;
use agallou\Regions\Collection as TestedClass;

class Collection extends atoum
{
    public function testGetLabel()
    {
        $collection = new TestedClass();

        $this
            ->object($region = $collection->get('11'))
                ->isInstanceOf('agallou\Regions\Region')
                ->string($region->getLabel())
                    ->isEqualTo('Ile-de-France')
            ->array($collection->getArrayCopy())
                ->hasKey('11')
                ->hasSize(27)
        ;
    }
}
