<?php
//** Include Header **//
include 'includes/header.php';
include 'includes/functions.php';
include "includes/ez_sql_core.php";
include "includes/ez_sql_mysqli.php";
include "includes/db_connection.php";
require 'includes/class.phpmailer.php';
require 'includes/class.smtp.php';
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
				<p><h2>Support Tickets</h2></p>
				<p><a href="new_job.php"><img src="images/icons/add-ticket.png" width="64" height="60" border="0"></a><br></p>
				<?php
				
				// Update Job from Open to Closed and 100% progress
				if (isset($_GET["open_job"]) AND $_GET["open_job"] == 1 AND isset($_GET["id"]) AND isset($_SESSION['user']))
				{
					// Update the ticket
					$db->query("UPDATE tickets SET intProgress = 100, intOpenJob = 0, strUserComplete = '" . $_SESSION['user'] . "' WHERE intID = " . $_GET["id"]);
					
					// Grab the ticket details
					$completeJob = $db->get_row("SELECT * FROM tickets WHERE intID = " . $_GET["id"]);
					
					// Grab the email settings
					$settingsEmail = $db->get_row("SELECT * FROM settings WHERE intID = 1");

					// Send a completion email
					$mail = new PHPMailer;
					$mail->isSMTP();                                        // Set mailer to use SMTP
					$mail->SMTPDebug = 0;                                   // Set mailer to show debug
					$mail->Host = $settingsEmail->strSmtpServer;            // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                                 // Enable SMTP authentication
					$mail->Username = $settingsEmail->strSmtpUser;          // SMTP username
					$mail->Password = $settingsEmail->strSmtpPassword;      // SMTP password
					$mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 465;              // TCP port to connect to
					$mail->From = $settingsEmail->strSmtpEmail;				// From email
					$mail->FromName = 'ICT Support';						// From name
					$mail->addAddress($completeJob->strRequesterEmail);     // Add a recipient
					$mail->isHTML(true);                                    // Set email format to HTML
					$mail->Subject = 'ICT Support Request Complete';		// Email subject
					$mail->Body    .= '<font face="Arial, Helvetica, sans-serif" color="#0000A0"><strong>ICT Support</strong></font><br>';
					$mail->Body    .= '<font face="Arial, Helvetica, sans-serif" color="#504A4B"><p>IMPORTANT: This is an automated Email, please do not respond';
					$mail->Body    .= '<p> Your ICT Job has been Updated... <br><br> Job: <b>'. $completeJob->strTicketDescription .'</b>';
					$mail->Body    .= '<br> Status: </font><b><font face="Arial, Helvetica, sans-serif" color=#008000>COMPLETE</b></font>';

					// Check to see if the mail was sent
					if(!$mail->send()) 
					{
    					echo 'Message could not be sent.';
    					echo 'Mailer Error: ' . $mail->ErrorInfo;
					} 
					else 
					{
    					echo 'Email message has been sent';
					}

				}
	
				// Update Job from Closed to Open and 75% progress
				if (isset($_GET["open_job"]) AND $_GET["open_job"] == 2 AND isset($_GET["id"]) AND isset($_SESSION['user']))
				{
					$db->query("UPDATE tickets SET intProgress = 75, intOpenJob = 1 WHERE intID = " . $_GET["id"]);
				}
				
				// Update the Last action and date
				if (isset($_POST["id"]) AND $_SESSION['user'] != NULL)
				{
					// Update the DB
					$db->query("UPDATE tickets SET strLastAction = '" . addslashes($_POST["action"]) . "' WHERE intID =" . $_POST["id"]);
					$db->query("UPDATE tickets SET dateLastAction = NOW() WHERE intID =" . $_POST["id"]);
				}
				
				// Update the progress percentage of a ticket
				if (isset($_GET["percent"]) AND $_GET["percent"] == 1 AND isset($_GET["id"]) AND isset($_SESSION['user'])) { $db->query("UPDATE tickets SET intProgress = 25 WHERE intID =" . $_GET["id"]);}
				else if (isset($_GET["percent"]) AND $_GET["percent"] == 25 AND isset($_GET["id"]) AND isset($_SESSION['user'])) { $db->query("UPDATE tickets SET intProgress = 50 WHERE intID =" . $_GET["id"]);}
				else if (isset($_GET["percent"]) AND $_GET["percent"] == 50 AND isset($_GET["id"]) AND isset($_SESSION['user'])) { $db->query("UPDATE tickets SET intProgress = 75 WHERE intID =" . $_GET["id"]);}
				else if (isset($_GET["percent"]) AND $_GET["percent"] == 75 AND isset($_GET["id"]) AND isset($_SESSION['user'])) { $db->query("UPDATE tickets SET intProgress = 100 WHERE intID =" . $_GET["id"]);}
				else if (isset($_GET["percent"]) AND $_GET["percent"] == 100 AND isset($_GET["id"]) AND isset($_SESSION['user'])) { $db->query("UPDATE tickets SET intProgress = 0 WHERE intID =" . $_GET["id"]);}
				
				// Delete job if requested
				if (isset($_GET["delete"]) AND $_GET["delete"] > 0 AND isset($_SESSION['user']))
				{
					$db->query("DELETE FROM tickets WHERE intID =" . $_GET["delete"]);
				}

				
				// Create an array of all the tickets
				$tickets = $db->get_results("SELECT * FROM tickets ORDER BY intID DESC LIMIT 100");
				
				// Set the show Open variable
				$showopen = 0;
				
				// Check if user only wants to see open jobs and set SQL
				if (isset($_GET["show_open"]) AND $_GET["show_open"] == 1)
				{
					// Only select the Open Jobs
					$tickets = $db->get_results("SELECT * FROM tickets WHERE intOpenJob = 1 ORDER BY intID DESC LIMIT 100");
					$showopen = 1;
				}
				
				?>
				
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
                          <tr bgcolor="#CCCCCC"> 
                            <td><div align="center"><b>Job ID</b></div></td>
                            <td><div align="center" style="width:100px"><b>Name</b></div></td>
                            <td><div align="center" style="width:50px"><b>Date</b></div></td>
                            <td><div align="center"><b>Job Description</b></div></td>
                            <td><div align="center"><b>Progress</b></div></td>
                            <td><div align="center"><b>Status</b></div></td>
                            <td><div align="center"><b>Action</b></div></td>
                          </tr>
					  
				<?php
				
				// Display each support tickets in a table
			if ($tickets != NULL)
			{
				foreach ($tickets as $ticket)	
					{
						// Display the ID number and a delete icon
						echo "<tr bgcolor='#F0F0F0'> <td> <div align='center'> ";
						echo "<a name='" . $ticket->intID . "'>" . $ticket->intID;
						
						// Check if logged in and show delete feature
						if ($_SESSION['user'] != NULL) {echo " <a href='show_jobs.php?delete=" . $ticket->intID . "'>x</a>";}
						
						// Display the requesters name
						echo "</div> </td><td><div align='center'> " . $ticket->strRequesterName . "</div> </td>";
						
						// Display the date and check if its todayand show icon
						echo "<td><div align='center'> " . date("d M",strtotime($ticket->dateSubmitted)) . " ";
						if (isToday($ticket->dateSubmitted))
						{
							echo "<img src='images/icons/today.gif'>";
						}
						
						// Display the job description
						echo "</div></td> <td> <div align='center'>  ";
						echo $ticket->strTicketDescription . "</div> </td>";
						
						// Display the Progress
						echo "<td> <div align='center'> ";
						if ($ticket->intProgress == 0)
						{
							echo "<a href='show_jobs.php?id=" . $ticket->intID . "&percent=1&show_open=" . $showopen . "#" . $ticket->intID . "'> <img src='images/percent/small0percent.png' border=0> </a>";
						}
						
						if ($ticket->intProgress == 25)
						{
							echo "<a href='show_jobs.php?id=" . $ticket->intID . "&percent=25&show_open=" . $showopen . "#" . $ticket->intID . "'> <img src='images/percent/small25percent.png' border=0> </a>";
						}
						
						if ($ticket->intProgress == 50) 
						{
							echo "<a href='show_jobs.php?id=" . $ticket->intID . "&percent=50&show_open=" . $showopen . "#" . $ticket->intID . "'> <img src='images/percent/small50percent.png' border=0> </a>";
						}
						
						if ($ticket->intProgress == 75) 
						{
							echo "<a href='show_jobs.php?id=" . $ticket->intID . "&percent=75&show_open=" . $showopen . "#" . $ticket->intID . "'> <img src='images/percent/small75percent.png' border=0> </a>";
						}
						
						if ($ticket->intProgress == 100) 
						{
							echo" <a href='show_jobs.php?id=" . $ticket->intID . "&percent=100&show_open=" . $showopen . "#" . $ticket->intID . "'> <img src='images/percent/small100percent.png' border=0> </a>";
						}
						
						// Display icon if job is open
						echo "</div> </td> <td> <div align='center'> ";
						if ($ticket->intOpenJob == 1)
						{
							echo "<a href='show_jobs.php?id=" . $ticket->intID . "&open_job=1&show_open=" . $showopen  . "&emailadd=" . $ticket->strRequesterName . "&desc=" . $ticket->strTicketDescription . "#" . $ticket->intID . "'> <img src='images/icons/job_open.png' border=0></a>";
						}
						else
						{
							echo "<a href='show_jobs.php?id=" . $ticket->intID . "&open_job=2&show_open=" . $showopen  . "#" . $ticket->intID . "'> <img src='images/icons/job_locked.png' border=0></a>";
						}
						
						// Display the last comment
						echo "</div> </td> <td> <div align='center'> " . $ticket->strLastAction;
						
						// Check if logged in and show update latest feature
						if ($_SESSION['user'] != NULL) {echo "<a href='edit_job.php?id=" . $ticket->intID . " '><img src='images/icons/edit.png' border=0> </a>";}
						
						// Check if the last action was today and show an icon
						if (isToday($ticket->dateLastAction))
						{
							echo "<br><img src='images/icons/last_today.gif'>";
						}
						echo "</div> </td> <td> </tr>";
					}
			}
			else {echo "<p><div align='center'>No tickets found</p></div>";}
				?>
				</table>
				</p>
            </td>
          </tr>
        </table>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="2">

<?php

include 'includes/footer.php';
?>

	<p><br><p><br><p><p><br><p><br><p>
	</td>
  </tr>
</table>
</body>
</html>
