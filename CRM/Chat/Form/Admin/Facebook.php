<?php

use CRM_Chat_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Chat_Form_Admin_Facebook extends CRM_Chat_Form_Sensible {

  function init(){

    $this->fields = [
      'chatbot_facebook_callback_url' => [
        'entity' => 'setting',
        'field' => 'chatbot_facebook_callback_url',
        'freeze' => TRUE
      ],
      'chatbot_facebook_verify_token' => [
        'entity' => 'setting',
        'field' => 'chatbot_facebook_verify_token',
        'help_text' => 'This string is randomly generated by CiviCRM. You should configure your Facebook app webhook to use this token.  Update it to another value if you wish, or remove the value and save the form to generate another random token.'
      ],
      'chatbot_facebook_app_secret' => [
        'entity' => 'setting',
        'field' => 'chatbot_facebook_app_secret',
      ],
      'chatbot_facebook_page_access_token' => [
        'entity' => 'setting',
        'field' => 'chatbot_facebook_page_access_token',
      ],
    ];

    $this->defaultValueCallbacks = [
      'chatbot_facebook_verify_token' => 'setDefaultToken'
    ];

    $this->addHelp('form', 'top', E::ts('Configure these settings to link Chatbot to a Facebook page. <a href="https://docs.civicrm.org/chatbot/en/latest/facebook">More help available here.</a>'));
    $this->addSaveMessage('setting', '', E::ts('Chatbot facebook settings saved'));
  }

  function getDestination(){
    return CRM_Utils_System::url('civicrm/admin/chat/facebook/');
  }


  /**
   * Generates and saves a token on page load if one does not exist already
   */
  function setDefaultToken(){
    if($this->fields['chatbot_facebook_verify_token']['value'] == ''){
      $token = CRM_Chat_Utils::generateToken();
      $this->fields['chatbot_facebook_verify_token']['value'] = $token;
      civicrm_api3('setting', 'create', ['chatbot_facebook_verify_token' => $token]);
    }
  }

}
