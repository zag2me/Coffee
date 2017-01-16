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
            <p><h2>Settings</h2></p>
				<p><br>
				<?php
				
				// Update the database
				$db->query("UPDATE settings SET strSmtpUser='" . $_POST["smtp_user"] . "', strSmtpEmail='" . $_POST["smtp_user"] . "', strSmtpPassword='" . $_POST["smtp_password"] . "' WHERE intID = 1");	
				echo "Settings Updated";
				
				?>
				
				</p>
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="2">

<?php
//** Include Footer **//
include 'includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
<META HTTP-EQUIV="Refresh" CONTENT="3;URL=show_jobs.php">
</body>
</html>
