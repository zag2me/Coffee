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
        <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td align="center">
				<p><h2>Manage Users</h2></p>
				<p><a href="new_user.php"><img src="images/icons/add_user.png" border="0"><br></font><font size="2" face="Arial, Helvetica, sans-serif">Add</font></a><br>
				<?php

				// Check if someone is trying to delete a user
				if (isset($_GET["id"]) AND $_GET["id"] > 0 AND isset($_SESSION['user'])) {
					// Delete the user
					$db->query("DELETE FROM Users WHERE intID=" . $_GET["id"]);
				}

				// Check someone has come from the add user form
				if (isset($_POST["name"])) {
					// Insert new user into database
					$db->query("INSERT INTO Users (strName, strEmail, strAdmin, strPassword) VALUES ('" . $_POST["name"] . "', '" . $_POST["email"] . "', '" . $_POST["admin"] . "', '" . $_POST["pass"] . "')");
				}

				// Get a list of the users
				$users = $db->get_results("SELECT * FROM users ORDER BY intID ASC");
				
				?>
				
				</p>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr bgcolor="#CCCCCC"> 
                            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b>ID</b></font></div></td>
                            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Full Name</strong></font></div></td>
                            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Email</strong></font></div></td>
                            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Admin</strong></font></div></td>
                            <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Actions</strong></font></div></td>

                          </tr>
						  
				<?php
				
				 if ($users != NULL) 
					{
						foreach ($users as $user)
						{
							echo "<tr bgcolor='#F0F0F0'> <td> <div align='center'> ";
							echo $user->intID . "</div> </td> <td> <div align='center'> ";
							echo $user->strName . "</div> </td> <td> <div align='center'> ";
							echo $user->strEmail . "</div></td> <td> <div align='center'> ";
							// Check to see if they are an admin
							if ($user->strAdmin == "on") {echo "<img src='images/icons/staron.png' border='0'><div align='center'>  </div></td> <td> ";} 
							else {echo "<img src='images/icons/staroff.png' border='0'><div align='center'> </font> </div></td> <td> <font size='1' face='Arial, Helvetica, sans-serif'> ";}
							echo "<a href='settings_users.php?id=" . $user->intID . "'><center><img src='images/icons/deleteicon2.gif' border='0'></a></center> </div> <div align='center'></div> </td></tr>";
						}
					}
					else {echo "<p><div align='center'>No Users found</p></div>";}
				
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
//** Include Footer**//
include 'includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>
