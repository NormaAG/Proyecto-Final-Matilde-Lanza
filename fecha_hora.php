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
<style>
 .outlinenone {
    outline: none;
    background-color: #DCDBDB;
    border: 0;
	text-align:center;
  }
</style>
</head>
<body onload="arranque()">

<form name="decime_date">
<input type="text" name="fechaa" size="25" class="outlinenone" >
<input type="text" name="hora" size="25" class="outlinenone" >
</form>
</body>
</html>
