<?php
	require("config/config.php");
	require("lib/db.php");
	$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
	$result = mysqli_query($conn,'SELECT * FROM topic');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	</head>
	<body id="target">
		<div class="container">
			<header class="jumbotron text-center">
				<img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩" class="rounded-circle" id="logo">
				<h1><a href="index.php">JavaScript</a></h1>
			</header>
			<div class="row">
				<nav class="col-md-3">
					<ol class="nav nav-pills flex-column">
						<?php
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<li class="nav-item"><a class="nav-link" href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
							}
						?>
					</ol>
				</nav>
				<div class="col-md-9">
						<article>
							<?php
								if(!empty($_GET['id'])){
									$sql = 'SELECT * FROM topic WHERE id='.$_GET['id'];
									$result = mysqli_query($conn,$sql);
									$row = mysqli_fetch_assoc($result);
									echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
									echo htmlspecialchars($row['author'])."<br>\n";
									echo strip_tags($row['description'],'<a><h1><h2><h3><h4><h5><ol><ul><li>');
								}
							 ?>
						</article>
						<hr>
						<div id="control">
							<div class="btn-group" role="group" aria-label="Basic example">
								<input type="button" value="white" id="white_btn" class="btn btn-outline-primary btn-lg">
								<input type="button" value="black" id="black_btn" class="btn btn-outline-primary btn-lg">
							</div>
							<a href="write.php" class="btn btn-outline-success btn-lg">쓰기</a>
						</div>
					</div>
			</div>
		</div>
		<script src="script.js"></script>

		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</body>
</html>
