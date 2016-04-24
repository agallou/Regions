<?php

namespace agallou\Regions\Tests\Units;

use atoum;
use agallou\Regions\Collection2016 as TestedClass;

class Collection2016 extends atoum
{
    public function testGetLabel()
    {
        $collection = new TestedClass();

        $this
            ->object($region = $collection->get('84'))
                ->isInstanceOf('agallou\Regions\Region')
                ->string($region->getLabel())
                    ->isEqualTo('Auvergne-Rhône-Alpes')
            ->array($collection->getArrayCopy())
                ->hasKey('11')
                ->hasSize(18)
        ;
    }
}
