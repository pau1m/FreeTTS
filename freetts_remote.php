<?php
// $Id$

/**
 * @file
 * This file interacts with a FreeTTS system to create an audio file from text
 *
 * It also requires LAME to be installed and optionally can make use of MBrola
 */

require_once('freetts_config.php');
// Multiple voices are supported, though this is an optional value.
// If unset voice 1 is assumed to be the voice of choice.
if ( isset($_POST['voice']) ) {
  $voice=urldecode($_POST['voice']);
}
else {
  $voice='1';
}

// Verify data.
if ( !isset($_POST['key'])  ) {
  // No key has been assigned.
  echo 'error1';
  exit();
}

if ( !isset($_POST['ssid'])  ) {
  // No key has been assigned.
  echo 'error2';
  exit();
}

if ( !isset($_POST['content'])  ) {
  // No content has been assigned.
  echo 'error3';
  exit();
}

if ( isset($_POST['filename'])  ) {
  $basename = $_POST['filename'];
  $filename = $basename . '.txt';
}
else {
  $basename = time();
  $filename = $basename . '.txt';
}

if ( isset($_POST['ssid']) ) {
  // If ssid uses post, so too should key - this assumption increases security.
  $acquired_key   = $_POST['key'];
  $acquired_ssid  = $_POST['ssid'];
  $content_string = $_POST['content'];
}

if ( $acquired_key != $user_key ) {
  // User key was incorrect.
  echo 'error4';
  exit();
}

if ( $acquired_ssid != $user_ssid ) {
  // User ssid was incorrect.
  echo 'error5';
  exit();
}

// Saving data to a file uses extra resources, but adds in an additional safeguard.
$filehandle = fopen($filename, 'w') or die("can't open file");
fwrite($filehandle, $content_string);
fclose($filehandle);

// Do tts conversion.
// Build  TTS conversion command.
if ( isset($mbrola_dir) && ($mbrola_dir != '') ) {
  // Do conversion with MBrola.
  $tts_command = 'java -Dmbrola.base=' . $mbrola_dir . ' -jar ' . $freetts_dir . '/freetts.jar  ' . $mbrola_voice . ' -dumpAudio ' . $basename . '.wav -file ' . $filename;
}
else {
  //Do not use MBrola.
  $tts_command = 'java  -jar ' . $freetts_dir . '/freetts.jar -voice kevin16 -dumpAudio ' . $basename . '.wav -file ' . $filename;
}

//execute tts conversion
$output = shell_exec($tts_command);
if( (!isset($output) or( $output=='') {
  // There was an error with the TTS conversion.
  echo 'error6';
  exit();
}

// LAME wav to mp3.
$lame_command =' lame -b 112 ' . $basename . '.wav  ' . $basename . '.mp3 ';
$output=shell_exec($lame_command);

if ( (!isset($output) or( $output=='') {
  // There was an error with LAME conversion.
  echo 'error6';
  exit();
}

// Once used delete the temporary files to save disk space.
unlink($filename);
unlink($basename . '.wav');

//Return url.
$return_link = $basename . '.mp3';
echo $return_link;
?>