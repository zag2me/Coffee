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
    <td valign="top"><div align="center"> 
        <table width="900" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><div align="center"> 
                <p><em><strong>Thank you for submitting your ICT Job</em></strong></p>
                <p><em><strong><img src="images/icons/tick.png" width="150" height="119"></strong></em></p>
                <p><em><strong>You will receive an email when it has been completed</strong></em></p>
                				
	<?php	
				
				// Get the user
				$user = $db->get_row("SELECT * FROM users WHERE strEmail = '" . $_POST["name"] . "'");
				
				// Check to see if the job description is passed then enter it into the database
				if ($_POST["desc"] != NULL AND $user->strEmail != NULL)
				{
					$db->query("INSERT INTO tickets (strRequesterEmail, strRequesterName, dateSubmitted, strTicketDescription) VALUES ('" . $user->strEmail . "', '" . $user->strName . "',  NOW(), '" . addslashes($_POST["desc"]) . "')");
					echo "<div align='center'><font color='#CCCCCC'>New Job Added. Redirecting in 5 seconds...</font></div>";
				}
				else
				{
					echo "<div align='center'><font color='#CCCCCC'>No User Selected. Redirecting in 5 seconds...</font></div>"; 
				}
				
	?>
                        
                
              </div></td>
          </tr>
        </table>
      </div>
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
<META HTTP-EQUIV="Refresh" CONTENT="5;URL=show_jobs.php">
</body>
</html>
