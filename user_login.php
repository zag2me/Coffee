<?php
//** Include Header **//
include 'includes/header.php';
include 'includes/functions.php';
include "includes/ez_sql_core.php";
include "includes/ez_sql_mysqli.php";
include "includes/db_connection.php";
?>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFFFFF"> 
    <td width="20"><div align="center"> <br>
        <br>
      </div></td>
    <td valign="top" align="center">
        <table width="900" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td align="center">
				<p><br>
				<p><em><strong><font face="Arial, Helvetica, sans-serif">Type in your admin user/pass</font></strong></em></p>
				
				<form action="user_login_process.php" name=login method=post>
				<table width="250" border="0">
				<tr>
				<td>Username</td>
				<td><SELECT name=name size="10" onChange="return dept_onchange(frmSelect)" LANGUAGE=javascript>
				
				<?php
				session_start();
				
				$users = $db->get_results("SELECT DISTINCT strName,strEmail FROM users WHERE strAdmin = 'on' ORDER BY strName");
				
				foreach ($users as $user)
				{	
					echo "<OPTION VALUE = '" . $user->strEmail . "'>";
					echo $user->strName . "</Option>";
				}		


				
				?>
</SELECT></td>
  </tr>
</table>
<input type="submit" value="Submit" id=submit1 name=submit1>
</form>
				
				</p>
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="2">

<?php
//** Include Header **//
include 'includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>
