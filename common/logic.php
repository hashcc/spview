<?php

function getImageList($type, $device="iphone"){
	
	$files = null;
	
	if ($_GET){
		if (preg_match('#[^0-9a-zA-Z._-]#', $_GET["dir"])){
			exit('<div id="error">デザイン画像を入れるフォルダ名は半角英数字と . _ - のいずれかだけにしてください</div>');
		} else{
			$path = "./design/".$_GET["dir"]."/";
		}
	} else{
		$path = "./design/";
	}
	
	if ($dir = opendir($path)) {
		while (($file = readdir($dir)) !== false){
			if ($file != "." && $file != ".."){
				$files[] = $file;
			}
		}
	}
	
	if (!$files){
		exit('<div id="error">画像フォルダに画像が入っていません</div>');
	} else{
		sort($files);
		closedir($dir);
	}
	
	for ($i=0; $i<count($files); $i++){
		if ($type == "option"){
			$list .= '<option value="'.$i.'">'.$files[$i]."</option>\n";
		} elseif ($type == "div"){
			switch($device){
				case "iphone": $size = 178; break;
				case "xperia": $size = 184; break;
				case "nexus": $size = 208; break;
			}
			$list .= '<div class="shot hide">'.
			            '<img src="./common/img/addressbar.'.$device.'.png" />'.
			            '<img src="./common/resize.php?size='.$size.'&amp;img=.'.$path.$files[$i].'" />'.
			            "</div>\n";
		}
	}
	
	if ($type == "div"){
		$list = '<div class="shots" id="'.$device.'">'."\n".$list."</div>\n\n";
	}
	
	return $list;
	
}

?>