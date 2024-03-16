<head>
	<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/ui/ui.core.js"></script>
	<script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
	<script type="text/javascript" src="js/ui/i18n/ui.datepicker-es.js"></script>
	<link type="text/css" href="../demos.css" rel="stylesheet" />
	<script type="text/javascript">
	$(function() {
		$('#desde').datepicker({
			changeMonth: true,
			changeYear: true
		});
		$('#hasta').datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
</head>
<body>

<?php
	$fecha=date("d/n/Y");
?>


<p>Desde: <input type="text" id="desde" value="<?php echo $fecha; ?>"> Hasta: <input type="text" id="hasta" value="<?php echo $fecha; ?>"></p>


</body>
</html>

