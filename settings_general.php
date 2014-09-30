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
            <p><h2>General Settings</h2></p>
				<p><br>
				<?php
					// Grab the settings		
					$settings = $db->get_row("SELECT * FROM Settings");
				?>
				
				 <form name="form1" method="post" action="submit_settings.php">
                  <table width="450" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td>Gmail Username</td>
                      <td>
					      <?php echo "<input name='smtp_user' type='text' id='smtp_user' value = '" . $settings->strSmtpUser . "'>" ?>
			           <p></td>
                    </tr>
                    <tr> 
                      <td>Gmail Password</td>
                      <td>
					      <?php echo "<input name='smtp_password' type='password' id='smtp_password' value = ''>"?>
				        <p>
                        </td>
                    </tr>
                    
                    <tr> 
                      <td>&nbsp;</td>
                      <td>                        <font color="#666666">
                        <input name="prog" type="hidden" id="prog" value="0">
                        <input name="last" type="hidden" id="last2" value="None">
                        <font color="#666666">
                        <input name="comp" type="hidden" id="comp3" value="<%=Date?>">
                        </font> </font></td>
                    </tr>
                  </table>
                  <p>
                    <input type="submit" name="Submit" value="Submit">
                  </p>
                </form>
				
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
