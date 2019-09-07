<?php
  if(file_exists('data/'.$_POST['title'])){
    unlink('data/'.$_POST['title']);
  }
  header('Location: index.php?');
?>
