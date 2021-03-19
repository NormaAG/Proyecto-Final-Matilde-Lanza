<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script language="JavaScript">
    function arranque() {
	var fecha = new Date();

	var dia = fecha.getDate();
	var mes = fecha.getMonth() + 1;
	var anio = fecha.getFullYear();

	document.decime_date.fechaa.value = dia+"/"+mes+"/"+anio;

	updatenow();
	
    }

    function updatenow() {

	tiempo = new Date()

	document.decime_date.hora.value = tiempo.getHours()+":"+tiempo.getMinutes()+":"+tiempo.getSeconds();

	setTimeout("updatenow()",1000)

    }

</script>
</head>
<body onload="arranque()">

<form name="decime_date">
Fecha : <input type="text" name="fechaa" size="10">
<br>
Hora : <input type="text" name="hora" size="10">
</form>
</body>
</html>
