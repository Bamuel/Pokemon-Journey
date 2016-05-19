<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/19/14
 * Time: 5:59 PM
 */

namespace PokemonAPI;

/**
 * Class Game - A Game resource representing a single Pokemon game
 * @package PokemonAPI
 */
class Game extends Object
{
    /**
     * @var string - the resource name e.g. Pokemon red
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
     * @var int - the year the game was released
     */
    public $release_year;

    /**
     * @var int - the generation the game belongs to
     */
    public $generation;

    public function getCreated()
    {
        return $this->created;
    }

    public function getGeneration()
    {
        return $this->generation;
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

    public function getReleaseYear()
    {
        return $this->release_year;
    }

    public function getResourceUri()
    {
        return $this->resource_uri;
    }
}