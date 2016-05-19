<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/18/14
 * Time: 7:00 PM
 */

namespace PokemonAPI;

/**
 * Class Pokemon - A Pokemon resource representing a single Pokemon
 * @package PokemonAPI
 */
class Pokemon extends Object
{
    /**
     * @var string - the resource name e.g. Bulbasaur
     */
    public $name;

    /**
     * @var int - the id of the resource: this is the National Pokedex number of the Pokemon
     */
    public $national_id;

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
     * @var array - the abilities this Pokemon can have
     */
    public $abilities;

    /**
     * @var array - the egg groups this Pokemon is in
     */
    public $egg_groups;

    /**
     * @var array - the evolutions this Pokemon can evolve into
     */
    public $evolutions;

    /**
     * @var array - the Pokedex descriptions this Pokemon has
     */
    public $descriptions;

    /**
     * @var array - the moves this Pokemon can learn
     */
    public $moves;

    /**
     * @var array - the types this Pokemon is
     */
    public $types;

    /**
     * @var int - this Pokemon's catch rate
     */
    public $catch_rate;

    /**
     * @var string - this Pokemon's species
     */
    public $species;

    /**
     * @var int - this Pokemon's HP
     */
    public $hp;

    /**
     * @var int - this Pokemon's attack
     */
    public $attack;

    /**
     * @var int - this Pokemon's defense
     */
    public $defense;

    /**
     * @var int - this Pokemon's special attack
     */
    public $sp_atk;

    /**
     * @var int - this Pokemon's special defense
     */
    public $sp_def;

    /**
     * @var int - this Pokemon's speed
     */
    public $speed;

    /**
     * @var int - the total of this Pokemon's attributes
     */
    public $total;

    /**
     * @var int - the number of egg cycles needed
     */
    public $egg_cycles;

    /**
     * @var int - the EV yeild for this Pokemon
     */
    public $ev_yield;

    /**
     * @var int - the experience yield for this Pokemon
     */
    public $exp;

    /**
     * @var string - the growth rate of this Pokemon
     */
    public $growth_rate;

    /**
     * @var int - the height of this Pokemon
     */
    public $height;

    /**
     * @var int - the weight of this Pokemon
     */
    public $weight;

    /**
     * @var int - base happiness for this Pokemon
     */
    public $happiness;

    /**
     * @var string - the male to female ratio for this Pokemon in the format M / F
     */
    public $male_female_ratio;

    /**
     * Override the parent constructor to handle passing a string instead of the
     * Pokemon ID.
     *
     * @param int $id
     */
    public function __construct($id)
    {
        if (!is_numeric($id)) {
            $id = strtolower($id);
        }

        parent::__construct($id);
    }

    /**
     * Return an array of Ability objects related to the Pokemon
     *
     * @return array
     */
    public function getAbilities()
    {
        $xary = array();
        foreach ($this->abilities as $info) {
            $xary[] = new Ability($info->resource_id);
        }

        return $xary;
    }

    /**
     * Return an array of Description objects related to the Pokemon
     *
     * @return array
     */
    public function getDescriptions()
    {
        $xary = array();
        foreach ($this->descriptions as $info) {
            $xary[] = new Description($info->resource_id);
        }

        return $xary;
    }

    /**
     * Return an array of egg group objects related to the Pokemon
     *
     * @return array
     */
    public function getEggGroups()
    {
        $xary = array();
        foreach ($this->egg_groups as $info) {
            $xary[] = new Egg($info->resource_id);
        }

        return $xary;
    }

    /**
     * If the Pokemon evolves by leveling up, this returns an array
     * of potential levels the Pokemon will evolve.
     *
     * @return array
     */
    public function getEvolvesAt()
    {
        $xary = array();
        foreach ($this->evolutions as $info) {
            if ($info->method === 'level_up') {
                $xary[] = $info->level;
            }
        }
        return $xary;
    }

    /**
     * Returns an array of Pokemon objects of potential evolutions for
     * the Pokemon.
     *
     * @return array
     */
    public function getEvolutions()
    {
        $xary = array();
        foreach ($this->evolutions as $info) {
            $xary[] = new Pokemon($info->resource_id);
        }
        return $xary;
    }

    /**
     * Returns an array of Move objects that the Pokemon can learn.
     *
     * @return array
     */
    public function getMoves()
    {
        $xary = array();
        foreach ($this->moves as $info) {
            $learn_type = ($info->learn_type) ? $info->learn_type : null;
            $learned_at = ($info->learned_at) ? $info->learned_at : null;
            $xary[] = new Move($info->resource_id, $learn_type, $learned_at);
        }
        return $xary;
    }

    /**
     * Return an array of Type objects of types the Pokemon is.
     *
     * @return array
     */
    public function getTypes()
    {
        $xary = array();
        foreach ($this->types as $info) {
            $xary[] = new Type($info->resource_id);
        }
        return $xary;
    }

    public function hasAbilities()
    {
        return (!empty($this->abilities));
    }

    public function hasDescription()
    {
        return (!empty($this->descriptions));
    }

    public function hasEvolution()
    {
        return (!empty($this->evolutions));
    }

    public function hasEggGroup()
    {
        return (!empty($this->egg_groups));
    }

    public function hasType()
    {
        return (!empty($this->types));
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getCatchRate()
    {
        return $this->catch_rate;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function getEggCycles()
    {
        return $this->egg_cycles;
    }

    public function getEvYield()
    {
        return $this->ev_yield;
    }

    public function getExp()
    {
        return $this->exp;
    }

    public function getGrowthRate()
    {
        return $this->growth_rate;
    }

    public function getHappiness()
    {
        return $this->happiness;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getMaleFemaleRatio()
    {
        return $this->male_female_ratio;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNationalId()
    {
        return $this->national_id;
    }

    public function getResourceUri()
    {
        return $this->resource_uri;
    }

    public function getSpAtk()
    {
        return $this->sp_atk;
    }

    public function getSpDef()
    {
        return $this->sp_def;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getWeight()
    {
        return $this->weight;
    }
}