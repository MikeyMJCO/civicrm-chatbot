<?php
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Facebook\FacebookDriver;

class CRM_Chat_Webhook {

  public static function facebook() {

    $config = [
      'facebook' => [
        'token' => civicrm_api3('setting', 'getvalue', ['name' => 'chatbot_facebook_page_access_token']),
        'app_secret' => civicrm_api3('setting', 'getvalue', ['name' => 'chatbot_facebook_app_secret']),
        'verification' => civicrm_api3('setting', 'getvalue', ['name' => 'chatbot_facebook_verify_token'])
      ]
    ];

    $botman = CRM_Chat_Botman::createListener($config, FacebookDriver::class);
  }

  public static function devchat() {

    $config = [];

    $botman = CRM_Chat_Botman::createListener($config, CRM_Chat_Driver_DevChat::class);
  }

}
