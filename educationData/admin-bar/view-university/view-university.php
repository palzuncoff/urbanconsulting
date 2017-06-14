<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/educationData/admin-bar/admin-bar.css">
	</head>

	<body>
	<?php
		include get_home_path().'/jobs/adeon.php';
		echo '<h2>Доступные универы:</h2>';
	
		global $wpdb;
		$result = $wpdb->get_results("SELECT * FROM university", ARRAY_A);
		if(!empty($wpdb->last_error)) die($wpdb->last_error);
		
		if(!$result) {
			die("<p>Нет данных</p>");
		}
		
		foreach($result as $university) { ?>
			<div class="cv-view">
				<div class="col-7" style="position: relative;">
					<div class="cv-view-field"><p><strong>ID универа</strong>: <?php echo $university['id']; ?></p></div>
					<div class="cv-view-field"><p><strong>Название</strong>: <?php echo $university['name']; ?></p></div>
					<div class="cv-view-field"><p><strong>Информация</strong>: <?php echo $university['info']; ?></p></div>
					<div class="cv-view-field"><p><strong>Email</strong>: <?php echo $university['email']; ?></p></div>
					<div class="cv-view-field"><p><strong>Web-Site</strong>: <?php echo $university['site']; ?></p></div>
					<div class="cv-view-field"><p><strong>Fax</strong>: <?php echo $university['fax']; ?></p></div>
					<div class="cv-view-field"><p><strong>Phone</strong>: <?php echo $university['phone']; ?></p></div>
					<div class="cv-view-field"><p><strong>Страна</strong>:  <?php echo $country[$university['country']]; ?></p></div>
					<div class="cv-view-field"><p><strong>Адрес</strong>: <?php echo $university['address']; ?></p></div>
					<div class="cv-view-field"><p><strong>Map_URL</strong>: <?php echo $university['map_url']; ?></p></div>
					<div class="cv-view-field"><p><strong>Город</strong>: <?php echo $city[$university['country']][$university['city']]; ?></p></div>
					<div class="cv-view-field"><p><strong>what_can_learn</strong>: <?php echo $university['what_can_learn']; ?></p></div>
					<div class="cv-view-field"><p><strong>why_us</strong>: <?php echo $university['why_us']; ?></p></div>
					<div class="cv-view-field"><p><strong>after_finish</strong>: <?php echo $university['after_finish']; ?></p></div>
					<?php
					$university_faculties = $wpdb->get_results("SELECT university_faculty FROM university_faculties where university_id=".$university['id'], ARRAY_A);
					if(!empty($wpdb->last_error)) die($wpdb->last_error);
					
					$university_speciality = $wpdb->get_results("SELECT university_speciality FROM university_speciality where university_id=".$university['id'], ARRAY_A);
					if(!empty($wpdb->last_error)) die($wpdb->last_error);
					?>
					Факультеты:
					<select id="faculty_names" name="faculty_names[]" multiple="multiple">
					<?php
					foreach($university_faculties as $faculty) { ?>
					<option value=<?php echo $faculty['university_faculty'];?>>
					<?php 
					$university_faculty_name = $wpdb->get_results("SELECT faculty_name FROM university_faculties_list where id=".$faculty['university_faculty'], ARRAY_A);
					foreach ($university_faculty_name as $fac_name) {
						echo $fac_name['faculty_name'];
					}
					?></option>
					<?php } ?>
					</select>
					<br><br>
					Cпециальности:
					<select id="speciality_names" name="speciality_names[]" multiple="multiple">
					<?php
					foreach($university_speciality as $speciality) { ?>
					<option value=<?php echo $speciality['university_speciality'];?>>
					<?php 
					$university_speciality_name = $wpdb->get_results("SELECT speciality_name FROM university_speciality_list where id=".$speciality['university_speciality'], ARRAY_A);
					foreach ($university_speciality_name as $spec_name) {
						echo $spec_name['speciality_name'];
					}
					?></option>
					<?php } ?>
					</select>
					<?php echo '<img class="admin__university-icon" src="/university_data/icons/'.$university['icon'].'" style="width:128px;height:128px">'; ?>
					
					<div class="comment">
						<form action="/educationData/admin-bar/view-university/process.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $university['id']; ?>">
							<input type="hidden" name="icon_path" value="<?php echo $university['icon']; ?>">
							<div class="cv-view-buttons">
							<input class="btn-agree" type="submit" value="Удалить" name='delete'>
							</div>
						</form>
					</div>
					<div class="comment">
						<form action="/educationData/admin-bar/view-university/edit-university.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $university['id']; ?>">
							<div class="cv-view-buttons">
							<input class="btn-agree" type="submit" value="Редактировать" name='edit'>
							</div>
						</form>
					</div>
				</div>
					<div class="col-5 admin__university-gallery">
					<?php 
					$university_photo = $wpdb->get_results("SELECT path_to_photo FROM university_photo where university_id=".$university['id'], ARRAY_A);
					foreach ($university_photo as $photo) {
						echo '<img src="/university_data/photo/'.$photo['path_to_photo'].'" style="width:128px;height:128px">';
					}
					?>
					</div>
				<div class="clear"></div>
				
			</div>
		<? }
		
	?>
	</body>
</html>