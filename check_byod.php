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
    				<p><h2>Add BYOD</h2></p>
				
                <form name="form1" method="post" action="show_byod.php">
                  <table width="450" border="0" cellspacing="0" cellpadding="0">
                    <tr> </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>MAC address to check</td>
                      <td><input name="checkmac" type="text" id="checkmac" value="" size="40"></td>
                    </tr>
                  </table>
                  <p><br><br>
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

