<?php
//** Include Header **//
//include 'includes/header.php';
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
    				<p><h2>Add BYOD</h2></p>
				
                <form name="form1" method="post" action="showbyodstudent.php">
                  <table width="450" border="0" cellspacing="0" cellpadding="0">
                    <tr> </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Full Name</td>
                      <td><input name="name" type="text" id="textarea5" value="" size="40"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td><input name="username" type="text" id="username" value="" size="40"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Wireless MAC</td>
                      <td><input name="wireless" type="text" id="wireless" value="" size="40"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>

                    </tr>
                    <tr> 
                      <td>Model Type</td>
                      <td><font color="#666666">
                        <SELECT name="model" size="1" id="model">
						
						<?php
						$platforms = $db->get_results("SELECT * FROM platforms ORDER BY intID ASC");
						// Loop through the computer list
						foreach ($platforms as $platform)
						{
							echo "<option>" . $platform->strPlatform . "</option>";
						}
						?>
						
                        </SELECT>
                      </font></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Date Added</td>
                      <td>
                      <?php echo "<input name='dateadded' type='text' id='dateadded' value='" . date('Y-m-d H:i:s') . "' size='40'></td>" ?>
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
//** Include Footer **//
include 'includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>

