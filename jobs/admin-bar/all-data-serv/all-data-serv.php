<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/jobs/admin-bar/all-data-cv/admin-cv.css">
	</head>

	<body>
	<?php
		function getCategory($id){
			switch($id){
				case 0: return "Другое";
				case 1: return "Сельское хозяйство";
				case 2: return "Туризм";
				case 3: return "Рестораны, общепит";
				case 4: return "Маркетинг";
				case 5: return "Реклама, PR";
				case 6: return "Юриспруденция";
				case 7: return "Страхование";
				case 8: return "Спорт";
				case 9: return "Красота";
				case 10: return "Банки, Финансы ";
				case 11: return "Бухгалтерия";
				case 12: return "Аудиторство";
				case 13: return "Образование";
				case 14: return "Дизайн";
				case 15: return "Искусство";
				case 16: return "Развлечения";
				case 17: return "Транспорт и Логистика";
				case 18: return "Медицина и Фармацевтика";
				case 19: return "IT и Телекоммуникации";
				case 20: return "Производство, промышленность";
				case 21: return "Строительство и Недвижимость";
				case 22: return "СМИ, Журналистика";
				case 23: return "Переводы";
				case 24: return "Торговля и Продажи";
				case 25: return "Охрана и Безопасность";
				case 27: return "Персонал для дома и офиса";
			}
		}
		include get_home_path().'adeon/adeon.php';
		echo '<h2>Доступные услуги, ожидающие подтверждения</h2>';
	
		global $wpdb;
		$db="users_serv";
		$result = $wpdb->get_results("SELECT * FROM $db", ARRAY_A);
		if(!empty($wpdb->last_error)) die($wpdb->last_error);
		
		if(!$result) {
			die("<p>Нет данных</p>");
		}
		
		foreach($result as $serv) { ?>
			<div class="cv-view">
				<div class="col-7">
					<div class="cv-view-field"><p><strong>ID услуги</strong>: <?php echo $serv['id']; ?></p></div>
					<div class="cv-view-field"><p><strong>Название услуги</strong>: <?php echo $serv['name']; ?></p></div>
					<div class="cv-view-field"><p><strong>Имя пользователя</strong>: <?php echo $serv['wp_username']; ?></p></div>
					<div class="cv-view-field"><p><strong>Категория</strong>: <?php echo getCategory($serv['category']); ?></p></div>
					<div class="cv-view-field"><p><strong>Описание</strong>: <?php echo $serv['info']; ?></p></div>
					<div class="cv-view-field"><p><strong>Страна</strong>: <?php echo $country[$serv['country']]; ?></p></div>
					<div class="cv-view-field"><p><strong>Город</strong>: <?php echo $city[$serv['country']][$serv['city']]; ?></p></div>
					<div class="cv-view-field"><p><strong>Дата</strong>: <?php echo $serv['date']; ?></p></div>
					
					<div class="comment">
						<form action="/jobs/admin-bar/all-data-serv/process.php" method="POST">
							<textarea name="comment" id="" placeholder="Комментарий по поводу услуги..." rows="3"></textarea>
							<input type="hidden" name="id" value="<?php echo $serv['id']; ?>">
							<input type="hidden" name="fio" value="<?php echo $serv['name']; ?>">
							<div class="cv-view-buttons">
							<input class="btn-agree" type="submit" value="Удалить" name='delete'>
							</div>
						</form>
					</div>
				</div>
			
				<div class="col-5">
					<div class="cv-view-photo">
					<?php 
						if($serv['has_photo']) echo '<img src="/serv_data/users/'.$serv['wp_username'].'/'.$serv['id'].'.jpg"/>';
						else  echo '<img src="/wp-content/uploads/2017/03/checked.png"/>';
					?>
					</div>
				</div>

				<div class="clear"></div>
				
			</div>
		<? }
		
	?>
	</body>
</html>