<?php

$m_component = "mls";
$m_meth = array("listcomponents", "listmethods", "approvedmls", "cities", "counties", "zipcodes", "prices", "propertytypes", "propertycount", "age", "searchfields", "searchfieldvalues");

//check all partners calls

foreach ($m_meth as $meth){


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

?>
