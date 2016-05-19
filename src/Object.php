<?php
/**
 * @author Alex Phillips
 * @license MIT
 * @package PokemonAPI
 *
 * Date: 3/18/14
 * Time: 7:09 PM
 */

namespace PokemonAPI;

/**
 * Class Object - This is the parent class that all API objects inherit from for
 *                  construction and initialization.
 * @package PokemonAPI
 */
class Object
{
    /**
     * This is the parent constructor for all objects in the API
     * @param $id int - the ID of the desired resource in the API
     */
    public function __construct($id)
    {
        list($namespace, $className) = explode('\\', strtolower(get_class($this)));
        $url = PokemonAPI::$api_url . $className . "/$id/";
        $data = json_decode(file_get_contents($url));

        $this->initialize($data);
    }

    /**
     * This function is used to initailize all variables in an object based on
     *  the data returned from the API during construction.
     * @param $data stdClass - JSON object of data pulled from the API
     */
    protected function initialize($data)
    {
        foreach ($data as $k => $v) {
            if (is_array($v)) {
                $xary = array();
                foreach ($v as $val) {
                    if (isset($val->resource_uri)) {
                        $url_info = explode('/', $val->resource_uri);
                        // For some reason, resource_uri for Pokemon objects
                        // returned from the Pokedex call does not have a leading
                        // "/" like every other API call...
                        if ($this instanceof Pokedex) {
                            $val->resource_id = (int)$url_info[3];
                        }
                        else {
                            $val->resource_id = (int)$url_info[4];
                        }
                    }
                    $xary[] = $val;
                }
                $this->$k = $xary;
            }
            else if (is_object($v)) {
                if (isset($v->resource_uri)) {
                    $url_info = explode('/', $v->resource_uri);
                    $v->resource_id = (int)$url_info[4];
                    $this->$k = $v;
                }
            }
            else {
                $this->$k = $v;
            }
        }
    }
}