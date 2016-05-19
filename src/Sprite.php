<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/19/14
 * Time: 6:14 PM
 */

namespace PokemonAPI;

/**
 * Class Sprite - A Sprite resource representing a single Pokemon Sprite
 * @package PokemonAPI
 */
class Sprite extends Object
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
     * @var string - the creation date of the resource
     */
    public $created;

    /**
     * @var string - the last time this resource was modified
     */
    public $modified;

    /**
     * @var stdClass - the Pokemon this sprite is for
     */
    public $pokemon;

    /**
     * @var string - the URI for the sprite image
     */
    public $image;

    /**
     * Returns the Pokemon object of the Pokemon associated with
     * this sprite.
     *
     * @return Pokemon
     */
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

    public function getImage()
    {
        return $this->image;
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