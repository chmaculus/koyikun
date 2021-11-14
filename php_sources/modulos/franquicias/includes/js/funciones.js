	$(function() {
		$.datepicker.setDefaults($.extend({showMonthAfterYear: false}, $.datepicker.regional['']));
		$("#fecha_desde").datepicker($.datepicker.regional['es']);
		$("#locale").change(function() {
			$('#fecha_desde').datepicker('option', $.extend({showMonthAfterYear: false},
				$.datepicker.regional[$(this).val()]));
		});
	});

	$(function() {
		$.datepicker.setDefaults($.extend({showMonthAfterYear: false}, $.datepicker.regional['']));
		$("#fecha_hasta").datepicker($.datepicker.regional['es']);
		$("#locale").change(function() {
			$('#fecha_hasta').datepicker('option', $.extend({showMonthAfterYear: false},
				$.datepicker.regional[$(this).val()]));
		});
	});




function fecha(variable) {
		$.datepicker.setDefaults($.extend({showMonthAfterYear: false}, $.datepicker.regional['']));
		$("#datepicker").datepicker($.datepicker.regional['es']);
		$("#locale").change(function() {
			$('#datepicker').datepicker('option', $.extend({showMonthAfterYear: false},
				$.datepicker.regional[$(this).val()]));
		});
	fecha = document.getElementById(variable).value;
	document.getElementById('text1').value = variable;
}

function fecha3(variable) {
	//$(function() {
		//$("#"+variable).datepicker($.datepicker.regional['es']);
		$("#"+variable).datepicker($.datepicker.regional['es']);
		$('#'+variable).datepicker('option', $.extend({showMonthAfterYear: false},
		$.datepicker.regional['es']));
	//fecha = document.getElementById(variable).value;
//	document.getElementById(variable).value = variable;
	document.getElementById('text1').value = $('#'+variable);
}

function fecha2(variable) {
	var fecha = '';
	fecha = document.getElementById(variable).value;
	document.getElementById('text1').value = fecha;
}