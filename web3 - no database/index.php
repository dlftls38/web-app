<?php
require('lib/print.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>WEB1 - Welcome</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="colors.js"></script>
  </head>
  <body>
    <header class="yo1">
      <h1><a href="index.php">WEB</a></h1>
      <input type="button" value="night" onclick="nightDayHandler(this)">
    </header>
    <div id="grid">
      <nav>
        <ol>
          <?php
            print_list();
          ?>
        </ol>
      </nav>
      <article>
        <h2>
          <?php
            print_title();
          ?>
        </h2>
        <?php
          print_description();
        ?>
        <?php
          if (!isset($_GET['id'])) {
        ?>
        <p>
          <input type="button" name="" value="CREATE" onclick="location.href='create.php'">
          <input type="button" name="" value="MODIFY" onclick="location.href='modify.php'">
          <input type="button" name="" value="DELETE" onclick="location.href='delete.php'">
        </p>
        <?php
          }
        ?>
      </article>
    </div>
  </body>
</html>
