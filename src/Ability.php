<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/18/14
 * Time: 7:08 PM
 */

namespace PokemonAPI;

/**
 * Class Ability - An Ability resource representing a single Pokemon ability
 * @package PokemonAPI
 */
class Ability extends Object
{
    /**
     * @var string - the resource name e.g. Overgrow
     */
    public $name;

    /**
     * @var int -  the id of the resource.
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
     * @var string - the description of this ability
     */
    public $description;

    public function getCreated()
    {
        return $this->created;
    }

    public function getDescription()
    {
        return $this->description;
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