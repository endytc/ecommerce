        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Website E-commerce</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="<?php echo app_base_url().'/assets/'?>default.css" rel="stylesheet" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/'?>slide/jquery-1.2.6.min.js"></script>
        <link rel="stylesheet" href="<?php echo app_base_url().'/assets/'?>dropdown/dropdown_1.css" type="text/css" />
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/'?>dropdown/dropdown_1.js"></script>
        <script type="text/javascript">

            /***
             Simple jQuery Slideshow Script
             Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
             ***/

            function slideSwitch() {
                var $active = $('#slideshow IMG.active');

                if ($active.length == 0)
                    $active = $('#slideshow IMG:last');

                // use this to pull the images in the order they appear in the markup
                var $next = $active.next().length ? $active.next()
                        : $('#slideshow IMG:first');

                $active.addClass('last-active');

                $next.css({opacity: 0.0})
                        .addClass('active')
                        .animate({opacity: 1.0}, 1000, function() {
                    $active.removeClass('active last-active');
                });
            }

            $(function() {
                setInterval("slideSwitch()", 5000);
            });

        </script>