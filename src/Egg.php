<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/18/14
 * Time: 7:47 PM
 */

namespace PokemonAPI;

/**
 * Class Egg - An Egg group resource representing a single Pokemon egg group
 * @package PokemonAPI
 */
class Egg extends Object
{
    /**
     * @var string - the resource name e.g. Monster.
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
     * @var string - the creation date of this resource
     */
    public $created;

    /**
     * @var string - the last time this resource was modified
     */
    public $modified;

    /**
     * @var array - an array of the Pokemon in this egg group
     */
    public $pokemon = array();

    /**
     * Returns an array of Pokemon objects related to the egg group
     *
     * @return array
     */
    public function getPokemon()
    {
        $xary = array();
        foreach ($this->pokemon as $info) {
            $xary[] = new Pokemon($info->resource_id);
        }
        return $xary;
    }

    public function hasPokemon()
    {
        return (!empty($this->pokemon));
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getResourceUri()
    {
        return $this->resource_uri;
    }
}