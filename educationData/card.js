document.addEventListener('DOMContentLoaded', function() {
	$ = jQuery;
	
	var id = $_GET('id');
	if(!id.length) {
		alert("Ошибка: Параметры заданы неверно");
		return;
	}
	
	$.ajax({
		type: "POST",
		url: "/educationData/fetchUniversity.php",
		data: "id="+id,
		async: true,
		success: function(response) {
			var data = JSON.parse(response);
			if(data.error === undefined) {
				data = data.data;
				console.log(data);
				var e = document.getElementById('university__card');
				var html = "";
				
				html += '\
				<div class="university__card-title block">\
					<div class="col-7 bs cf cl university__card">\
						<div class="col-3 university__logo">\
							<img src="/university_data/icons/'+data.icon+'" width="100" alt="">\
						</div>\
						<div class="col-9 university__name">\
							<p>'+data.name+'</p>\
						</div><!-- university__name -->\
					</div><!-- flex-center -->\
				</div><!-- block -->\
				<div class="university__card-info block cf">\
					<div class="university__top-row cf fl">\
						<div class="col-4 university__image-big">\
							<div class="image-wrapper">\
								<img src="'+((data.photos.length) ? ('/university_data/photo/'+data.photos[0]) : stockPhotoUrl) +'" alt="">\
							</div>\
						</div><!-- big -->\
						<div class="col-4 university__gallery">\
							<div class="col-6">\
								<div class="image-wrapper">\
									<img src="'+((data.photos.length) ? ('/university_data/photo/'+data.photos[0]) : stockPhotoUrl) +'" alt="">\
								</div>\
							</div><!-- col -->\
							<div class="col-6">\
								<div class="image-wrapper">\
									<img src="'+((data.photos.length >= 2) ? ('/university_data/photo/'+data.photos[1]) : stockPhotoUrl) +'" alt="">\
								</div>\
							</div><!-- col -->\
							<div class="col-6">\
								<div class="image-wrapper">\
									<img src="'+((data.photos.length >= 3) ? ('/university_data/photo/'+data.photos[2]) : stockPhotoUrl) +'" alt="">\
								</div>\
							</div><!-- col -->\
							<div class="col-6">\
								<div class="image-wrapper">\
									<img src="'+((data.photos.length >= 4) ? ('/university_data/photo/'+data.photos[3]) : stockPhotoUrl) +'" alt="">\
								</div>\
							</div><!-- col -->\
						</div><!-- university__gallery -->\
						<div class="col-4 university__contact bs">\
							<div class="university__inner-wrapper">\
								<div class="col-6">\
									<div class="university__block-title">\
										<p>Contact</p>\
									</div><!-- title -->\
									<p>'+data.address+', '+getCityName(data.country, data.city)+', '+getCountryName(data.country)+'</p>\
									<div class="university__block-info">\
										<p>Telefon: '+data.phone+'</p>\
										<p>Fax: '+data.fax+'</p>\
										<p>E-mail: '+data.email+'</p>\
										<p>Web: '+data.site+'</p>\
									</div><!-- info -->\
									<h4>Program de functionare</h4>\
									<div class="university__block-info">\
										<p>Luni-Vineri: 7:30 - 16:00 (pauza de masa in intervalul 12:30 - 13:00)</p>\
									</div><!-- info -->\
								</div><!-- col -->\
								<div class="col-6 university__contact-map">\
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43592.00946748655!2d29.17263822246809!3d46.93219966115975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97333f1842aa1%3A0xf2735794d50417ef!2z0J3QvtCy0LDRjyDQmtC-0LHRg9GB0LrQsCwg0JzQvtC70LTQvtCy0LA!5e0!3m2!1sru!2sru!4v1494513563984" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>\
								</div><!-- map -->\
							</div><!-- info-block -->\
						</div><!-- university__contact -->\
					</div><!-- row -->\
					<div class="university__bot-row cf fl">\
						<div class="col-2 university__facultati">\
							<div class="university__inner-wrapper bs fl">\
								<div class="university__block-title">\
									<p>Facultati</p>\
								</div><!-- block-title -->\
								<div class="university__block-info">\
									<ul>';
									for(var i = 0; i < data.faculties.length; i++) {
										html += '<li>'+data.faculties[i]+'</li>';
									}

									html += '</ul>\
								</div>\
							</div><!-- inner-wrapper -->\
						</div><!-- col -->\
						<div class="col-8 university__main-info">\
							<div class="university__inner-wrapper bs fl">\
								<div class="university__block-title">Ce poti studia</div>\
								<p>'+data.what_can_learn+'</p>\
								<div class="university__block-title">De ce la noi</div>\
								<p>'+data.why_us+'</p>\
								<div class="university__block-title">Ce poti face dupa ce termini</div>\
								<p>'+data.after_finish+'</p>\
							</div>\
						</div><!-- col -->\
						<div class="col-2 university__apply">\
							<div class="university__inner-wrapper bs fl">\
								<div class="university__apply-title">apply here</div>\
								<img src="http://s1.iconbird.com/ico/2013/11/491/w256h2561384698911applegreen.png" width="60" alt="">\
							</div><!-- inner-wrapper -->\
						</div><!-- col -->\
					</div><!-- row -->\
				</div><!-- block -->\
				';

				e.innerHTML = html;
			} else {
				alert("Ошибка: "+data.error);
				console.log(obj);
			}
		},
		error: function(error) {
			console.log(error);
		}
	});
});