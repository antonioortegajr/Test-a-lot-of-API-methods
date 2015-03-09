<html>
<head>
  <title>ALL the meth</title>
  <link href="style.css" rel="stylesheet">

</head>
<body>
<?php
//variables from strings and date of test
$api_key = $_GET["apikey"];
$out_put = $_GET["output"];
$version = $_GET["version"];
//$email_report = $_GET["email"];
$date = date('l jS \of F Y h:i:s A');

$test_url ="https://api.idxbroker.com/";

$p_component = $_GET["Partner"];
$m_component = $_GET["Client"];
$c_component = $_GET["MLS"];
$l_component = $_GET["Lead"];
//add the component values in string to determin the API calls to make
$sum_component = $l_component + $c_component + $m_component;

// create message with test details
$reporting_message = ' Test details:<br>API Key: ' . $api_key . '<br>URL Endpoint: ' . $url . '<br>Output: ' . $out_put . '<br>Version: ' . $version . '<br><hr>';

//red div class for errors
$red = '<div class="red">';
$red_close = '</div>';

//instructions
echo '<h1>Test a lot of API methods</h1><div class="inline" style="font-size: 2.5em; padding-left:50px">You <div id="heart" class="inline"></div><div class="inline" style="padding-left:120px;">API</div></div><br>';

echo '<p>This is automated testing and reporting of API methods. These tests are looking for the following.
<ul>
<li>Expected https response code</li>
<li>Valid json returned</li>
<li>Expected reponse code based on return size (200 vs 204)</li>
<li>Correct type of key used</li>
</ul>
</p>';

//test calls form
echo '<p>Choose one or more of the comonents below. Choosing Partner will ignore any other components chosen as the partner calls require a partner level API key.
</p>
<form action="index.php">
Test Partner level API Calls only: <input type="radio" name="Partner" id="partner_call" value="1">
<br><br>
Test MLS level API Calls: <input type="radio" name="MLS" id="mls_call" value="2">
<br><br>
Test Client level API Calls: <input type="radio" name="Client" id="client_call" value="3">
<br><br>
Test Lead level API Calls: <input type="radio" name="Lead" id="lead_call" value="4">
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
(in progress)Email Report to:<input type="text" name="email">
<br><br>
<input type="submit" value="Submit">
<br><br>
<a href="http://antoniowp.idxsandbox.com/tools/all_the_meth/index.php">Reload test to clear values</a>
</form>';


//echo out reporting

echo '<hr><hr>';
echo $date . ' Test details <br><br>';
echo 'API Version: ' . $version . '<br><br>';
echo 'API key used: ' . $api_key  . '<br><br>';
echo 'Output requested: ' . $out_put . '<br><br>';
echo 'Components to be tested: ';

switch ($sum_component){
  case 2:
  echo 'MLS component tested';
  break;
  case 5:
  echo 'MLS and Cleint components tested';
  break;
  case 6:
  echo 'MLS and Leads components tested';
  break;
  case 9:
  echo 'MLS, Leads, and Client components tested';
  break;
  case 3:
  echo 'Cient component tested';
  break;
  case 7:
  echo 'Client and Leads components tested';
  break;
  case 4:
  echo 'Leads component tested';
  break;
}

echo '<hr>';

//temp save file
$file = 'temp.txt';


//include test scripts

if ($p_component == 1){
  echo '<hr>';
  echo $reporting_message;
  echo '<br><h1>begin Partner API testing</h1>';
    include 'partner_test_away.php';
  echo '<br><h1>end Partner API testing</h1>';
}

else{
  echo '<hr>';

  switch ($sum_component){

    case 2:
        echo '<br><h1>begin MLS API testing</h1><br>';
        include 'mls_test_away.php';
        echo '<br><br><h1>end MLS API testing</h1><br>';
        break;

    case 5:
        echo '<br><h1>begin MLS API testing</h1><br>';
        include 'mls_test_away.php';
        echo '<br><h1><br>end MLS API testing</h1><br>';
        echo '<br><h1>begin Client API testing</h1><br>';
        include 'client_test_away.php';
        echo '<br><br><h1>end Cleint API testing</h1><br>';
        break;

    case 6:
        echo '<br><h1>begin MLS API testing</h1><br>';
        include 'mls_test_away.php';
        echo '<br><h1>end MLS API testing</h1><br>';
        echo '<br><h1>begin Leads API testing</h1><br>';
        include 'leads_test_away.php';
        echo '<br><h1>end Leads API testing</h1><br>';
        break;

    case 9:
        echo '<br><h1>begin MLS API testing</h1><br>';
        include 'mls_test_away.php';
        echo '<br><br><h1>end MLS API testing</h1><br>';
        echo '<br><h1>begin Client API testing</h1><br>';
        include 'client_test_away.php';
        echo '<br><br><h1>end Client API testing</h1><br>';
        echo '<br><h1>begin Leads API testing</h1><br>';
        include 'leads_test_away.php';
        echo '<br><br><h1>end Leads API testing</h1><br>';
        break;

    case 3:
        echo '<br><h1>begin Client API testing</h1><br>';
        include 'client_test_away.php';
        echo '<br><br><h1>end Client API testing</h1><br>';
        break;

    case 7:
        echo '<br><h1>begin Client API testing</h1><br>';
        include 'client_test_away.php';
        echo '<br><br><h1>end Client API testing</h1><br>';
        echo '<br><h1>begin Leads API testing</h1><br>';
        include 'leads_test_away.php';
        echo '<br><br><h1>end Leads API testing</h1><br>';
        break;

    case 4:
        echo '<br><h1>begin Leads API testing</h1><br>';
        include 'leads_test_away.php';
        echo '<br><br><h1>end MLS API testing</h1><br>';

  }

}

//send email to be added later

?>
<body>
</html>
