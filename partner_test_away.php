<?php


$p_component = "partners";
$p_meth = array("listcomponents", "listmethods", "clients", "propertytypes", "aggregatedleads", "aggregatedsearches", "aggregatedproperties", "aggregatedleadtraffic", "aggregatedfeatured", "aggregatedsupplemental", "aggregatedsoldpending", "aggregatedlistingstatus", "aggregatedagents");

require_once('api_call.php');

$email_report ='The following issues were found in this test ' . $recreate_test_url . ' : ';

foreach ($p_meth as $meth){

  $url = $test_url . $p_component . '/' . $meth;
  api_call_go('GET', '');

}

//echo '<hr><hr><hr><hr>' . $email_report;

?>
