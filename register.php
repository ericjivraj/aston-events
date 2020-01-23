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
      <h1><a href="index.html"><span>Aston</span>Events<br />
        <small>The Best University Events</small></a></h1>
    </div>   <!-- Logo End -->
    <div class="clr"></div>
    <div class="menu"> <!-- Menu Start -->
      <ul>
        <li><a href="index.html"><span>Home</span></a></li>
        <li><a href="allevents_details.php"><span>Events</span></a></li>
        <li><a href="register.php" class="active"><span>Register</span></a></li>
        <li><a href="login.php"><span>Login</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
      <section id="events-message" class="jumbotron">
        <div class="container">
          <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
        </div>
      </section>

      <section class="register">
        <h2 align="center">Become an Organiser</h2>
      <form id="form" name="form" method="POST" action="process_register.php" align="center"><img src="images/user.png" style="float:center;"> <br>
      <b>First Name: <p> </p>
      <input type="text" name="fname" placeholder="Example: Eric" required> <p> </p>
      <b>Last Name: <p> </p>
      <input type="text" name="lname" placeholder="Example: Jivraj" required> <p> </p>
      <b>Username: <p> </p>
      <input type="text" name="username" placeholder="Example: ericjivraj" required> <p> </p>
      Password: <p> </p>
      <input type="password" name="password" required> <p> </p>
      Confirm Password: <p> </p>
      <input type="password" name="password1" required> <p> </p>
      Phone: <p> </p>
      <input type="text" name="phone" placeholder="+447460733577" required> <p> </p>
      Email: <p> </p>
      <input type="email" name="email" placeholder="ericjivraj@gmail.com" required> <p> </p>
      <button type="submit">
      <img src="images/register1.jpg" width="180px"/>
      </button>
      </section>

    </main>

  </body>
  </html>
