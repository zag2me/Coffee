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
        <table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><div align="center"> 
                <p>Settings</p>
                <p>&nbsp;</p>
                <table width="400" border="0" cellspacing="20">
                <tr>
                    <td align="center"><p><a href="settings_users.php"><img src="images/icons/add_user.png" width="64" height="64" border="0"></a><br>Users</p></td>
                    <td align="center"><a href="settings_computers.php"><img src="images/icons/add-computer.png" width="64" height="64" border="0"></a><br>Computers</td>
				</tr>
                  <tr>
                    <td align="center"><a href="settings_general.php"><img src="images/icons/add-settings.png" width="64" height="64" border="0"></a><br>Settings</td>
                    <td align="center"><a href="index.php"><img src="images/icons/add-about.png" width="64" height="64" border="0"></a><br>About</td>
                  </tr>
                </table>
              </div>
			</td>
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
</body>
</html>
