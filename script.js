//ajax


function twitter(data,q){
	alert(q);
	var obj = eval ("(" + txt + ")"); 
	for(i=0;i<5;i++){
	var txt=data[i].results[i].text;
	documnet.getElementById("search_feed").innerHTML=txt+" <br />";
	}
}