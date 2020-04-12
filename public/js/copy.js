$(document).ready(function(){

	$('#id_disciplines').change(function(){

		let dis = ($('#id_disciplines').val());
		$('#id_disc').val(dis);

	});
});