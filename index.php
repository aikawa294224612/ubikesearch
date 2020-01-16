<?php
header('Access-Control-Allow-Origin: http://localhost:8081');
header('Access-Control-Allow-Method:POST,GET');

$bike=$_GET['bike'];

$iinstring="";
$handle = fopen("https://youbike-api.herokuapp.com/","rb");
$content = "";
while (!feof($handle)) {
    $content .= fread($handle, 10000);
}
fclose($handle);
$content = json_decode($content,true);
for($i=1;$i<405;$i++){
	if($i<10){
		$iinstring='000'.$i;
		if(@strpos($content['data'][$iinstring]['sna'],$bike)!==false){
			echo $content['data'][$iinstring]['sna'].':目前有'.$content['data'][$iinstring]['sbi'].'輛/更新時間:'.$content['data'][$iinstring]['mday'];
			break;
		}
	}else if(9<$i&&$i<100){
		$iinstring='00'.$i;
		if(@strpos($content['data'][$iinstring]['sna'],$bike)!==false){
			echo $content['data'][$iinstring]['sna'].':目前有'.$content['data'][$iinstring]['sbi'].'輛/更新時間:'.$content['data'][$iinstring]['mday'];
			break;
		}
	}else{
		$iinstring='0'.$i;
		if(@strpos($content['data'][$iinstring]['sna'],$bike)!==false){
			echo $content['data'][$iinstring]['sna'].':目前有'.$content['data'][$iinstring]['sbi'].'輛/更新時間:'.$content['data'][$iinstring]['mday'];
			break;
		}
	}
}

?>