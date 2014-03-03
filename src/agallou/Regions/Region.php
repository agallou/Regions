<?php

namespace agallou\Regions;

class Region
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var array
     */
    protected $codesDepartements = array();

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return array
     */
    public function getCodesDepartements()
    {
        return $this->codesDepartements;
    }

    /**
     * @param array $codesDepartements
     *
     * @return $this
     */
    public function setCodesDepartements($codesDepartements)
    {
        $this->codesDepartements = $codesDepartements;

        return $this;
    }
}
