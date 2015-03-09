<?php

$c_component ="clients";
$c_meth = array("listcomponents", "listmethods", "agents", "offices", "systemlinks", "savedlinks", "widgetsrc", "featured", "soldpending", "supplemental", "historical", "cities", "citieslistname", "counties", "zipcodes", "accounttype");

require_once('api_call.php');

foreach ($c_meth as $meth){

//loop through array of mehtods
  $url = $test_url . $c_component . '/' . $meth;

  api_call_go('GET');

}
?>
