<?php
  if(file_exists("data/".$_POST['old_title'])){
    rename("data/".$_POST['old_title'],"data/".$_POST['new_title']);
    file_put_contents("data/".$_POST['new_title'],$_POST['description']);
    header('Location: index.php?id='.$_POST['new_title']);
  }
  else{
    header('Location: index.php?');
  }
?>
