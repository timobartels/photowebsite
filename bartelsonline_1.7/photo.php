<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo</title>
<link href="styles/sliderlayout.css" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/JavaScript">
function MM_swapImgRestore() {
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) {
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() {
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function showGallery(URL)
{
window.open(URL,'winhigh','width='+screen.width+',height='+screen.height+',left=0,top=0,directories=0,status=0,scrollbars=1,resizable=0,menubar=0,locationbar=0');
}
</script>

<!--[if lt IE 7]>
<style type="text/css">
html {overflow-x:hidden; overflow-y:hidden;}
.slider #header_spacer {
	height: 63px;
}
.slider #latest_link {
	padding-top: 0px;
	padding-left: 504px;
}
</style>
<![endif]-->

</head>

<body class="slider">

<div id="frame">

<div id="header_spacer">
  <div id="latest_link"><a href="latest.html" target="_parent" onfocus="if(this.blur)this.blur()"><img src="images/latest_link_off.jpg" name="latest" width="110" height="50" border="0" id="latest" onmouseover="MM_swapImage('latest','','./images/latest_link_on.jpg',1)" onmouseout="MM_swapImgRestore()"></a></div>
</div>

<?php
/*********************************
*  Read parameters from the URL  *
*********************************/
$c = $_GET["c"];

$slider_category[1] = "abstract";
$slider_category[2] = "architecture";
$slider_category[3] = "automobile";
$slider_category[4] = "nature";
$slider_category[5] = "portrait";
$slider_category[6] = "street";
$slider_category[7] = "world";

$counter = count($slider_category);

if (empty($c))
{
  printf ("\n<div id=\"no_select_spacer\">\n</div>\n");
}
else
{
  printf ("\n<div id=\"select_spacer\">\n</div>\n");
}

for ($i=1;$i<=$counter;$i++)
{
  if ($i==$c)
  {
    printf ("<div id=\"current\">\n");
	printf ("<a href=\"./photo.php\"><img src=\"./images/category/%d_full.jpg\" border=\"0\"/></a>\n",$i);
	printf ("<h3>%s</h3>\n",$slider_category[$i]);
	printf ("<div align=\"center\">\n");
	
	printf ("<a href=\"javascript:showGallery('gallery.php?pic=x&cat=%s')\" onfocus=\"if(this.blur)this.blur()\">\n",$slider_category[$i]);
	printf ("<img src=\"./images/category/show_gallery_off.jpg\" name=\"button\" width=\"60\" height=\"59\" border=\"0\" id=\"button\" onmouseover=\"MM_swapImage('button','','./images/category/show_gallery_on_orange.jpg',1)\" onmouseout=\"MM_swapImgRestore()\"></a>\n");
	printf ("</div>\n");
	printf ("</div>\n\n");
  }
  else
  {
    printf ("<div id=\"sl%d\">\n",$i);
	printf ("<a href=\"./photo.php?c=%d\" target=\"_self\" onfocus=\"if(this.blur)this.blur()\">\n",$i);
	printf ("<img src=\"./images/category/%d_off.jpg\" name=\"sl%d\" width=\"60\" height=\"225\" border=\"0\" id=\"sl%d\" onmouseover=\"MM_swapImage('sl%d','','./images/category/%d_on.jpg',1)\" onmouseout=\"MM_swapImgRestore()\"></a>\n",$i,$i,$i,$i,$i);
	printf ("</div>\n\n");
  }
}

if (empty($c))
{
 printf ("<img src=\"images/category/slider_text.jpg\" style=\"margin-top:10px\"/>\n");
}

?>
</div>

</body>
</html>