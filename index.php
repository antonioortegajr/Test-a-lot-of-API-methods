<?php
//variables from strings and date of test
$api_key = $_GET["apikey"];
$out_put = $_GET["output"];
$version = $_GET["version"];
$email_report = $_GET["email"];
$date = date('l jS \of F Y h:i:s A');

$test_url ="http://zdfbvdnbsfgnbfhngdhnfhdsrtghsrtagwerfawreghdrtjtuyksdfbxdc.com";

$p_component = $_GET["Partner"];
$m_component = $_GET["Client"];
$c_component = $_GET["MLS"];
$l_component = $_GET["Lead"];
$sum_compentent = $l_component + $c_component + $m_component;

// create message with test details
$reporting_message = ' Test details:<br>API Key: ' . $api_key . '<br>URL Endpoint: ' . $url . '<br>Output: ' . $out_put . '<br>Version: ' . $version . '<br><hr>';

//instructions
echo '<h1>Test a lot of API methods</h1>';
echo '<p>This is automated testing and reporting of API methods. These tests are looking for the following.
<ul>
<li>Expected https response code</li>
<li>Valid json returned</li>
<li>Expected reponse code based on return size (200 vs 204)</li>
<li>Correct type of key used</li>
</ul>
</p>';

//test calls form
echo '<form action="index.php">
Test Partner level API Calls only: <input type="radio" name="Partner" id="partner_call" value="1">
<br><br>
Test MLS level API Calls only: <input type="radio" name="MLS" id="mls_call" value="2">
<br><br>
Test Client level API Calls: <input type="radio" name="Client" id="client_call" value="3">
<br><br>
Test Lead level API Calls only: <input type="radio" name="Lead" id="lead_call" value="4">
<br><br>
API Key: <input type="text" name="apikey">
<br><br>
<select name="output">
  <option value="">None</option>
  <option value="json">json</option>
  <option value="xml">xml</option>
  </select>
<br><br>
<select name="version">
  <option value="">None</option>
  <option value="1.0.4">1.0.4</option>
  <option value="1.1.1">1.1.1</option>
  <option value="1.2.0">1.2.0</option>
</select>
<br><br>
Email Report to:<input type="text" name="email">
<br><br>
<input type="submit" value="Submit"></form>';


////include test scripts

if ($p_component == 1){
  echo '<hr>';
  echo $reporting_message;
  echo '<br>begin Partner API testing';
//  include 'partner_test_away.php';
  echo '<br>end Partner API testing';
}

else{
  echo '<hr>';

  switch ($sum_compentent){

    case 2:
        echo '<br>begin MLS API testing<br>';
//        include 'mls_test_away.php';
        echo '<br>end MLS API testing<br>';
        break;

    case 5:
        echo '<br>begin MLS API testing<br>';
//        include 'mls_test_away.php';
        echo '<br>end MLS API testing<br>';
        echo '<br>begin MLS API testing<br>';
//        include 'client_test_away.php';
        echo '<br>end Cleint API testing<br>';
        break;

    case 6:
        echo '<br>begin MLS API testing<br>';
  //      include 'mls_test_away.php';
        echo '<br>end MLS API testing<br>';
        echo '<br>begin Leads API testing<br>';
  //      include 'leads_test_away.php';
        echo '<br>end Leads API testing<br>';
        break;

    case 9:
        echo '<br>begin MLS API testing<br>';
  //      include 'mls_test_away.php';
        echo '<br>end MLS API testing<br>';
        echo '<br>begin Client API testing<br>';
  //      include 'client_test_away.php';
        echo '<br>end Client API testing<br>';
        echo '<br>begin Leads API testing<br>';
//        include 'leads_test_away.php';
        echo '<br>end Leads API testing<br>';
        break;

    case 3:
        echo '<br>begin Client API testing<br>';
  //      include 'client_test_away.php';
        echo '<br>end Client API testing<br>';
        break;

    case 7:
        echo '<br>begin Client API testing<br>';
  //      include 'client_test_away.php';
        echo '<br>end Client API testing<br>';
        echo '<br>begin Leads API testing<br>';
  //      include 'leads_test_away.php';
        echo '<br>end Leads API testing<br>';
        break;

    case 4:
        echo '<br>begin Leads API testing<br>';
//        include 'leads_test_away.php';
        echo '<br>end MLS API testing<br>';

  }

}


//check response size
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
if ($out == 'json'){

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

echo '<hr>';
echo 'URL enpoint used: ' . $url . '<br><br>';
echo 'http status code: ' . $code . '<br><br>';
echo 'API Version: ' . $version . '<br><br>';
echo 'API key used: ' . $api_key  . '<br><br>';
echo 'Output requested: ' . $out_put . '<br><br>';
echo 'json validate: ' . $check_json . '<br><br>';
echo 'Return length check: ' . $length_check . '<br><br>';
var_dump($response);
echo '<hr>';

?>
