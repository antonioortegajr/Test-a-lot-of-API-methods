<?php


$l_component = "leads";

$l_meth = array("listcomponents", "listmethods", "lead", "note", "search", "property",

);

require_once('api_call.php');

foreach ($l_meth as $meth){

  $url = $test_url . $l_component . '/' . $meth;
  api_call_go('GET');
}

?>
