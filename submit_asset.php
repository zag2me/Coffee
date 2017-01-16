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
				<?php
				
				// Update the database if data sent
 				if (isset($_POST["desc"]) AND isset($_POST["name"]) AND isset($_POST["compname"]) AND isset($_POST["serialnumber"]))
				{
					// Insert new asset into database
					$db->query("INSERT INTO assets (strPerson, strType, strDescription, strBrand, strDisk, strOS, strComputerName, strMAC, strDepartment, strSerial, dateAdded) VALUES ('" . $_POST["name"] . "', '" . $_POST["type"] . "', '" . $_POST["desc"] . "', '" . $_POST["brand"] . "', '" . $_POST["disk"] . "', '" . $_POST["os"] . "', '" . $_POST["compname"] . "', '" . $_POST["wireless"] . "', '" . $_POST["department"] . "', '" . $_POST["serialnumber"] . "', '" . $_POST["datepurchased"] . "')");
					echo "<div align='center'>New Asset Added....</div>";
				}
				else {echo "Missing Data, please check form";}
				
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
</body>
</html>
