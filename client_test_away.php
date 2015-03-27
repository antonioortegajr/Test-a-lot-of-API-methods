<?php

$c_component ="clients";
$c_meth = array("listcomponents", "listmethods", "agents", "offices", "systemlinks", "widgetsrc", "featured", "soldpending", "supplemental", "historical", "cities", "citieslistname", "counties", "zipcodes", "accounttype", 'savedlinks');

require_once('api_call.php');

foreach ($c_meth as $meth){

//loop through array of mehtods
  $url = $test_url . $c_component . '/' . $meth;

  api_call_go('GET', '');

}


//test PUT, POST, and DELETE
$url = $test_url . $c_component . '/' . 'savedlinks';
$data = array(
    'linkName'=>'Good_side_of_tracks', // the link's url
    'pageTitle'=>'Good_side_of_tracks', // the title tag
    'linkTitle'=>'Good_side_of_tracks', // how the link displays
    'queryString'=>array('idxID'=>'a001','hp'=>200000)
);
$data = http_build_query($data); // encode and & delineate
api_call_go('PUT', $data);



api_call_go('POST', $data);
$data = array(
    'linkName'=>'Good_side_of_tracks_editd', // the link's url
    'pageTitle'=>'Good_side_of_tracks_edited', // the title tag
    'linkTitle'=>'Good_side_of_tracks_edited', // how the link displays
    'queryString'=>array('idxID'=>'a001','hp'=>200000)
);
api_call_go('DELETE', '');


//clear temp file after testing
$c ='';

$current = file_put_contents($file, $c);

?>
