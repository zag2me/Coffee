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
                <p>
				<h2>Welcome to Coffee - The simple ICT Support System</h2>
				</strong></p><br>
				<p><br>
				<?php
							
				// Create an array of all the tickets
				$total_jobs_all = $db->get_var("SELECT Count(*) FROM tickets");
				$total_jobs_open = $db->get_var("SELECT Count(*) FROM tickets WHERE intOpenJob = 1");
				$admin_users = $db->get_results("SELECT * FROM users WHERE strAdmin = 'ON'");
				
				// Draw the website logo and start the table
				echo "<img src='images/icons/give_computer.png'>";
				echo "<br><p>";
				
				// Write the total and open jobs to screen
				echo "<table width='400' border='0'><tr>";
				echo "<tr><td><center><img src='images/icons/spanner.png'><br><b><a href='show_jobs.php?show_open=0'>Total Jobs:</a>  </b>" . number_format($total_jobs_all) . "</center><br></td>";
				echo "<td><center><img src='images/icons/job_open.png'><br><b><a href='show_jobs.php?show_open=1'>Open Jobs:</a> </b>" . number_format($total_jobs_open) . "</center><br></td></tr>";
				echo "</table>";

				// Write the total jobs for each ICT technician
				echo "<table width='400' border='0'><tr>";
				if ($admin_users != NULL) 
						{
							foreach ($admin_users as $admin_user)
							{
								$total_jobs_admin = $db->get_var("SELECT Count(*) FROM tickets WHERE strUserComplete = '" . $admin_user->strEmail . "'");
								$total_jobs_admin_year = $db->get_var("SELECT count(*) FROM tickets WHERE strUserComplete = '" . $admin_user->strEmail . "' AND year(dateSubmitted) = " . date("Y") . "");
								$total_jobs_admin_last_year = $db->get_var("SELECT count(*) FROM tickets WHERE strUserComplete = '" . $admin_user->strEmail . "' AND year(dateSubmitted) = " . date("Y",strtotime("-1 year")) . "");
								$total_jobs_admin_2_years_ago = $db->get_var("SELECT count(*) FROM tickets WHERE strUserComplete = '" . $admin_user->strEmail . "' AND year(dateSubmitted) = " . date("Y",strtotime("-2 year")) . "");
								$total_jobs_admin_3_years_ago = $db->get_var("SELECT count(*) FROM tickets WHERE strUserComplete = '" . $admin_user->strEmail . "' AND year(dateSubmitted) = " . date("Y",strtotime("-3 year")) . "");
								$total_jobs_admin_4_years_ago = $db->get_var("SELECT count(*) FROM tickets WHERE strUserComplete = '" . $admin_user->strEmail . "' AND year(dateSubmitted) = " . date("Y",strtotime("-4 year")) . "");
								echo "<td><br><center><img src='images/avatars/" . $admin_user->strName . ".jpg'><br><br><a href='show_jobs.php?show_open=0'></a> <b>" . $admin_user->strName . ":</b> " . number_format($total_jobs_admin) . "<br><br>";
								echo "<b>This Year (" . date("Y") . "):</b> " . number_format($total_jobs_admin_year) . "<br>";
								echo "<b>Last Year (" . date("Y",strtotime("-1 year")) . "):</b> " . number_format($total_jobs_admin_last_year) . "<br>";
								echo "<b>Previous Year (" . date("Y",strtotime("-2 year")) . "):</b> " . number_format($total_jobs_admin_2_years_ago) . "<br>";
								echo "<b>Previous Year (" . date("Y",strtotime("-3 year")) . "):</b> " . number_format($total_jobs_admin_3_years_ago) . "<br>";
								echo "<b>Previous Year (" . date("Y",strtotime("-4 year")) . "):</b> " . number_format($total_jobs_admin_4_years_ago) . "<br>";
								echo "</center></td>";
							}
						}
				echo "</tr></table>";
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
