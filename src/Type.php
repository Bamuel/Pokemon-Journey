<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/18/14
 * Time: 8:32 PM
 */

namespace PokemonAPI;

/**
 * Class Type - A Type resource represent a single Pokemon type
 * @package PokemonAPI
 */
class Type extends Object
{
    /**
     * @var string - the resource name e.g. Water
     */
    public $name;

    /**
     * @var int - the ID of the resource
     */
    public $id;

    /**
     * @var string - the URI of this resource
     */
    public $resource_uri;

    /**
     * @var string - the creation date of the resource
     */
    public $created;

    /**
     * @var string - the last time this resource was modified
     */
    public $modified;

    /**
     * @var array - the types this type is ineffective against
     */
    public $ineffective;

    /**
     * @var array - the types this type has no effect against
     */
    public $no_effect;

    /**
     * @var array - the types this type is resistant to
     */
    public $resistance;

    /**
     * @var array - the types this type is super effective against
     */
    public $super_effective;

    /**
     * @var array - the types this type is weak to
     */
    public $weakness;

    public function getCreated()
    {
        return $this->created;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Return an array of Type objects that this type is ineffective to.
     *
     * @return array
     */
    public function getIneffective()
    {
        $xary = array();
        foreach ($this->ineffective as $info) {
            $xary[] = new Type($info->resource_id);
        }
        return $xary;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * Return an array of Type objects that this type has no effect on.
     *
     * @return array
     */
    public function getNoEffect()
    {
        $xary = array();
        foreach ($this->no_effect as $info) {
            $xary[] = new Type($info->resource_id);
        }
        return $xary;
    }

    /**
     * Return an array of Type objects that this type is resistive to.
     *
     * @return array
     */
    public function getResistance()
    {
        $xary = array();
        foreach ($this->resistance as $info) {
            $xary[] = new Type($info->resource_id);
        }
        return $xary;
    }

    public function getResourceUri()
    {
        return $this->resource_uri;
    }

    /**
     * Return an array of Type objects that this type is super effective to.
     *
     * @return array
     */
    public function getSuperEffective()
    {
        $xary = array();
        foreach ($this->super_effective as $info) {
            $xary[] = new Type($info->resource_id);
        }
        return $xary;
    }

    /**
     * Return an array of Type objects that this type is weak to.
     *
     * @return array
     */
    public function getWeakness()
    {
        $xary = array();
        foreach ($this->weakness as $info) {
            $xary[] = new Type($info->resource_id);
        }
        return $xary;
    }
}