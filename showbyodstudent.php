<?php
//** Include Header **//
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
				<p><h2>School BYOD survey</h2></p>
				<?php
			
				// Insert new BYOD device
				if (isset($_POST["model"]) AND isset($_POST["name"]) AND isset($_POST["username"]) AND isset($_POST["wireless"]))
				{
					// Lets replace any hyphens in the MAC address with colons
					$_POST["wireless"] = str_replace("-",":",$_POST["wireless"]);
					
					// Insert new asset into database
					$db->query("INSERT INTO byod (strPerson, strUsername, strMAC, strModel, dateAdded) VALUES ('" . $_POST["name"] . "', '" . $_POST["username"] . "', '" . $_POST["wireless"] . "', '" . $_POST["model"] . "', '" . $_POST["dateadded"] . "')");
					echo "<div align='center'>New BYOD user Registered....</div>";
				}
				
				
				
							?>
				
				</p>
                        Thanks!<br><br>
						Please see Network Manager at Lunch with your device to complete the process
						<br><br>
						<img src="images/icons/tick.png">
						<br><br>
						<a href="http://rgmedia/Student/SitePages/BYOD.aspx">Return to sharepoint</a>
					  
				
				
				
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
</body>
</html>
