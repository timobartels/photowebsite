<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIMO BARTELS photography</title>
<link href="styles/gallerytextlayout.css" rel="stylesheet" type="text/css" />
<link href="styles/designlayout.css" rel="stylesheet" type="text/css" />
<link href="styles/tablayout.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="scripts/fade.js"></script>

<!--[if lt IE 7]>
<style type="text/css">
.gallery #photo {
height: 600px;
}
</style>
<![endif]-->

</head>
<body class="gallery">
<table class="center_parent" cellpadding="0" cellspacing="0">
<tr>
<td bgcolor="#222222">
<div id="container">

<?php
/*********************************
*  Read parameters from the URL  *
*********************************/
$pic = $_GET["pic"];
$cat = $_GET["cat"];

/*************************************
*  Create the file path definitions  *
*************************************/

$pathcat="./gallery/".$cat."/*.jpg";

$pic_count=count(glob($pathcat));

if ($pic == x)
{
  $pic = $pic_count;
}

$pathpic="./gallery/".$cat."/".$pic.".jpg";

/**********************
*  Variable settings  *
**********************/
$gallerystructure= glob('./gallery/*' , GLOB_ONLYDIR);
$catcount=count($gallerystructure);
$categories = array();
for ($i=0;$i<$catcount;$i++)
{
  $categories[$i]=preg_replace("!./gallery/(.*?)!","$1",$gallerystructure[$i]);
}

$pic_count_cat = array();

for ($i=0;$i<$catcount;$i++)
{
	$tabpathcat="./gallery/".$categories[$i]."/*.jpg";
	$pic_count_cat[$i]=count(glob($tabpathcat));
}

$next=$pic-1;
$prev=$pic+1;

/************************************
*  HTML page generation definition  *
************************************/

printf ("<div id=\"categorytabs\">\n");
printf ("<div id=\"tabs\">\n");
printf ("<ul>\n");
for ($i=0;$i<$catcount;$i++)
{
  if ($categories[$i]==$cat)
  { 
    printf ("<li id=\"current\"><a href=\"#\">%s</a></li>\n",$cat);
  }
  else 
  { 
    printf ("<li><a href=\"./gallery.php?pic=%s&cat=%s\">%s</a></li>\n",$pic_count_cat[$i],$categories[$i],$categories[$i]);
  }
}
printf ("<li id=\"close\"><a href=\"javascript:window.close()\">x</a></li>\n");
printf ("</ul>\n");
printf ("</div>\n");
printf ("</div>\n\n");
printf ("<div id=\"photo\">\n");

if ($next < 1)
{
  printf ("<img src=\"%s\" id=\"fadeobject\" />\n",$pathpic);
}
else
{
  printf ("<a href=\"./gallery.php?pic=%d&cat=%s\"><img src=\"./gallery/%s/%d.jpg\" border=\"0\" id=\"fadeobject\" /></a>\n",$next,$cat,$cat,$pic); 
}
printf ("</div>\n");
printf ("<div id=\"logo\">\n");
printf ("<img src=\"./images/TBphotography.jpg\"/>\n");
printf ("</div>\n");
printf ("<div id=\"navigation\">\n");
if ($prev > $pic_count)
{
  printf ("<img src=\"./images/dummy.jpg\" />\n");
}
else
{
  printf ("\n<a href=\"./gallery.php?pic=%d&cat=%s\"><img src=\"./images/prev.jpg\" border=\"0\" /></a>\n",$prev,$cat);
}
if ($next < 1)
{
  printf ("<img src=\"./images/dummy.jpg\" />\n");
}
else
{
  printf ("<a href=\"./gallery.php?pic=%d&cat=%s\"><img src=\"./images/next.jpg\" border=\"0\" /></a>\n",$next,$cat);
}  
printf ("<img src=\"./images/spacer.jpg\" />\n");
for ($i=$pic_count;$i>=1;$i--) 
{
  if ($i==$pic)
  {
    printf ("<img src=\"./images/on.jpg\" />\n");
  }
  else
  {
    printf ("<a href=\"./gallery.php?pic=%d&cat=%s\"><img src=\"./images/off.jpg\" border=\"0\" /></a>\n",$i,$cat);
  }
}
printf ("</div>\n");
printf ("</div>\n");
?></td>
</tr>
</table>
</body>
</html>