
function cal2(idarticulos) {
	temp1  =  parseFloat(document.getElementById('costo'+idarticulos).value) * (parseFloat(document.getElementById('reponer'+idarticulos).value) * 1)  ;

	document.getElementById('totalpedir'+idarticulos).value = temp1.toFixed(2);
}



function popup(mylink, windowname){
	if (! window.focus)return true;
		var href;
	if (typeof(mylink) == 'string')
   	href=mylink;
	else
   	href=mylink.href;
		window.open(href, windowname, 'width=1000,height=555,scrollbars=yes');
return false;
}
