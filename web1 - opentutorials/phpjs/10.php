<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8" />
  </head>
  <body>
    <h1>JavaScript</h1>
    <script>
      list = new Array("one","two","three");
      for(i=0;i<list.length;i++){
        document.write(list[i]);
      }
    </script>

    <h1>php</h1>
    <?php
      $list = array("one","two","three");
      for($i=0;$i<count($list);$i++){
        echo $list[$i];
      }
     ?>
  </body>
</html>
