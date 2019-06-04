<?php

namespace Drupal\newform\Controller;

use Drupal\Core\Controller\ControllerBase;



class newformController extends ControllerBase {

  public function hello() {
      return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello, World!'),
    ];
    
  }
}