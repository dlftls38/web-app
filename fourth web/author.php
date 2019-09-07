<?php
  $conn = mysqli_connect("localhost", "root", "111111", "opentutorials3");
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
      <p><a href="index.php">topic</a></p>
      <input type="button" value="night" onclick="nightDayHandler(this)">
    </header>
    <table border="1">
      <tr>
        <td>id</td><td>name</td><td>profile</td><td></td><td></td>
        <?php
          $sql = "SELECT * FROM author";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result)){
            $filtered = array(
              'id'=>htmlspecialchars($row['id']),
              'name'=>htmlspecialchars($row['name']),
              'profile'=>htmlspecialchars($row['profile'])
            );
            ?>
            <tr>
              <td><?=$filtered['id']?></td>
              <td><?=$filtered['name']?></td>
              <td><?=$filtered['profile']?></td>
              <td><a href="author.php?id=<?=$filtered['id']?>">update</a></td>
              <td>
                <form action="delete_author_process.php" method="post" onsubmit="if(confirm('sure?')==false){return false;}">
                  <input type="hidden" name="id" value="<?=$filtered['id']?>">
                  <input type="submit" value="delete">
                </form>
              </td>
            </tr>
            <?php
          }
        ?>
      </tr>
    </table>
    <?php
      $escaped = array(
        'name'=>'',
        'profile'=>''
      );
      $label_submit = 'Create author';
      $form_action = "create_author_process.php";
      $form_id = '';
      if(isset($_GET['id'])){
        $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
        settype($filtered_id, 'integer');
        $sql = "SELECT * FROM author WHERE id = {$filtered_id}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $escaped['name'] = htmlspecialchars($row['name']);
        $escaped['profile'] = htmlspecialchars($row['profile']);
        $label_submit = 'Update author';
        $form_action = "update_author_process.php";
        $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
      }
    ?>
    <form action="<?=$form_action?>" method="post">
      <?=$form_id?>
      <p><input type="text" name="name" placeholder="name" value="<?=$escaped['name']?>"></p>
      <p><textarea name="profile" rows="8" cols="80" placeholder="profile"><?=$escaped['profile']?></textarea></p>
      <p><input type="submit" value="<?=$label_submit?>"></p>
    </form>
  </body>
</html>
