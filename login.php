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
        <li><a href="register.php"><span>Register</span></a></li>
        <li><a href="login.php" class="active"><span>Login</span></a></li>
      </ul>
    </div> <!-- Menu End -->
    <main>
      <section id="events-message" class="jumbotron">
        <div class="container">
          <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
        </div>
      </section>

      <section class="login">
        <h2 align="center">Login</h2>
        <form id="form" name="form" method="POST" action="process_login.php" align="center">
        <td align="left" valign="top" > <br> <br>
        Username:<p> <p>
        <input type="text" name="username" id="name" required /></td></tr> <p>
        <tr><td align="left" valign="top" >
        Password:<p> <p>
        <input type="password" name="password" id="password" required /></td></tr> <p>
        <tr><td>
        <button type="submit">
        <img src="images/login.jpg" width="180px"/>
        </button>
        </form>
      </section>

    </main>

  </body>
  </html>
