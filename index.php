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
				<h2>Welcome to Coffee - The simple ICT Support System</h2>
				</strong></p><br>
				<p><br>
				<?php
							
				// Create an array of all the tickets
				$total_jobs_all = $db->get_var("SELECT Count(*) FROM tickets");
				$total_jobs_open = $db->get_var("SELECT Count(*) FROM tickets WHERE intOpenJob = 1");
				
				// Draw the website logo and start the table
				echo "<img src='images/icons/give_computer.png'><br><p><table width='400' border='0'><tr>";
				
				// Write the total and open jobs to screen  
				echo "<tr><td><center><h2><img src='images/icons/spanner.png'><br><b><a href='show_jobs.php?show_open=0'>Total Jobs:</a>  </b>" . $total_jobs_all . "</h2></center><br></td>";
				echo "<td><center><h2><img src='images/icons/job_open.png'><br><b><a href='show_jobs.php?show_open=1'>Open Jobs:</a> </b>" . $total_jobs_open . "</h2></center><br></td></tr>";
				echo "</table>";
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
