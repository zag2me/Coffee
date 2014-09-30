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
        <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td align="center">
                <p><em><strong><font face="Arial, Helvetica, sans-serif">Add Users</font></strong></em></p>
                <form name="form1" method="post" action="settings_users.php">
                  <table width="572" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="122"><div align="right">Full Name</div></td> 
                      <td width="15"><div align="right"></div></td>
                      <td width="328">                        <p><font color="#666666">
                          <input name="name" type="text" id="fullname" size="50">
                      </font></p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><div align="right">Email</div></td> 
                      <td width="15"><div align="right"></div></td>
                      <td><input name="email" type="text" id="email" size="50"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><div align="right">Admin?</div></td>
                      <td><div align="right"></div></td>
                      <td><label>
                          <input name="admin" type="checkbox" id="admin">
                      </label></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td> 
                      <td>&nbsp;</td>
                      <td>                        <font color="#666666">
                        <font color="#666666">
                        <input name="comp" type="hidden" id="comp3" value="<%=Date%>">
                        </font> </font></td>
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
//** Include Footer**//
include '/includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>
