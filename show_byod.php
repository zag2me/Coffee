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
				<p><h2>BYOD User List</h2></p>
				<?php
			
				// Delete asset if requested
				if ($_GET["delete"] > 0 AND $_SESSION['user'] != NULL)
				{
					$db->query("DELETE FROM byod WHERE intID =" . $_GET["delete"]);
				}

				// Insert new BYOD user
				if ($_POST["model"] != NULL AND $_POST["name"] AND $_POST["username"] != NULL AND $_POST["wireless"] != NULL)
				{
					// Insert new asset into database
					$db->query("INSERT INTO byod (strPerson, strUsername, strMAC, strModel, dateAdded) VALUES ('" . $_POST["name"] . "', '" . $_POST["username"] . "', '" . $_POST["wireless"] . "', '" . $_POST["model"] . "', '" . $_POST["dateadded"] . "')");
					echo "<div align='center'>New BYOD user Added....</div>";
				}
				
				// Create an array of all the tickets
				$byods = $db->get_results("SELECT * FROM byod ORDER BY intID DESC");

				?>
				
				</p>
                        <p><a href="new_byod.php"><img src="images/icons/user-byod.png" width="64" height="64" border="0"></a> </p> Add<br>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr bgcolor="#CCCCCC"> 
                            <td><div align="center"><strong>ID</strong></div></td>
                            <td><div align="center"><strong>Name</strong></div></td>
                            <td><div align="center"><strong>UserName</strong></div></td>
                            <td><div align="center"><strong>Wireless MAC</strong></div></td>
                            <td><div align="center"><strong>Date Added</strong></div></td>
                            <td><div align="center"><strong>Model</strong></div></td>
							<td><div align="center"><strong>Age</strong></div></td>

                          </tr>
					  
				<?php
				
			// Display each support tickets in a table
			if ($byods != NULL)
			{
				foreach ($byods as $byod)	
					{
						
						
						// Display the ID number and a delete icon
						echo "<td> <div align='center'> ";
						echo "<a name='" . $byod->intID . "'>" . $byod->intID;
						
						// Check if logged in and show delete feature
						if ($_SESSION['user'] != NULL) {echo " <a href='show_byod.php?delete=" . $byod->intID . "'>x</a>";}
						
						// Display the assets person
						echo "</div> </td><td><div align='center'> " . $byod->strPerson . "</div> </td>";
						
						// Display the computer name
						echo "<td><div align='center'> " . $byod->strUsername . " ";
						
						// Display the job description
						echo "</div></td> <td> <div align='center'>  ";
						echo $byod->strMAC . "</div> </td>";
						
						// Display the allocation date
						echo "<td><div align='center'> " . date("M y",strtotime($byod->dateAdded)) . " </div> </td>";
						
						// Display the model name and brand name
						$strBrand = explode(" ", $byod->strModel);
						echo " <td> <div align='center'> " . $byod->strModel . "<br><img src='images/logos/" . $strBrand[0]. ".png'</td>";
						
						// Display the age of the asset
						$start_date = new DateTime($byod->dateAdded);
						$end_date = new DateTime();
						$interval = $start_date->diff($end_date);
						echo "<td><div align='center'>" . $interval->format('%y Years') . "</div> </td>";

						echo "</tr>";
					}
			}
			else {echo "<p><div align='center'>No BYOD users found</p></div>";}
				?>
				</table>
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
include '/includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>
