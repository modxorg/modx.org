<?php
/**
 * Class cbField
 */
class cbField extends xPDOSimpleObject {
    /** @var modX $xpdo */
    public $xpdo;

    /**
     * @param array|string $k
     * @param null $format
     * @param null $formatTemplate
     * @return mixed
     */
    public function get($k, $format = null, $formatTemplate= null)
    {
        $v = parent::get($k, $format, $formatTemplate);
        if (!is_array($k) && !isset($this->_fields[$k])) {
            $props = parent::get('properties');
            $props = $this->xpdo->fromJSON($props);
            if (is_array($props) && array_key_exists($k, $props)) {
                $v = $props[$k];
            }
        }
        return $v;
    }

    /**
     * Gets the value of a parent property on this field.
     *
     * A "parent property" is a property that is dictated by the input type of the parent, which has a value for each
     * of the children fields.
     *
     * @param $key
     * @param null $default
     * @return null
     */
    public function getParentProperty($key, $default = null)
    {
        $properties = $this->get('parent_properties');
        $properties = $this->xpdo->fromJSON($properties);

        if (is_array($properties) && array_key_exists($key, $properties)) {
            return $properties[$key];
        }
        return $default;
    }

    /**
     * Shortcut to cbBaseInput.getDependantInputs
     *
     * @return array
     */
    public function getDependantInputs() {
        $input = (isset($this->xpdo->contentblocks->inputs[$this->get('input')])) ? $this->xpdo->contentblocks->inputs[$this->get('input')] : false;

        if ($input instanceof cbBaseInput) {
            return $input->getDependantInputs($this);
        }
        return array();
    }

    /**
     * Returns an array of subfields for the current field.
     *
     * @return cbField[]
     */
    public function getSubfields()
    {
        $subfields = array();

        /** @var cbField[] $fields */
        $c = $this->xpdo->newQuery('cbField');
        $c->where(array(
            'parent' => $this->get('id'),
        ));
        $c->sortby('sortorder', 'ASC');
        $fields = $this->xpdo->getIterator('cbField', $c);
        foreach ($fields as $fld) {
            $subfields[] = $fld;
        }
        return $subfields;
    }
}
