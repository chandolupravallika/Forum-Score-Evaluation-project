<html>
<head><title>GRE Validation</title></head>
<body>
<?php 
$gre=$_POST['gre'];
$ieltes=$_POST['IELTES'];
$cgpa=$_POST['cgpa'];
// To verify the level of GRE scores, CGPA and IELTS score
if($gre>310)
{
if(in_array($gre,range(310,340)))
{
	if(in_array($ieltes,range(6,9)))
	{
		if(in_array($cgpa,range(3,4)))
		{
	echo '<script type="text/javascript">';
    echo 'window.location="highgrescore.php"' ;
    echo '</script>';
		}
        else
 	echo '<script type="text/javascript">';
    echo 'window.location="highgrescore.php"' ;
    echo '</script>';
   }
    else 
 	echo '<script type="text/javascript">';
    echo 'window.location="highgrescore.php"' ;
    echo '</script>';

 }


}
//else if($gre>290 && $gre<310)
 elseif ($gre>290 && $gre<310) 
 {
if(in_array($gre,range(290,310)))
{
    if(in_array($ieltes,range(6,9)))
    {
        if(in_array($cgpa,range(3,4)))
        {
    echo '<script type="text/javascript">';
    echo 'window.location="midgrescore.php"' ;
    echo '</script>';
        }
        else
    echo '<script type="text/javascript">';
    echo 'window.location="midgrescore.php"' ;
    echo '</script>';
   }
    else 
    echo '<script type="text/javascript">';
    echo 'window.location="midgrescore.php"' ;
    echo '</script>';

 }

} 

//less than 290 score
else 
{
  if(in_array($gre,range(260,290)))
{
    if(in_array($ieltes,range(6,9)))
    {
        if(in_array($cgpa,range(3,4)))
        {
    echo '<script type="text/javascript">';
    echo 'window.location="lowgrescore.php"' ;
    echo '</script>';
        }
        else
    echo '<script type="text/javascript">';
    echo 'window.location="lowgrescore.php"' ;
    echo '</script>';
   }
    else 
    echo '<script type="text/javascript">';
    echo 'window.location="lowgrescore.php"' ;
    echo '</script>';

 }

}



?>
<!--<script type="text/javascript">
//	window.location="gre.html";
//</script>