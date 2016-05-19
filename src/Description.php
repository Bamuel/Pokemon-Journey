<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/18/14
 * Time: 7:38 PM
 */

namespace PokemonAPI;

/**
 * Class Description - A Description resource representing a single Pokemon Pokedex description
 * @package PokemonAPI
 */
class Description extends Object
{
    /**
     * @var string - the resource name
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
     * @var array - a list of games this description is in
     */
    public $games;

    /**
     * @var stdClass - the Pokemon this description is for
     */
    public $pokemon;

    /**
     * Returns an array of Game objects associated with the description
     *
     * @return array
     */
    public function getGames()
    {
        $xary = array();
        foreach ($this->games as $info) {
            $xary[] = new Game($info->resource_id);
        }
        return $xary;
    }

    public function getPokemon()
    {
        return new Pokemon($this->pokemon->resource_id);
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