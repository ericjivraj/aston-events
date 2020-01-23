<?php
include("session.php");
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Aston Events</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/stylesheet.css" />
  </head>
  <body>
    <div class="logo"> <!-- Logo Start -->
      <h1><a href="index1.php"><span>Aston</span>Events<br />
        <small>The Best University Events</small></a></h1>
    </div>   <!-- Logo End -->
    <div class="clr"></div>
    <div class="menu"> <!-- Menu Start -->
      <ul>
				<li><a href="index1.php"><span>Home</span></a></li>
				<li><a href="view.php"><span>View</span></a></li>
        <li><a href="change.php" class="active"><span>Change</span></a></li>
        <li><a href="remove.php"><span>Remove</span></a></li>
        <li><a href="logout.php"><span>Log Out</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
        <section id="join-up-message" class="jumbotron">
          <div class="container">
            <h2>You are an Admin, Welcome!</h2>
          </div>
        </section>
        <h2>Update Organiser Information</h2>
  		<form id="form_username" name="form_username" method="POST" action="process_update_org.php" Align="Left"> </form>
  				<?php
  				$sql='SELECT * FROM organiser ORDER BY username ASC';
  				$check=mysqli_query($connect, $sql);
  				if($check) {
  				echo ('<table height="65" width="600px" align="Left" >');
  				echo('<tr><width="600px"><h2>Select an Organiser ID to Update its Information:</h2></tr><br />');
  				echo('<tr>  <td valign="middle" width="100px" align="center"><h3>Organiser ID</h3></td>
  							<td valign="middle" width="200px" align="center"><h3>Username</h3></td>
  							<td valign="middle" width="300px" align="center"><h3>Email</h3></td>
  				</tr><p>');

  				while ($show=mysqli_fetch_array($check)) {
  					$orgid=$show["org_id"];
  					$username=$show["username"];
  					$email=$show["email"];
						$forename=$show['fname'];
						$surname=$show['lname'];
						$phone=$show['phone'];

  				echo ("<tr> <td valign='middle' align=\"center\"><a href=\"process_update_org.php?org_id=$orgid&username=$username&email=$email&fname=$forename&lname=$surname&phone=$phone\">$orgid</a></td>
  							<td valign='middle' align=\"center\">$username</td>
  							<td valign='middle' align=\"center\">$email</td>"); }
  				echo ("</table><br />"); }
  				else { echo ("Database does not have records."); }
  				mysqli_free_result($check);
  				?>

    </main>

  </body>
  </html>
