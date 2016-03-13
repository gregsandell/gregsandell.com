<?php  
  
require_once('/Arc90/Service/Twitter.php');  
  
$twitter = new Arc90_Service_Twitter('gregsandell', 'varnatwitter');  
  
try  
{   
    // Gets the authenticated user's friends timeline in XML format  
    $response = $twitter->getFriendsTimeline('XML');  
  
    // Print the XML response  
    echo $response->getData() . "\n";  
  
    // If Twitter returned an error (401, 503, etc), print status code  
    if($response->isError())  
    {  
        echo $response->http_code . "\n";  
    }  
}  
catch(Arc90_Service_Twitter_Exception $e)  
{  
    // Print the exception message (invalid parameter, etc)  
    print $e->getMessage();  
}  
?>
