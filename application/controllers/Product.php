<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Product controller class
 */
Class Product extends CI_Controller {

  /**
   * Global function
   * @method _construct
   */
  public function _construct()
  {
    parent::__construct();
  }

  /**
   * Product default index page
   * @method index
   * @return CI:view (product page)
   */
  public function index()
  {
    $this->load->view('product');
    //E-Print Sdn Bhd
    //MyPrinter2u Sdn Bhd

  }

  /**
   * Flyer retail price and weight for AJAX request
   * @method  get_flyer_price
   * @return  float   (flyer retail price)
   */
  public function flyer_get_priceAndWeight()
  {
    // Return 404 error if function called NOT from POST request.
    if( empty( $this->input->post() ) )
    {
      show_404();
    }

    // Load flyer model class.
    $this->load->model('flyer_model', 'flyer'); //@param model; @param model alternative name.

    // Get AJAX POST data.
    $size = str_replace('A', '', $this->input->post('size') ); // remove "A" prefix.
    $material = str_replace('gsm', '', $this->input->post('material') ); // remove "gsm" suffix.
    $printing = $this->input->post('printing');
    $quantity = $this->input->post('quantity');
    $delivery = $this->input->post('delivery');

    // Declare Single/Double Side Printing as corresponding integer.
    switch($printing)
    {
      case 'Single Side Printing':
        $printing = 1;
        break;
      case 'Double Side Printing':
        $printing = 2;
        break;
    }

    // Retrieve flyer retail price and weight from flyer model class using AJAX data.
    $result = $this->flyer->get_priceAndWeight($size, $material, $printing, $quantity);

    $weight = $result['weight'];
    $price = $result['price'];

    // No delivery included.
    if($delivery == 0)
    {
      print json_encode($result); // Return original result.

    // Delivery included.
    } else {
      // West Malaysia cost and breakpoint.
      if($delivery == 1)
      {
        $breakpoint = 2; // Weight breakpoint.
        $initial_cost = 10.10; // Initial cost before breakpoint.
        $subsequent_cost = 2.17; // Subsequent cost after breakpoint.

      // East Malaysia cost and breakpoint.
      } else {
        $breakpoint = 1; // Weight breakpoint.
        $initial_cost = 14.42; // Initial cost before breakpoint.
        $subsequent_cost = 12.98; // Subsequent cost after breakpoint.
      }

      // Calculate cost when weight less than or equal to weight breakpoint.
      if( ceil($weight) <= $breakpoint)
      {
        $price = $price + $initial_cost;

      // Cost when weight more than weight breakpoint.
      } else {
        $price = $price + $initial_cost + ( ( ceil($weight) - $breakpoint) * $subsequent_cost );
      }

      $price = number_format($price, 2, '.', ','); // Round off to 2 d.p.

      $result_with_delivery = array(
        'price'   =>  $price,
        'weight'  =>  $weight,
      );

      print json_encode($result_with_delivery); // Return result with new price based on delivery cost.
    }
  }
}
