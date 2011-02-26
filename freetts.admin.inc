<?php
// $Id$

/**
 * @file
 * Contains the administrative functions of the freetts module.
 *
 * This file is included by the core freetts module, and includes the
 * settings form.
 *
 */

/**
 * Menu callback for the freetts settings form.
 *
 */
function tts_settings() {
  $form['settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Web page options'),
  );
  $form['settings']['freetts_server_settings'] = array(
    '#type'        => 'fieldset',
    '#title'       => t('Source URL'),
    '#collapsible' => TRUE,
    '#collapsed'   => FALSE,
  );

    $form['settings']['freetts_server_settings']['freetts_use_remote_server'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Use remote server for text to speech transforms'),
    '#default_value' => variable_get('freetts_use_remote_server', 0),
    '#description'   => t('Check this box to use a remote server for text to speech transforms'),
  );

  $form['settings']['freetts_server_settings']['freetts_remote_url'] = array(
    '#type'          => 'textfield',
    '#title'         => t('FreeTTS server location'),
    '#default_value' => variable_get('freetts_remote_url', 0),
    '#description'   => t('please give url for the freetts location E.g htt;//www.somewhere.com/'),
  );
  $form['settings']['freetts_server_settings']['freetts_user_key'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Freetts user key'),
    '#default_value' => variable_get('freetts_user_key', 0),
    '#description'   => t('userkey is similar to a username for the freetts interface. This must be the same as the value given in the freetts_settings.php file on the freeTTS server'),
  );
  $form['settings']['freetts_server_settings']['freetts_user_ssid'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Freetts user ssid'),
    '#default_value' => variable_get('freetts_user_ssid', 0),
    '#description'   => t('userssid is similar to a password for the freetts interface. This must be the same as the value given in the freetts_settings.php file on the freeTTS server'),
  );

   $form['settings']['freetts_local_settings'] = array(
    '#type'        => 'fieldset',
    '#title'       => t('Local freetts settings'),
    '#collapsible' => TRUE,
    '#collapsed'   => FALSE,
  );

   $form['settings']['freetts_local_settings']['freetts_jar_path'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Freetts.jar location'),
    '#default_value' => variable_get('freetts_jar_path', FREETTS_DEFAULT_FREETTS_JAR_PATH),
    '#description'   => t('The location of freetts jar relative to site root.'),
  );

  return system_settings_form($form);
}

