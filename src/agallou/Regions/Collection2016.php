<?php

namespace agallou\Regions;

class Collection2016 extends \ArrayIterator
{
    /**
     * @see http://www.insee.fr/fr/methodes/default.asp?page=nomenclatures/cog/codes_regions_2016.htm
     *
     * @var array
     */
    protected $regions = array(

        array(
            'code'              => '44',
            'label'             => 'Alsace-Champagne-Ardenne-Lorraine',
            'code_departements' => array('67', '68'),
            'previous_codes'    => array('42', '21', '41', '08', '10', '51', '52', '54', '55', '57', '88'),
        ),


        array(
            'code'              => '75',
            'label'             => 'Aquitaine-Limousin-Poitou-Charentes',
            'code_departements' => array('24', '33', '40', '47', '64', '19', '23', '87', '16', '17', '79', '86'),
            'previous_codes'    => array('72', '74', '54'),
        ),


        array(
            'code'              => '84',
            'label'             => 'Auvergne-Rhône-Alpes',
            'code_departements' => array('03', '15', '43', '63', '01', '07', '26', '38', '42', '69', '73', '74'),
            'previous_codes'    => array('83', '82')
        ),


        array(
            'code'              => '28',
            'label'             => 'Normandie',
            'code_departements' => array('14', '50','60', '27', '76'),
            'previous_codes'    => array('25', '23'),
        ),



        array(
            'code'              => '27',
            'label'             => 'Bourgogne-Franche-Comté',
            'code_departements' => array('21', '58', '71', '89', '25', '39', '70', '90'),
            'previous_codes'    => array('26', '43'),
        ),



        array(
            'code'              => '53',
            'label'             => 'Bretagne',
            'code_departements' => array('22', '29', '35', '56'),
            'previous_codes'    => array('53'),
        ),


        array(
            'code'              => '24',
            'label'             => 'Centre-Val de Loire',
            'code_departements' => array('18', '28', '36', '37', '41', '45'),
            'previous_codes'    => array('24'),
        ),
        array(
            'code'              => '94',
            'label'             => 'Corse',
            'code_departements' => array('2A', '2B'),
            'previous_codes'    => array('94'),
        ),

        array(
            'code'              => '01',
            'label'             => 'Guadeloupe',
            'code_departements' => array('971'),
            'previous_codes'    => array('01'),
        ),
        array(
            'code'              => '03',
            'label'             => 'Guyane',
            'code_departements' => array('973'),
            'previous_codes'    => array('03'),
        ),

        array(
            'code'              => '11',
            'label'             => 'Ile-de-France',
            'code_departements' => array('75', '77', '78', '91', '92', '93', '94', '95'),
            'previous_codes'    => array('11'),
        ),
        array(
            'code'              => '04',
            'label'             => 'La Réunion',
            'code_departements' => array('974'),
            'previous_codes'    => array('04'),
        ),



        array(
            'code'              => '76',
            'label'             => 'Languedoc-Roussillon-Midi-Pyrénées',
            'code_departements' => array('11', '30', '34', '48', '66', '09', '12', '31', '32', '46', '65', '81', '82'),
            'previous_codes'    => array('91', '73'),
        ),


        array(
            'code'              => '02',
            'label'             => 'Martinique',
            'code_departements' => array('972'),
            'previous_codes'    => array('02'),
        ),
        array(
            'code'              => '06',
            'label'             => 'Mayotte',
            'code_departements' => array('976'),
            'previous_codes'    => array('06'),
        ),


        array(
            'code'              => '32',
            'label'             => 'Nord-Pas-de-Calais-Picardie',
            'code_departements' => array('59', '62', '02', '60', '80'),
            'previous_codes'    => array('31', '22'),
        ),
        array(
            'code'              => '52',
            'label'             => 'Pays de la Loire',
            'code_departements' => array('44', '49', '53', '72', '85'),
            'previous_codes'    => array('52'),
        ),

        array(
            'code'              => '93',
            'label'             => 'Provence-Alpes-Côte d\'Azur',
            'code_departements' => array('04', '05', '06', '13', '83', '84'),
            'previous_codes'    => array('93'),
        ),

    );

    /**
     *
     */
    public function __construct()
    {
        $factory = new Factory();
        $list = array();
        foreach ($this->regions as $regionDefinition) {
            $region = $factory->createFromArray($regionDefinition);
            $list[$region->getCode()] = $region;
        }
        parent::__construct($list);
    }

    /**
     * @param string $code
     * @param bool $fuzzy
     *
     * @throws \InvalidArgumentException
     *
     * @return Region
     */
    public function get($code, $fuzzy = false)
    {
        if ($fuzzy) {
            $code = str_pad($code, 2, "0", STR_PAD_LEFT);
        }
        if (!isset($this[$code])) {
            throw new \InvalidArgumentException(sprintf('Code "%s" invalid', $code));
        }
        return $this[$code];
    }

    /**
     * @return array
     */
    public function getDefinitions()
    {
        return $this->regions;
    }
}
