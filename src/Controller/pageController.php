<?php
namespace Drupal\newform\Controller;

use Drupal\Core\Controller\ControllerBase;


class pageController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function page() {
    $element = array(
      '#markup' => 'Hello, world',
    );
    return $element;
  }

}