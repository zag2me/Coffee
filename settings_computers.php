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
            <td valign="top" align="center"> <p><br>
                        <font face="Arial, Helvetica, sans-serif"><strong><em>Manage Computers</em></strong></font></p>
                      <div align="center"> 
                        <p> </p>
                        <p><a href="new_computer.php"><img src="images/icons/add-computer.png" border="0"><br></font><font size="2" face="Arial, Helvetica, sans-serif">Add</font></a>
                        </p>
                        
						<?php
						// Check if someone is trying to delete a user
						if ($_GET["id"] > 0 AND $_SESSION['user'] != NULL)
						{
							// Delete the computer
							$db->query("DELETE FROM computers WHERE intID=" . $_GET["id"]);
						}
						
						// Check someone has come from the add user form
						if ($_POST["brand"] != NULL AND $_POST["model"] != NULL AND $_POST["type"] != NULL)
						{
							// Insert new user into database
							$db->query("INSERT INTO Computers (strComputerBrand, strComputerModel, strComputerType, strComputerCost) VALUES ('" . $_POST["brand"] . "', '" . addslashes($_POST["model"]) . "', '" . $_POST["type"] . "', '" . $_POST["cost"] . "')");
						}
				
						// Select all the computers from the database
						$computers = $db->get_results("SELECT * FROM computers ORDER BY strComputerBrand ASC");
						?>
						
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr bgcolor="#CCCCCC"> 
                            <td><div align="center"><b>ID</b></div></td>
                            <td><div align="center"><strong>Brand Name</strong></div></td>
                            <td><div align="center"><strong>Logo</strong></div></td>
							<td><div align="center"><strong>Model Number</strong></div></td>
							<td><div align="center"><strong>Cost</strong></div></td>
                            <td><div align="center"><strong>Actions</strong></div></td>
                          </tr>
						
						<?php
												
						// Loop though all the computers
						if ($computers != NULL) 
						{
							foreach ($computers as $computer)
							{
								echo "<tr bgcolor='#F0F0F0'>";
								echo "<td> <div align='center'>" . $computer->intID . " </div> </td>";
								echo "<td> <div align='center'>" . $computer->strComputerBrand . " </div> </td> ";
								echo "<td> <div align='center'><Img src='images/logos/" . $computer->strComputerBrand . ".jpg'</font> </div> </td>";
								echo "<td> <div align='center'>" . $computer->strComputerModel . " </div> </td> ";
								echo "<td> <div align='center'>£" . $computer->strComputerCost . " </div> </td> ";
								echo " <td> <div align='center'><a href='settings_computers.php?id=" . $computer->intID . "'><center><img src='images/icons/deleteicon2.gif' border='0'></a></center> </div></td> <td> <div align='center'> ";
								echo " </div> </td> </tr>";
							}
						}
						else {echo "<p><div align='center'>No Computers found</p></div>";}
						
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
include '/includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>
