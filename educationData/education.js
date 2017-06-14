
	function fetchEducation(all = false) {
		var specialties = [];
		
		var items = document.querySelectorAll(".info__text-list input[type='checkbox']:checked");
		for(var i = 0; i < items.length; ++i) {
			if(specialties.indexOf(items[i].value) == -1) specialties.push(items[i].value);
		}
		
		var obj = {
			country : (all) ? -1 : document.getElementById("country").selectedIndex,
			city : (all) ? -1 : document.getElementById("city").selectedIndex,
			specialties : specialties
		};
		
		console.log(obj);
		
		$.ajax({
			type: "POST",
			url: "/educationData/fetchUniversities.php",
			data: obj,
			async: true,
			success: function(response) {
				var content = document.getElementById('sliderContent');
				content.innerHTML = "";
				var html = "";
				var json = JSON.parse(response);
				console.log(json);
				if(json.data.length) {
					json.data.forEach(function(item){
						html += '<div class="swiper-slide bs">\
							<a href="https://urbanconsulting.md/ru/education/card?id='+item.id+'" target="_blank">\
								<img src="/university_data/photo/'+item.photos[0]+'" alt="">\
								<p>'+item.name+'</p>\
							</a>\
						</div>';
					});
					content.innerHTML = html;
				}
				
				window.dispatchEvent(new Event('resize'));
			},
			error: function(error) {
				console.log(error);
			}
		});
	}
	
	function onEducationCountryChange() {
		var 
			e = document.getElementById("city"),
			selectedCountryIndex = document.getElementById("country").selectedIndex,
			cityNames = city[selectedCountryIndex].split("|")
		;

		e.length = 0;
		for (var i = 0; i < cityNames.length; i++) {
			e.options[i] = new Option(cityNames[i], i);
		}
		e.slectedIndex = 0;
	}

	function populateEducationCountries(startCountry = 153) {
		var e = document.getElementById("country");
		e.length = 0;
		for (var i = 0; i < country.length; i++) {
			e.options[i] = new Option(country[i], i);
		}
		e.selectedIndex = startCountry;
		
		onEducationCountryChange();
		e.onchange = onEducationCountryChange;
	}
	
	document.addEventListener('DOMContentLoaded', function() {
		populateEducationCountries();
		
		var items = document.querySelectorAll(".info__text-list input[type='checkbox']");
		for(var i = 0; i < items.length; i++) {
			items[i].onchange = function () {
				fetchEducation(false);
			}
		}
		
		fetchEducation(true);
		
		document.getElementById("city").onchange = function () {
			fetchEducation(false);
		}
		
		document.getElementById('filterSearchButton').onclick = function() {
			var e = document.getElementById('filterSearchInput').value;
			if(e.length) {
				//search
			}
		}
	});
