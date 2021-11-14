function popup2( mylink , windowname ){
	if (! window.focus)return true;
	var href;
	if (typeof(mylink) == 'string')
   	href=mylink;
	else
   	href=mylink.href;
	window.open(href, windowname, 'width=600, height=400, scrollbars=yes, center=yes');
	return false;
}

function popup3( mylink , windowname ){
	if (! window.focus)return true;
  	href=mylink.href;
	window.open(href, windowname, 'width=600, height=400, scrollbars=yes, center=yes');
	return false;
}

function popup( mylink , windowname ){
	if (! window.focus)return true;
  	href=mylink.href;
	window.open(href, windowname, 'toolbars=yes, width=600, height=400, scrollbars=yes');
	return false;
}
