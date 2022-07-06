function calcularDiferencaKm() {
	const kmAtual = document.getElementById("km").value
	const kmAnterior = document.getElementById("ultimokm").value

	const diferencaKm = kmAtual - kmAnterior
	
	document.getElementById("diferencakm").value = diferencaKm 
	
}
function calcularDiferencaHr() {
	const hrAtual = document.getElementById("hr").value
	const hrAnterior = document.getElementById("ultimohr").value

	const diferencaHr = hrAtual - hrAnterior
		
    document.getElementById("diferencahr").value = diferencaHr 
}
		
function calcularLitrosOd() {
	const odometroInicial = document.getElementById("odometroinicial").value
	const odometroFinal = document.getElementById("odometrofinal").value

	const litrosOdometro = odometroFinal - odometroInicial

		document.getElementById("litros_od").value = litrosOdometro.toFixed(2)
}
function calcularMedia(){

	const kmRodado = document.getElementById("diferencakm").value
	const litros = document.getElementById("litros").value

		const media = kmRodado / litros
		document.getElementById("media").value = media.toFixed(2) 
		
}
function somenteNumeros(num) {
    var er = /[^0-9,\.]/;
    er.lastIndex = 0;
    var campo = num;
    if (er.test(campo.value)) {
      campo.value = "";
    }
}
$("#prefixo").on("change", function () {
    $.ajax({
        url: 'diesel-control-1.2/assets/controllers/abastecimentoDataBaseAcess.php',
        type: 'POST',
        dataType: "json",
        data: {id_veiculo: $("#prefixo").val(), acao: 'ultimoKm' },
        success: function (json) {
            
            $("#ultimokm").val(json.ultimoKm);
            $("#ultimohr").val(json.ultimoHr);
    
        }
    });
});
function PopupCenter(url, title, w, h) {  
    // Fixes dual-screen position                         Most browsers      Firefox  
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
              
    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
              
    var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
    var top = ((height / 2) - (h / 2)) + dualScreenTop;  
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
  
    // Puts focus on the newWindow  
    if (window.focus) {  
        newWindow.focus();  
    }  
}  
function table2excel(id) {
    $("#" + id).table2excel({
        exclude: ".excludeThisClass",
        name: "export",
        filename: "export.xls", // do include extension, usar xls pra nÃ£o dar pau com o chrome
        preserveColors: true // set to true if you want background colors and font colors preserved
        
    });
}
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}