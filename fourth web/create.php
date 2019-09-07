<?php
  $conn = mysqli_connect("localhost", "root", "111111", "opentutorials3");
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($conn, $sql);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href='index.php?id={$row['id']}'>{$escaped_title}</a></li>";
  }
  $sql = "SELECT * FROM author";
  $result = mysqli_query($conn, $sql);
  $select_form = '<select name="author_id">';
  while($row = mysqli_fetch_array($result)){
    $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
  }
  $select_form .= '</select>';
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
          <?=$list?>
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
          <?=$select_form?>
          <input type="submit" name="" value="save">
        </form>
      </article>
    </div>
  </body>
</html>
