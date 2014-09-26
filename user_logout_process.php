<?php
//** Include Header **//
include 'includes/header.php';
include 'includes/functions.php';
include "includes/ez_sql_core.php";
include "includes/ez_sql_mysql.php";
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
                <p>
				Welcome to Coffee - The simple ICT Support System
				</strong></p><br>
				<p><br>
				<p><em><strong><font face="Arial, Helvetica, sans-serif">Type in your admin user/pass</font></strong></em></p>	
			
				<?php
				
				$_SESSION['user'] = $_POST["name"];

				
					// Start a User session
					session_start();
					
					// Assign the logged in user to NULL so they are logged out
					$_SESSION['user'] = NULL;
					
					// Message the user goodbye
					echo "<br>Goodbye... Logged out";
				
				
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
//** Include Header **//
include '/includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
<META HTTP-EQUIV="Refresh" CONTENT="2;URL=show_jobs.php">
</body>
</html>
