     $(document).ready(function (){

    if ($.browser.msie) //si es IE

    {

    if($.browser.version == '7.0'){

    $('.tableContainer').css({'clear':'both','width':'100%','overflow':'scroll','height':'250px'});

    $('.tableContainer table').css({'float':'left','width':'98%'});

    $('.fixedHeader tr').css({'position':'relative','display':'block'});

    };//if browser IE7


    if($.browser.version == '8.0'){

    $('.tableContainer').css({'clear':'both','width':'100%','overflow':'hidden','height':'250px'});

    $('.tableContainer table').css({'float':'left','width':'98%'});

    $('.fixedHeader').css({'float':'left','width':'98%'});

    $('.scrollContent').css({'float':'left','height':'250px','overflow':'scroll','width':'100%','clear':'left'});

    $('.scrollTable th').css({'border':'auto','width':'200px'});

    $('.scrollTable td').css({'border':'auto','width':'200px'});

    };//if browser IE8

    }

    else // si es FF o Chrome

    {

    $('.tableContainer').css({'clear':'both','width':'100%','overflow':'hidden'});

    $('.tableContainer table').css({'float':'left','width':'100%'});

    $('.fixedHeader tr').css({'position':'relative','display':'block','width':'98%'});

    $('.scrollContent').css({'display':'block','height':'250px','overflow':'auto','width':'100%'});

    }//if browser


    }) //ready