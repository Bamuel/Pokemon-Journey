<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/18/14
 * Time: 7:02 PM
 */

namespace PokemonAPI;

foreach (
    array(
        'Object',
        'Pokemon',
        'Ability',
        'Description',
        'Egg',
        'Move',
        'Type',
        'Pokedex',
        'Game',
        'Sprite',
    ) as $file) {
    require_once(__DIR__ . "/$file.php");
}

/**
 * Class PokemonAPI - this is really only meant to provide a global URL
 *                      as well as provide a single file to include to
 *                      include all necessary files for the API.
 * @package PokemonAPI
 */
class PokemonAPI
{
    public static $api_url = "http://pokeapi.co/api/v1/";
}