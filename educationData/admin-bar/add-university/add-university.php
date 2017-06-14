<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/educationData/admin-bar/admin-bar.css">
</head>
<body>
	<h2>Добавить университет:</h2>
	<?php include "../../../adeon.php"; 
	global $wpdb;
	$faculties_name = $wpdb->get_results("SELECT * FROM university_faculties_list", ARRAY_A);
	if(!empty($wpdb->last_error)) die($wpdb->last_error);
	
	$speciality_name = $wpdb->get_results("SELECT * FROM university_speciality_list", ARRAY_A);
	if(!empty($wpdb->last_error)) die($wpdb->last_error);
	?>
	<form method="POST" enctype="multipart/form-data" action="/educationData/admin-bar/add-university/process.php">  
	<pre><b>
Название: <input type="text" name="name" required="required" value="">

<select name="country" id="country" required>
<option disabled selected hidden value="-1">Выберите страну</option> 
</select> <select name="city" id="city" required>
<option disabled selected hidden value="-1">Выберите город</option>
</select>

Информация:
<textarea name="info" required="" rows="5" cols="40"></textarea>

Адрес: <input type="text" name="address" value=""> Map_Url: <input type="text" name="map_url" value="">

Email: <input type="text" name="email" value="">   Telephone: <input type="text" name="phone" value="">

WEB-site: <input type="text" name="site" value=""> FAX: <input type="text" name="fax" value="">

why_us: <textarea name="why_us" required="" rows="5" cols="40"></textarea> after_finish: <textarea name="after_finish" required="" rows="5" cols="40"></textarea>

what_can_learn: <textarea name="what_can_learn" required="" rows="5" cols="40"></textarea>
	</pre>
		<select id="faculty_names" size=15 name="faculty_names[]" required="required" multiple="multiple">
			<?php
			foreach($faculties_name as $fac_name) { ?>
			<option value="<?php echo $fac_name['id'];?>"><?php echo $fac_name['faculty_name'];?></option>
			<?php } ?>
		</select> 
		<select id="speciality_names" size=15 name="speciality_names[]" required="required" multiple="multiple">
			<?php
			foreach($speciality_name as $spec_name) { ?>
			<option value="<?php echo $spec_name['id'];?>"><?php echo $spec_name['speciality_name'];?></option>
			<?php } ?>
		</select>
		<br><br>
		Фото: <input type="file" required="" accept="image/jpg,image/jpeg,image/png" multiple name="photo[]">
		<br><br>
		Иконка: <input type="file" accept="image/jpg,image/jpeg,image/png" name="icon">
		<br><br>
		<input type="submit" name="submit" value="Отправить">  
	</form></b>
	<script src="/jobs/adeon.js"></script>
	<script>
		jQuery(document).ready(function() {
			populateCountries("country", "city");
		});
	</script>
</body>
</html>