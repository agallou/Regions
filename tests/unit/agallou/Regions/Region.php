<?php

namespace agallou\Regions\Tests\Units;

use atoum;
use agallou\Regions\Region as TestedClass;

class Region extends atoum
{
    public function testRegion()
    {
        $codesDepartements = array('75', '77', '78', '91', '92', '93', '94', '95');
        $label = "Ile-de-France";
        $code = '11';
        $region = new TestedClass();
        $this
          ->object($region->setCode($code))
            ->isEqualTo($region)
          ->string($region->getCode())
            ->isEqualTo($code)
          ->object($region->setLabel($label))
            ->isEqualTo($region)
          ->string($region->getLabel())
            ->isEqualTo($label)
          ->object($region->setCodesDepartements($codesDepartements))
            ->isEqualTo($region)
          ->array($region->getCodesDepartements())
            ->isEqualTo($codesDepartements)
        ;
    }
}
