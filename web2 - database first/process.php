<?php
  require_once('conn.php');
  $author = mysqli_real_escape_String($conn,$_POST['author']);
  $sql = "SELECT * FROM `user` WHERE `name` = '{$author}'";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows>0){
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
  }
  else{
    $sql = "INSERT INTO user (id, name, password) VALUES(NULL, '{$author}', '111111');";
    $result = mysqli_query($conn,$sql);
    $user_id = mysqli_insert_id($conn);
  }
  $title = mysqli_real_escape_String($conn, $_POST['title']);
  $description = mysqli_real_escape_String($conn, $_POST['description']);
  $sql = "INSERT INTO `topic` (`id`, `title`, `description`, `author`, `created`) VALUES (NULL, '{$title}', '{$description}', '{$user_id}',now());";
  mysqli_query($conn, $sql);
  header('Location: index.php');
?>
