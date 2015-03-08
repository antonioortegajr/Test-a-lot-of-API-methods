<?php


$p_component = "partners";
$p_meth = array("listcomponents", "listmethods", "clients", "propertytypes", "aggregatedleads", "aggregatedsearches", "aggregatedproperties", "aggregatedleadtraffic", "aggregatedfeatured", "aggregatedsupplemental", "aggregatedsoldpending", "aggregatedlistingstatus", "aggregatedagents");

//check all partners calls

foreach ($p_meth as $meth){


  $url = $test_url . $p_component . '/' . $meth;
$method = 'GET';

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


}





?>
