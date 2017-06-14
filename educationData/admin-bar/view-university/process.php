<?php
	include "../../../wp-load.php";
	global $wpdb;

	$university_photo = $wpdb->get_results("SELECT path_to_photo FROM university_photo where university_id=".$_POST['id'], ARRAY_A);

	foreach($university_photo as $photo) {
			$path = "../../../university_data/photo/".$photo['path_to_photo'];
			if(file_exists($path)) unlink($path);
		}

	$wpdb->delete("university", array("id"=>$_POST["id"]),  array( '%d' ));
	$wpdb->delete("university_faculties", array("university_id"=>$_POST["id"]),  array( '%d' ));
	$wpdb->delete("university_photo", array("university_id"=>$_POST["id"]),  array( '%d' ));
	$wpdb->delete("university_speciality", array("university_id"=>$_POST["id"]),  array( '%d' ));

	if(isset($_POST['icon_path'])){
		$path = "../../../university_data/icons/".$_POST['icon_path'];
		if(file_exists($path)) unlink($path);
	}

	header('Location: https://urbanconsulting.md/wp-admin/admin.php?page=sub-page_all_data_univ');
?>