<?php

function api_call_go($param1) {

  global $api_key, $out_put, $version, $code, $check_json, $response, $url;

//GET, PUT, POST, or DELETE passed to function
$method = $param1;

// headers (required and optional)
$headers = array(
  'Content-Type: application/x-www-form-urlencoded', // required
  'accesskey: '. $api_key, // required - replace with your own
  'outputtype: ' . $out_put, // optional - overrides the preferences in our API control page
  'apiversion: ' . $version
);
// set up cURL
$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
// exec the cURL request and returned information. Store the returned HTTP code in $code for later reference
$response = curl_exec($handle);
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if ($code >= 200 || $code < 300)
  $components = json_decode($response,true);
else
  $error = $code;
  //check response size against http status code returned
  $response_length = strlen($response);


  switch ($code) {
    case "200":
    if ($response_length > 0 ){

      $length_check = $code .  ' code matches stringth length';

    }

    else {
      $length_check = $code . ' code does NOT matches stringth length';

    }
        break;

        case "204":
        if ($response_length == 0 ){

          $length_check = $code .  ' code matches stringth length';

        }

        else {
          $length_check = $code . ' code does NOT matches stringth length';

        }
            break;
  }





  //use json_decode() to validate the response
  if ($out_put == 'json'){

  $json_decode_check = $response;
  json_decode($json_decode_check);
  switch (json_last_error()) {
    case JSON_ERROR_NONE:
    $check_json = '- json_decode() found no JSON errors';
    break;
    case JSON_ERROR_DEPTH:
    $check_json =  ' - Maximum stack depth exceeded';
    break;
    case JSON_ERROR_STATE_MISMATCH:
    $check_json =  ' - Underflow or the modes mismatch';
    break;
    case JSON_ERROR_CTRL_CHAR:
    $check_json =  ' - Unexpected control character found';
    break;
    case JSON_ERROR_SYNTAX:
    $check_json =  ' - Syntax error, malformed JSON';
    break;
    case JSON_ERROR_UTF8:
    $check_json =  ' - Malformed UTF-8 characters, possibly incorrectly encoded';
    break;
    default:
    $check_json =  ' - Unknown json error';
    break;
  }

  };

  echo 'URL enpoint used: ' . $url . '<br><br>';
  echo 'http status code: ' . $code . '<br><br>';
  echo 'json validate: ' . $check_json . '<br><br>';
  echo 'Return length check: ' . $length_check . '<br><br>';
  var_dump($response);
  echo '<hr>';


}

?>
