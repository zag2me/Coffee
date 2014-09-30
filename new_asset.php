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
				    <p><h2>Add asset</h2></p>
				
                <form name="form1" method="post" action="submit_asset.php">
                  <table width="450" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="122"><img src="images/icons/Computer-icon.png" width="170" height="145"></td>
                      <td width="328">                        <font color="#666666">
                        <SELECT name=type size="6" id="type" onChange="return dept_onchange(frmSelect)" LANGUAGE=javascript>
                          <option value="laptop" selected>Laptop</option>
                          <option value="desktop">Desktop</option>
                          <option value="netbook">Netbook</option>
                          <option value="tablet">Tablet</option>
                          <option value="phone">Phone</option>
                          <option value="server">Server</option>
                        </SELECT>
                       
					  <br> 
					    </font></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Department</td>
                      <td><font color="#666666">
                        <SELECT name=department id="department" onChange="return dept_onchange(frmSelect)" LANGUAGE=javascript>
                          <option>Teacher</option>
                          <option>Admin Staff</option>
                          <option>Chemistry</option>
                          <option>Physics</option>
                          <option>Biology</option>
                          <option>Technology</option>
                          <option>Art</option>
                          <option>Music</option>
                          <option>Geography</option>
                          <option>MFL</option>
                          <option>English</option>
                          <option>Classics</option>
                          <option>PE</option>
                          <option>Library</option>
                          <option>Boarding</option>
                          <option>ICT</option>
                          <option>Maths</option>
                        </SELECT>
                      </font></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Disk</td>
                      <td><font color="#666666">
                        <select name=disk id="department4" onChange="return dept_onchange(frmSelect)" language=javascript>
                          <option value="ssd">SSD Drive</option>
                          <option value="harddisk">Hard Disk Drive</option>
                        </select>
                      </font></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Operating System</td>
                      <td><font color="#666666">
                        <select name=os id="department3" onChange="return dept_onchange(frmSelect)" language=javascript>
                          <option value="win7">Windows 7</option>
                          <option value="winxp">Windows XP</option>
                          <option value="linux">Linux</option>
                          <option value="win2008r2">Windows 2008 R2 Server</option>
                          <option value="win2003r2">Windows 2003 R2 Server</option>
                          <option value="win2008">Windows 2008 Server</option>
                          <option value="ios">Apple iOS</option>
                        </select>
                      </font></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>User Assigned</td>
                      <td><input name="name" type="text" id="textarea5" value="" size="40"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Computer Name</td>
                      <td><input name="compname" type="text" id="compname" value="" size="40"></td>
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
                      <td>Brand name</td>
                      <td><font color="#666666">
                        <SELECT name=brand size="1" id="brand">
						
						<?php
						// Get a list of the computers
						$computers = $db->get_results("SELECT DISTINCT strComputerBrand FROM computers ORDER BY strComputerBrand ASC");
						
						// Loop through the computer list
						foreach ($computers as $computer)
						{
							echo "<option>" . $computer->strComputerBrand . "</option>";
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
                      <td>Model Number</td>
                      <td><font color="#666666">
                        <SELECT name=desc size="1" id="desc">
						
						<?php
						$computers = $db->get_results("SELECT * FROM computers ORDER BY strComputerBrand ASC");
						// Loop through the computer list
						foreach ($computers as $computer)
						{
							echo "<option>" . $computer->strComputerModel . "</option>";
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
                      <td>Date Purchased</td>
                      <td>
                      <?php echo "<input name='datepurchased' type='text' id='textarea3' value='" . date('Y-m-d H:i:s') . "' size='40'></td>" ?>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Serial  Number</td>
                      <td><input name="serialnumber" type="text" id="textarea4" value="" size="40"></td>
                    </tr>
                    <tr> 
                      <td>&nbsp;</td>
                      <td>                        <font color="#666666">
                        <input name="prog" type="hidden" id="prog" value="0">
                        <input name="last" type="hidden" id="last2" value="None">
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
//** Include Footer **//
include '/includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>

