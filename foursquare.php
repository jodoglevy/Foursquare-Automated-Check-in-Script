<?php
$curl_handle=curl_init();

// four square login credntials
$credentials = "email:password";

// vids are the ids of the different locations to check in to
$vids = array(venue_id1,venue_id2);

// this script's URL path...change if your script has a different name/path
$url_path = "/foursquare.php";


//no need to change any of the below...

$which = $_GET['v'];
if($which >= count($vids))
{
	$which = 0;
}

// send request through post using curl
curl_setopt($curl_handle,CURLOPT_USERPWD,$credentials);
curl_setopt($curl_handle,CURLOPT_POSTFIELDS,'vid='.$vids[$which]);
curl_setopt($curl_handle,CURLOPT_URL,'http://api.foursquare.com/v1/checkin');
curl_exec($curl_handle);
curl_close($curl_handle);
?>
<html>
<head>
<script type="text/JavaScript">
function timedRefresh(timeoutPeriod) 
{
	setTimeout("window.location='<?php echo $url_path;?>?v=<?php echo($which+1);?>'",timeoutPeriod);
}
</script>
</head>
<body onload="JavaScript:timedRefresh(3600000+<?php echo rand(1000,120000);?>);">
</body>
</html>
