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
        <table width="600" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td align="center">
                <br>
				<p><br>
				<?php
				
				// Grab the ticket data
				$job = $db->get_row("SELECT * FROM tickets WHERE intID = " . $_GET["id"]);
				
				// Show a form to update the last action
  				echo "<form name='form1' method='post' action='show_jobs.php'>";
				echo "<strong>ID <BR></strong>";
                echo "<input type='text' name='id' size='5' value='" . $job->intID . "'><BR><br>";
				echo "<strong>Last action <BR></strong>";
                echo "<input type='text' name='action' size='70' value='" . $job->strLastAction . "'><BR>";
				echo "<BR> <input type='submit' name='Submit' value='Update!'>";
				echo "</form>";
				
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
