<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/educationData/admin-bar/admin-bar.css">
</head>
<body>
	<h2>Добавить специальность:</h2>
	<form method="POST" action="/educationData/admin-bar/add-speciality/process.php">  
		Название: <input type="text" name="name" required="required" value="">
		<input type="submit" name="submit" value="Отправить">
	</form>
	<br><br>
	<strong>Специальности:</strong>
	<?php  
		global $wpdb;
		$speciality_name = $wpdb->get_results("SELECT * FROM university_speciality_list", ARRAY_A);
		if(!empty($wpdb->last_error)) die($wpdb->last_error);
		foreach($speciality_name as $name) { ?>		
		<form action="/educationData/admin-bar/add-speciality/process.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $name['id'];?>">
		<div class="cv-view-buttons">
		<input class="btn-agree" type="submit" value="Удалить" name='delete'>
		<?php echo $name['speciality_name']; ?>
		</div>
		<?php } ?>  
	</form>
</body>
</html>