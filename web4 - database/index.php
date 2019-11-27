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
  $author = '';
  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title']=htmlspecialchars($row['title']);
    $article['description']=htmlspecialchars($row['description']);
    $article['name']=htmlspecialchars($row['name']);

    $modify_button = "<a href='modify.php?id={$_GET['id']}'>MODIFY</a>";
    $delete_button = '<form action="delete_process.php" method="post">
                        <input type="hidden" name="id" value="'.$_GET['id'].'">
                        <input type="submit" value="delete">
                      </form>';
    $author = "<p>by {$article['name']}</p>";
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
      <a href="author.php">author</a>
      <input type="button" value="night" onclick="nightDayHandler(this)">
    </header>
    <div id="grid">
      <nav>
        <ol>
          <?=$list?>
        </ol>
      </nav>
      <article>
        <p>
          <?=$create_button?>
          <?=$modify_button?>
          <?=$delete_button?>
        </p>
        <h2>
          <?=$article['title']?>
        </h2>
        <?=$article['description']?>
        <?=$author?>
      </article>
    </div>
  </body>
</html>
