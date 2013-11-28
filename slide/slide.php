<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the images in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 10000 );
});

</script>

<style type="text/css">

/*** set the width and height to match your images **/

#slideshow {
    position:relative;
    height:270px;
    padding-left: 45px;

}

#slideshow IMG {
    position:absolute;
    top:0;
    left:10;
    z-index:0;
    opacity:0.0;
}

#slideshow IMG.active {
    z-index:10;
    opacity:1.0;
}

#slideshow IMG.last-active {
    z-index:9;
}

</style>

</head>

<body style="font-family: Arial, Sans-serif, sans;">

<div id="slideshow">
    <img src="../images/ootd1.jpg" alt="Slideshow Image 1" class="active" width="670" height="177"/>
    <img src="../images/ootd2.jpg" alt="Slideshow Image 2" width="670" height="177" />
    <img src="../images/polaroid1.jpg" alt="Slideshow Image 3" width="670" height="177" />
    <img src="../images/polaroid2.jpg" alt="Slideshow Image 4" width="670" height="177" />
    <img src="../images/properti1.jpg" alt="Slideshow Image 4" width="670" height="177" />
    <img src="../images/rumah1.jpg" alt="Slideshow Image 4" width="670" height="177" />
</div>

</body>
</html>
