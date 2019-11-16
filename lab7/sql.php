<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lab7</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>Lab7</h1>
		<form action="sql.php" method="POST">
			dbname:<input type="text" title="dbname" name="dbname"/>
			sql: <input type="text" title="sql" name="sql"/>
			<input type="submit"/>
		</form>
		
		<?php
		if(isset($_POST["dbname"])&&isset($_POST["sql"])){
			$db_name=$_POST["dbname"];
			$sql_str=$_POST["sql"];
			$db = new PDO("mysql:dbname=$db_name;host=127.0.0.1", "root", "123456");
			$rows = $db->query($sql_str);
			foreach($rows as $row){
				?>
				<li>student_id: <?=$row["student_id"]?>
				student_name: <?=$row["name"]?></li>
				<?php
			}
		}
		?>
	</body>
</html>
