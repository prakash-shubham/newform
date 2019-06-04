<?php


 namespace Drupal\newform\Plugin\Block;
 
 use Drupal\Core\Block\BlockBase;
 use Drupal\Core\Session\AccountInterface;
 use Drupal\Core\Access\AccessResult;
 use Drupal\Core\Form\FormStateInterface;


 /**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "newformBlock",
 *   admin_label = @Translation("newform Block"),
 * )
 */


 class newformBlock extends BlockBase {

 	public function build() {
	
    return [
      '#markup' => "<pre> 
    Name  :
    Email   :
    DOB   : </pre> ",
    ];
  }
 }

