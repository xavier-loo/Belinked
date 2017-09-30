<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Flyer model class
 */
class flyer_model extends CI_Model {

  /**
   * Global function
   * @method __construct
   */
  public function __construct()
  {
    parent::__construct();

    // Pre-load database library.
    $this->load->database();
  }

/**
 * Flyer price and weight
 * @method  get_priceAndWeight
 *
 * @param   $size (paper size)
 * @param   $material (paper material)
 * @param   $printing (printing side)
 * @param   $quantity (order quantity)
 *
 * @return  float   (flyer price)
 * @return  float   (flyer weight)
 */
  public function get_priceAndWeight($size, $material, $printing, $quantity)
  {
    // Generate SQL query.
    $query = $this->db->select('retail_price, weight')
                              ->where('size', $size)
                              ->where('material', $material)
                              ->where('printing', $printing)
                              ->where('quantity', $quantity);

    // Excecute SQL query.
    $result = $this->db->get('flyer')
                        ->row();

    // Validate query result.
    if( ! empty($result) )
    {
      // TRUE: return result.
      return array(
        'price'   =>  $result->retail_price,
        'weight'  =>  $result->weight,
      );
    } else {
      // FALSE: return error.
      return array(
        'price'   => 0,
        'weight'  => 0,
      );
    }
  }
}
