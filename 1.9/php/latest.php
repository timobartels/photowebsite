<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Latest.php</title>

<script language="JavaScript" type="text/JavaScript">
function showGallery(URL)
{
window.open(URL,'winhigh','width='+screen.width+',height='+screen.height+',left=0,top=0,directories=0,status=0,scrollbars=1,resizable=0,menubar=0,locationbar=0');
}
</script>

<link href="styles/iframelayout.css" rel="stylesheet" type="text/css" />

</head>

<body class="latest">
<div id="frame">

<?php

/****************************************
* Function:  Search for latest files 
****************************************/

function LoadFiles($dir,$filter="")
{
 $Files = array();
 $It =  opendir($dir);
 if (! $It)
  die('Cannot list files for ' . $dir);
 while ($Filename = readdir($It))
 {
 if ($Filename != '.' && $Filename != '..'  )
 {
  if(is_dir($dir . $Filename))
   {
   $Files = array_merge($Files, LoadFiles($dir . $Filename.'/'));
   }
 else 
  if ($filter=="" || preg_match( $filter, $Filename ) ) 
   {
   $LastModified = filemtime($dir . $Filename);
   $Files[] = array($dir .$Filename, $LastModified);
   }
    
  else 
   continue;
   
 }
}
  return $Files;
}
function DateCmp($a, $b)
{
  return  strnatcasecmp($a[1] , $b[1]) ;
} 
function SortByDate(&$Files)
{
  usort($Files, 'DateCmp');
} 


/****************************************
*              MAIN PROGRAM				*
****************************************/

$showpic = $_GET["showpic"];

$Files = LoadFiles("./gallery/");
SortByDate($Files);
reset($Files);

$piccount=count($Files);

$latest = $piccount;
$latest--;

if (empty($showpic))
{
  $showpic = $latest;
}

$file = $Files[$showpic][0];
  
$prev = $showpic + 1;
$next = $showpic - 1;
  
$array = explode("/",$file);
  
$cat = $array[2];
$pic_ext = split('[.]',$array[3]);
$pic = $pic_ext[0];

printf ("<img src=\"images/D200_LCD_latest_transparent.jpg\" border=\"0\" usemap=\"#Map\" />\n");
printf ("<map name=\"Map\" id=\"Map\">\n");
if ($prev < $piccount)
{
  printf ("<area shape=\"rect\" coords=\"430,212,444,229\" href=\"latest.php?showpic=$prev\" />\n");
}
printf ("<area shape=\"rect\" coords=\"479,209,493,228\" href=\"latest.php?showpic=$next\" />\n");
printf("</map>\n");
printf("<div id=\"LCD\">\n");
printf("<a href=\"javascript:showGallery('gallery.php?pic=%s&cat=%s')\">",$pic,$cat);
printf("<img src=\"thumb.php?file=$file&width=260&height=200\" border=\"0\"></a>\n");
printf("</div>\n");

?>
</div>
</body>
</html>