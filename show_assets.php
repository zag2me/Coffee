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
                <p>Welcome to Coffee - The simple ICT Support System</p><br>
				<p><strong>Asset List</strong></p>
				<?php
			
				// Delete asset if requested
				if ($_GET["delete"] > 0 AND $_SESSION['user'] != NULL)
				{
					$db->query("DELETE FROM assets WHERE intID =" . $_GET["delete"]);
				}

				// Create an array of all the tickets
				$assets = $db->get_results("SELECT * FROM assets ORDER BY intID ASC LIMIT 100");

				?>
				
				</p>
                        <p><a href="new_asset.php"><img src="images/icons/add-computer.png" width="64" height="64" border="0"></a> </p>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr bgcolor="#CCCCCC"> 
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Type</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">ID</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Name</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Computer Name</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Wireless MAC</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Allocation Date</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Model</font></strong></div></td>
							<td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Disk</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">OS</font></strong></div></td>                                                        
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Age</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Warranty</font></strong></div></td>
                            <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Serial Number</font></strong></div></td>
                          </tr>
					  
				<?php
				
				// Display each support tickets in a table
			if ($assets != NULL)
			{
				foreach ($assets as $asset)	
					{
						// Display the icon for the asset
						echo "<tr bgcolor='#F0F0F0'> <td> <div align='center'>";
						echo "<img src='images/assets/" . $asset->strDescription . ".jpg' border=0 width=60 height=60> </div> </td>";
						
						// Display the ID number and a delete icon
						echo "<td> <div align='center'> ";
						echo "<a name='" . $asset->intID . "'>" . $asset->intID;
						
						// Check if logged in and show delete feature
						if ($_SESSION['user'] != NULL) {echo " <a href='show_assets.php?delete=" . $asset->intID . "'>x</a>";}
						
						// Display the assets person
						echo "</div> </td><td><div align='center'> " . $asset->strPerson . "</div> </td>";
						
						// Display the computer name
						echo "<td><div align='center'> " . $asset->strComputerName . " ";
						
						// Display the job description
						echo "</div></td> <td> <div align='center'>  ";
						echo $asset->strMAC . "</div> </td>";
						
						// Display the allocation date
						echo "<td><div align='center'> " . date("M y",strtotime($asset->dateAdded)) . " </div> </td>";
						
						// Display the model number and brand name
						echo " <td> <div align='center'> " . $asset->strDescription;
											
						// Display the brand name logo
						echo "<br><img src='images/logos/" . $asset->strBrand . ".jpg' border=0></div> </td>  ";
						
						// Display the disk type
						echo "<td><div align='center'><img src='images/icons/" . $asset->strDisk . ".png' border=0> </div> </td>";
						
						// Display the os type
						echo "<td><div align='center'><img src='images/icons/" . $asset->strOS . ".png' border=0> </div> </td>";
						
						// Display the age of the asset
						$start_date = new DateTime($asset->dateAdded);
						$end_date = new DateTime();
						$interval = $start_date->diff($end_date);
						echo "<td><div align='center'>" . $interval->format('%y Years') . "</div> </td>";
						
						// Display if its in warranty
						echo "<td> <div align='center'>";
						if ($interval->format('%y') < 3)
						{
							echo "<img src='images/icons//Tick_32.png' border=0>";
						}
						else
						{
							echo "<img src='images/icons/Cross_32.png' border=0>";
						}
						
						// Display serial number
						echo "<td><div align='center'>" . $asset->strSerial . "</div> </td>";					
						
						echo "</tr>";
					}
			}
			else {echo "<p><div align='center'>No Assets found</p></div>";}
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
