<?php

namespace agallou\Regions;

class Factory
{
    /**
     * @param array $regionDefinition
     *
     * @return Region
     */
    public function createFromArray(array $regionDefinition)
    {
        $region = new Region();

        $region
            ->setCode($regionDefinition['code'])
            ->setLabel($regionDefinition['label'])
            ->setCodesDepartements($regionDefinition['code_departements'])
        ;

        return $region;
    }
}
