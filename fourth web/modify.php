<?php
  $conn = mysqli_connect("localhost", "root", "111111", "opentutorials3");
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($conn, $sql);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href='index.php?id={$row['id']}'>{$escaped_title}</a></li>";
  }
  $article = array(
    'title'=>'Welcome',
    'description'=>'Hello, web'
  );
  $create_button = "<a href='create.php'>CREATE</a>";
  $modify_button = "";
  $delete_button = "";
  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title']=htmlspecialchars($row['title']);
    $article['description']=htmlspecialchars($row['description']);
  }
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
        <form action="modify_process.php" method="post">
          <input type="hidden" name="id" value="<?=$_GET['id']?>">
          <p>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="input title" value="<?=$article['title']?>">
          </p>
          <p>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="8" cols="80" placeholder="input description"><?=$article['description']?></textarea>
          </p>
          <input type="submit" name="" value="save">
        </form>
      </article>
    </div>
  </body>
</html>
