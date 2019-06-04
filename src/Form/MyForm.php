<?php
/**
 * @file
 * Contains \newform\Form\MyForm
 */
namespace Drupal\newform\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;

class MyForm extends FormBase {

	public function getFormId() {
		return 'SubmitForm';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {


		$config= \Drupal::service('config.factory')->getEditable('newform.settings');
		$config->get('candidate_number');
		// print_r($config->get('candidate_number'));
		// die;



		$form['candidate_name'] = array(
			'#type' => 'textfield',
			'#title' => t('Candidate Name:'),
      '#required' => TRUE,
		);

		$form['candidate_gender'] = array(
			'#type' => 'select',
			'#title' => ('Gender'),
			'#options' => array(
				'Other' => t('Other'),
				'Female' => t('Female'),
				'male' => t('Male'),
			),

		);

		$form['candidate_mail'] = array(
			'#type' => 'email',
			'#title' => t('Email ID:'),
      // '#required' => TRUE,
		);

		$form['candidate_number'] = array (
			'#type' => 'tel',
			'#title' => t('Mobile no'),
			'#default_value' => $config->get('candidate_number'),
		);

		$form['candidate_dob'] = array (
			'#type' => 'date',
			'#title' => t('DOB'),
      // '#required' => TRUE,
		);


		$form['actions']['submit'] = array(
			'#type' => 'submit',
			'#value' => $this->t('Save'),
			'#button_type' => 'primary',
		);
		return $form;
	}


	public function validateForm(array &$form, FormStateInterface $form_state) {
      // if (strlen($form_state->getValue('candidate_number')) < 10) {
      //   $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
      // }

		if (($form_state->getValue('candidate_number') == NULL ) && ($form_state->getValue('candidate_mail') == NULL )) {
			$form_state->setErrorByName('candidate_number', $this->t('Mobile number or email is required'));
		}

		$diff1 = 0;
		$date0 = date('Y-m-d');
		
    $date1 = date_create($date0);
    
    $date9 = $form_state->getValue('candidate_dob');
    $date2 = date_create($date9);
    $diff = date_diff($date2,$date1);
    $diff1 = $diff->format("%y years");
  

    if($diff1 < 18) {
    	$form_state->setErrorByName('candidate_number', $this->t('Age is too low'));
    }
	
	}


	public function submitForm(array &$form, FormStateInterface $form_state) {
   // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));
		foreach ($form_state->getValues() as $key => $value) {
			drupal_set_message($key . ': ' . $value);
		}
	}

}