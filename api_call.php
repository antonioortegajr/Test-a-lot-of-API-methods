<?php

function api_call_go($param1, $param2) {

  global $api_key, $out_put, $version, $code, $check_json, $response, $url, $red, $red_close, $response;

$file = 'temp.txt';
//GET, PUT, POST, or DELETE passed to function
$method = $param1;

$add =file_get_contents($file);

$url = $url . $add;

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
      $length_check = $red . $code . ' code does NOT matches stringth length' . $red_close;

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

// return response code explination
  echo 'Status code: ' . $code;
  switch ($code) {
    case 200:
    echo " All good";
    break;
    case 204:
    echo " We all good, nothing to return.";
    break;
    case 400:
    echo $red . " Required parameter missing or invalid. Check the API endpoint you used. " . $red_close;
    break;
    case 401:
    echo $red . " accesskey not valid or revoked. You could reset the API key. In doing so the client will have to update to the new key. Should reseting not resolve the issue create a ticket. " . $red_close;
    break;
    case 403:
    echo $red . " Call not using SSL (HTTPS). This could the url they set up or the hosting they are using to make the call. In either case there is nothing further to trouble shoot as we can not change their code or upgrade their hosting. (╯'□')╯︵ sdʇʇɥ" . $red_close;
    break;
    case 404:
    echo $red . " The requested URL was not found on this server. Check the API endpoint you used. " . $red_close;
    break;
    case 406:
    echo $red . " No API Key provided this call was not run. (╯°□°)╯︵  ʎǝʞ IԀ∀" . $red_close;
    break;
    case 409:
    echo $red . " Duplicate unique data detected. " . $red_close;
    break;
    case 412:
    echo $red . " Over Hourly API limit. Wait an hour and re check or reset key in middleware. " . $red_close;
    break;
    case 417:
    echo $red . " Either over 1k in saved links created by API or no title in the saved links PUT request. Check response header for indication " . $red_close;
    break;
    case 500:
    echo $red . " General error. Create a ticket! " . $red_close;
    break;
    case 503:
    echo $red . " Scheduled or emergency API maintenance will result in 503 errors. " . $red_close;
    break;
    case 521:
    echo $red . " Temporary error. There is a possibility that not all API methods are affected. Test and create tickets for affected methods. " . $red_close;
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

if ( $url == 'https://api.idxbroker.com/mls/approvedmls'){

  $c = '/' . $components[0]['id'];

file_put_contents($file, $c);
}


  echo '<br><br>URL enpoint used: ' . $url . '<br><br>';
  echo 'json validate: ' . $check_json . '<br><br>';
  echo 'Return length check: ' . $length_check . '<br><br>';
  echo 'Response body: <br>';
  var_dump($components);
  echo '<hr>';

}

?>
