<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/18/14
 * Time: 8:08 PM
 */

namespace PokemonAPI;

/**
 * Class Move - A Move resource representing a single move
 * @package PokemonAPI
 */
class Move extends Object
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
     * @var string - the creation date of this resource
     */
    public $created;

    /**
     * @var string - the last time this resource was modified
     */
    public $modified;

    /**
     * @var string - a description of the move
     */
    public $description;

    /**
     * @var int - the power of the move
     */
    public $power;

    /**
     * @var int - the accuracy of the move
     */
    public $accuracy;

    /**
     * @var string - the category of the move
     */
    public $category;

    /**
     * @var int - the PP points of the move
     */
    public $pp;

    /**
     * @var null|string - how the move is learned
     */
    public $learn_type;

    /**
     * @var null - the level the move is learned at, if any
     */
    public $learned_at;

    /**
     * This expands on the inherited constructor to include optional
     * learn type and learned at variables.
     *
     * @param $id
     * @param string $learn_type
     * @param $learned_at
     */
    public function __construct($id, $learn_type = '', $learned_at = -1)
    {
        parent::__construct($id);
        $this->learn_type = $learn_type;
        $this->learned_at = $learned_at;
    }

    public function getAccuracy()
    {
        return $this->accuracy;
    }

    public function getCategory()
    {
        return $this->category;
    }

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

    public function getLearnType()
    {
        return $this->learn_type;
    }

    public function getLearnedAt()
    {
        return $this->learned_at;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPower()
    {
        return $this->power;
    }

    public function getPp()
    {
        return $this->pp;
    }

    public function getResourceUri()
    {
        return $this->resource_uri;
    }
}