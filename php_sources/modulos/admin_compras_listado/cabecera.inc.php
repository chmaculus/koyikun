<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" href="style.css" type="text/css">
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
  <title>datos_caja</title>
	<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/ui/ui.core.js"></script>
	<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="js/ui/i18n/ui.datepicker-es.js"></script>
	<script type="text/javascript" src="funciones.js"></script>
	<link type="text/css" href="../demos.css" rel="stylesheet" />
	<script type="text/javascript">
	$(function() {
		$('#fecha_hasta').datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	$(function() {
		$('#fecha_desde').datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
</head>
<body>
