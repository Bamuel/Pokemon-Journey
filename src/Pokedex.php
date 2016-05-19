<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/19/14
 * Time: 6:07 PM
 */

namespace PokemonAPI;

/**
 * Class Pokedex - A Pokedex returns the names and resource_uri for all pokemon
 * @package PokemonAPI
 */
class Pokedex extends Object
{
    /**
     * @var string - the Pokedex name e.g. National
     */
    public $name;

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
     * @var array - an array of objects of Pokemon within this Pokedex
     */
    public $pokemon;

    /**
     * Overriding the parent constructor since Pokedex should always be called
     * with passing '1' as the parameter.
     */
    public function __construct()
    {
        $data = json_decode(file_get_contents(PokemonAPI::$api_url . "pokedex/1/"));
        $this->initialize($data);
    }

    /**
     * Returns an array of Pokemon objects related to the Pokedex
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

    public function getCreated()
    {
        return $this->created;
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