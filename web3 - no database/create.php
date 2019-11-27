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
        <form action="create_process.php" method="post">
          <p>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="input title">
          </p>
          <p>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="8" cols="80" placeholder="input description"></textarea>
          </p>
          <input type="submit" name="" value="save">
        </form>
      </article>
    </div>
  </body>
</html>
