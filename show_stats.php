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
				<p><h2>User Statistics</h2></p>
				<p><img src="images/icons/bar-chart-icon.png"><br></p>
				<?php

				$counttotal = 0;
				$tickets = $db->get_results("SELECT strRequesterName, COUNT( strRequesterName ) AS counttotal FROM tickets GROUP BY strRequesterName ORDER BY COUNT( strRequesterName ) DESC LIMIT 10");
				
				?>
				 </p>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr bgcolor="#CCCCCC"> 
                            <td><div align="center"><strong>Full Name</strong></div></td>
                            <td><div align="center"><strong>Jobs</strong></div></td>
                          </tr>
				
				<?php
				$counter1 = 0;
				if ($tickets != NULL)
				{
					foreach ($tickets as $ticket)	
					{
						echo " <tr bgcolor='#F0F0F0'> <td> <div align='center'> ";
						echo $ticket->strRequesterName . " </div> </td> <td> <div align='center'> ";
						echo $ticket->counttotal . " </div> </td> </tr>  ";
					}
				}
				else {echo "<p><div align='center'>No Jobs found</p></div>";}

				
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
//** Include Header **//
include '/includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>
