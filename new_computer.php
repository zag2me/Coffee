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
                <p><em><strong><font face="Arial, Helvetica, sans-serif">Add a computer</font></strong></em></p>
                <form name="form1" method="post" action="settings_computers.php">
                  <table width="572" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="122"><div align="right">Brand Name</div></td> 
                      <td width="15"><div align="right"></div></td>
                      <td width="328">                        <p><font color="#666666">
                          <input name="brand" type="text" id="brand" size="50">
                      </font></p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                     <tr>
                      <td><div align="right">Model Name</div></td> 
                      <td width="15"><div align="right"></div></td>
                      <td><input name="model" type="text" id="model" size="50"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
					<tr>
                      <td><div align="right">Computer Type</div></td> 
                      <td width="15"><div align="right"></div></td>
                      <td>
					  <SELECT name="type" id="type">
                          <option>Desktop</option>
                          <option>Tablet</option>
                          <option>Laptop</option>
                          <option>Phone</option>
                          <option>Server</option>
                        </SELECT>
					  </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><div align="right">Cost?</div></td>
                      <td><div align="right"></div></td>
                      <td><label>
                          <input name="cost" type="text" id="cost" size="4">
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
