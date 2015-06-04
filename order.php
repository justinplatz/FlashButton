<?php 
function doFail(){
	echo "Invalid Password";
	die();
}
if (isset($_POST['p']) && $_POST["p"] != "123"){
	doFail();
} else if (isset($_GET['p']) && $_GET['p'] != "123") {
	doFail();
} else if (!isset($_GET['p']) && !isset($_POST['p'])) {
	doFail();
}


// Get cURL resource
$curl = curl_init("https://api.zinc.io/v0/order");
//$curl = curl_init("https://google.com");

$string = file_get_contents('/Applications/MAMP/htdocs/Dash/sampleJsonZinc.json');
//$string = preg_replace('/\s+/', ' ', $string);
$orderJson = json_decode($string, true);

print_r($orderJson);

// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
    CURLOPT_POSTFIELDS => $string,

));

// Send the request & save response to $resp
 $resp = 1;

 curl_exec($curl);

 if ($resp) {
 	echo $resp;
 }
 else
 	echo "Fail";

// Close request to clear up some resources
 curl_close($curl);

?>