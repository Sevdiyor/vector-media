//$(document).ready(function () {
//	$('#region_id').change(function () {
//		var region_id = $(this).val();
//		if (region_id == '0') {
//			$('#city_id').html('<option>- Select your city -</option>');
//			$('#city_id').attr('disabled', true);
//			return(false);
//		}
//		$('#city_id').attr('disabled', true);
//		$('#city_id').html('<option>loading...</option>');
//
//		var url = 'get_city.php';
//
//		$.get(
//			url,
//			"region_id=" + region_id,
//			function (result) {
//				if (result.type == 'error') {
//					alert('error');
//					return(false);
//				}
//				else {
//					var options = '';
//
//					$(result.citys).each(function() {
//						options += '<option value="' + $(this).attr('city_id') + '">' + $(this).attr('city_name') + '</option>';
//					});
//					$('#city_id').html(options);
//					$('#city_id').attr('disabled', false);
//				}
//			},
//				"json"
//		);
//	});
//});


$('#region_id').change(function () {
	var region_id = $(this).val(); //$('#region_id :selected').val();
	//alert (region_id);
	if (region_id == '0') {
		$('#city_id').html('<option>- выберите город -</option>');
		$('#city_id').attr('disabled', true);
		return(false);
	}
	$('#city_id').attr('disabled', true);
	$('#city_id').html('<option>загрузка...</option>');

	var url = 'get_city.php';

	$.get(
			url,
			"region_id=" + region_id,

			function (result) {
				if (result.type == 'error') {
					alert('error');
					return(false);
				}
				else {
					var options = '';
					$(result.citys).each(function() {
						options += '<option value="' + $(this).attr('city_id') + '">' + $(this).attr('name') + '</option>';

					});
					$('#city_id').html('<option value="0">- выберите город -</option>'+options);
					$('#city_id').attr('disabled', false);

					$('#city_id').change(function(){
						var value = $('#city_id :selected').text();
						var city_id = $('#city_id :selected').val();
						if (city_id !== '0') {
							$('#selectBoxInfo').html('Выбран '+ value).
							fadeIn(1000,function(){
								$(this).fadeOut(2000);
							});
						}
					});
				}
			},
			"json"
	);
});