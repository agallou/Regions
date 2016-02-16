<?php

namespace agallou\Regions;

class Collection extends \ArrayIterator
{
    /**
     * @see http://www.insee.fr/fr/methodes/nomenclatures/cog/region.asp
     *
     * @var array
     */
    protected $regions = array(

        array(
            'code'              => '42',
            'label'             => 'Alsace',
            'code_departements' => array('67', '68'),
        ),
        array(
            'code'              => '72',
            'label'             => 'Aquitaine',
            'code_departements' => array('24', '33', '40', '47', '64'),
        ),
        array(
            'code'              => '83',
            'label'             => 'Auvergne',
            'code_departements' => array('03', '15', '43', '63'),
        ),
        array(
            'code'              => '25',
            'label'             => 'Basse-Normandie',
            'code_departements' => array('14', '50','60'),
        ),
        array(
            'code'              => '26',
            'label'             => 'Bourgogne',
            'code_departements' => array('21', '58', '71', '89'),
        ),
        array(
            'code'              => '53',
            'label'             => 'Bretagne',
            'code_departements' => array('22', '29', '35', '56'),
        ),
        array(
            'code'              => '24',
            'label'             => 'Centre',
            'code_departements' => array('18', '28', '36', '37', '41', '45'),
        ),
        array(
            'code'              => '21',
            'label'             => 'Champagne-Ardenne',
            'code_departements' => array('08', '10', '51', '52'),
        ),
        array(
            'code'              => '94',
            'label'             => 'Corse',
            'code_departements' => array('2A', '2B'),
        ),
        array(
            'code'              => '43',
            'label'             => 'Franche-Comté',
            'code_departements' => array('25', '39', '70', '90'),
        ),
        array(
            'code'              => '01',
            'label'             => 'Guadeloupe',
            'code_departements' => array('971'),
        ),
        array(
            'code'              => '03',
            'label'             => 'Guyane',
            'code_departements' => array('973'),
        ),
        array(
            'code'              => '23',
            'label'             => 'Haute-Normandie',
            'code_departements' => array('27', '76'),
        ),
        array(
            'code'              => '11',
            'label'             => 'Ile-de-France',
            'code_departements' => array('75', '77', '78', '91', '92', '93', '94', '95'),
        ),
        array(
            'code'              => '04',
            'label'             => 'La Réunion',
            'code_departements' => array('974'),
        ),
        array(
            'code'              => '91',
            'label'             => 'Languedoc-Rousillon',
            'code_departements' => array('11', '30', '34', '48', '66'),
        ),
        array(
            'code'              => '74',
            'label'             => 'Limousin',
            'code_departements' => array('19', '23', '87'),
        ),
        array(
            'code'              => '41',
            'label'             => 'Lorraine',
            'code_departements' => array('54', '55', '57', '88'),
        ),
        array(
            'code'              => '02',
            'label'             => 'Martinique',
            'code_departements' => array('972'),
        ),
        array(
            'code'              => '06',
            'label'             => 'Mayotte',
            'code_departements' => array('976'),
        ),
        array(
            'code'              => '73',
            'label'             => 'Midi-Pyrénées',
            'code_departements' => array('09', '12', '31', '32', '46', '65', '81', '82'),
        ),
        array(
            'code'              => '31',
            'label'             => 'Nord-Pas-de-Calais',
            'code_departements' => array('59', '62'),
        ),
        array(
            'code'              => '52',
            'label'             => 'Pays de la Loire',
            'code_departements' => array('44', '49', '53', '72', '85'),
        ),
        array(
            'code'              => '22',
            'label'             => 'Picardie',
            'code_departements' => array('02', '60', '80'),
        ),
        array(
            'code'              => '54',
            'label'             => 'Poitou-Charentes',
            'code_departements' => array('16', '17', '79', '86'),
        ),
        array(
            'code'              => '93',
            'label'             => 'Provence-Alpes-Côte d\'Azur',
            'code_departements' => array('04', '05', '06', '13', '83', '84'),
        ),
        array(
            'code'              => '82',
            'label'             => 'Rhône-Alpes',
            'code_departements' => array('01', '07', '26', '38', '42', '69', '73', '74'),
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
