<?php

namespace agallou\Regions\Tests\Units;

use atoum;
use agallou\Regions\Factory as TestedClass;

class Factory extends atoum
{
    public function testGetLabel()
    {
        $factory = new TestedClass();

        $departementArray = array(
            'code'              => '11',
            'label'             => 'Ile-de-France',
            'code_departements' => array('75', '77', '78', '91', '92', '93', '94', '95'),
        );

        $this
            ->object($region = $factory->createFromArray($departementArray))
                ->isInstanceOf('agallou\Regions\Region')
                ->string($region->getCode())
                    ->isEqualTo($departementArray['code'])
                ->string($region->getLabel())
                    ->isEqualTo($departementArray['label'])
                ->array($region->getCodesDepartements())
                    ->isEqualTo($departementArray['code_departements'])
        ;


    }
}
