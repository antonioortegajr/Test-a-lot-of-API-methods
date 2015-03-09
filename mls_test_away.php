<?php

$m_component = "mls";
$m_meth = array("listcomponents", "listmethods", "approvedmls", "cities", "counties", "zipcodes", "prices", "propertytypes", "propertycount", "age", "searchfields", "searchfieldvalues");

require_once('api_call.php');

foreach ($m_meth as $meth){

  $url = $test_url . $m_component . '/' . $meth;

  api_call_go('GET');
}

?>
