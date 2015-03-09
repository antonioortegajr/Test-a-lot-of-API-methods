<?php


$p_component = "partners";
$p_meth = array("listcomponents", "listmethods", "clients", "propertytypes", "aggregatedleads", "aggregatedsearches", "aggregatedproperties", "aggregatedleadtraffic", "aggregatedfeatured", "aggregatedsupplemental", "aggregatedsoldpending", "aggregatedlistingstatus", "aggregatedagents");

require_once('api_call.php');

foreach ($p_meth as $meth){

  $url = $test_url . $p_component . '/' . $meth;
  api_call_go('GET', '');

}

?>
