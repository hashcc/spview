<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" type="text/css" media="screen,hendheld,print" href="./common/css/pc.css" />
<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="./common/css/smartphone.css" />
<script src="./common/js/jquery-1.8.0.min.js"></script>
<script src="./common/js/jquery.nicescroll.js"></script>
<script src="./common/js/boot.js"></script>
<title>SPView（スマートフォンでの見た目を確認）</title>
</head>
<body>

<div id="article">

<?php echo getImageList("div", "iphone"); ?>
<?php echo getImageList("div", "xperia"); ?>
<?php echo getImageList("div", "nexus"); ?>

<div id="filelist">
<dl>
<dt>ページ</dt>
<dd><select size="15" id="page" name="page">
<?php echo getImageList("option"); ?>
</select></dd>
</dl>
</div>

</div>

</body>
</html>