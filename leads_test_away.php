<?php


$l_component = "leads";

$l_meth = array("listcomponents", "listmethods", "lead", "note", "search", "property",

);

require_once('api_call.php');

foreach ($l_meth as $meth){

  $url = $test_url . $l_component . '/' . $meth;
  api_call_go('GET', '');
}

//test PUT, POST, and DELETE
$url = $test_url . $c_component . '/' . 'leads';

$data = array(
	'firstName'=>'Bruce',
	'lastName'=>'Wayne',
	'email'=>'bats@waynetech.com'
);

  api_call_go('PUT', $data);

  $data = array(
  	'firstName'=>'Dick',
  	'lastName'=>'Grayson',
  	'email'=>'bats@waynetech.com'
  );
  api_call_go('POST', $data);

  api_call_go('DELETE', '');


  //clear temp file after testing
  $c ='';

  $current = file_put_contents($file, $c);

?>
