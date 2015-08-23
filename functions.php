<?php
function fetchData($url)
  {
  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
$result = curl_exec($ch);
curl_close($ch);
return $result;
  }
function search($client,$q){
	switch($client){
		case 'twit': $url = "http://search.twitter.com/search.json?q=%23{$q}&rpp=20"; 
					$data = fetchData($url);
					echo"<script type='text/javascript'>						
						var txt={$data};
						//var data=txt.completed_in;
						//document.write(data);
						for(i=0;i<20;i++){
						    var data=txt.results[i];
							var img = decodeURIComponent(data.profile_image_url);
							document.write(data.from_user+' Says'+'<br /><img src='+img+' />: '+data.text+'<br />');
						    //document.getElementById('search_feed').innerHTML+=data+' <br />';
						}
					</script>";
					break;
		case 'wiki': wiki(q);
						break;
		case 'media': media(q);
						break;
		case 'goog': goog(q);
						break;
	}
}
?>
