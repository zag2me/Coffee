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
                <p><em><strong><font face="Arial, Helvetica, sans-serif"><p><br>Add ICT  support request</font></strong></em></p>
                <form name="form1" method="post" action="submit_job.php">
                  <table width="450" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                    <td width="122"><img src="images/icons/User-icon.png" width="128" height="128"></td>
                    <td width="328">                        
					<font color="#666666">
                    <SELECT name=name size="10" onChange="return dept_onchange(frmSelect)" LANGUAGE=javascript>
					<?php
	
					// Grab a list of users
					$users = $db->get_results("SELECT * FROM users ORDER BY strName ASC");
	
					// Loop through the users and display their names in the select box	
					foreach ($users as $user)	
					{
						echo "<OPTION VALUE = '" . $user->strEmail . "'>";
						echo $user->strName . "</Option>";
					}
	
					?>
                    </SELECT>
					<br> 
					</font></td>
                    </tr>
                    <tr> 
                    <td>Job Description</td>
                    <td><textarea name="desc" cols="40" rows="4" id="textarea2"></textarea></td>
                    </tr>
                  </table>
                  <p>
                    <input type="submit" name="Submit" value="Submit">
                  </p>
                </form>
                <p><em><strong><font face="Arial, Helvetica, sans-serif"></font></strong></em></p>
              </div></td>
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
