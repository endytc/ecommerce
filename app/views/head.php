        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Website E-commerce</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="<?php echo app_base_url().'/assets/'?>default.css" rel="stylesheet" type="text/css" media="screen" />

        <link rel="stylesheet" href="<?php echo app_base_url().'/assets/'?>dropdown/dropdown_1.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo app_base_url().'/assets/'?>jplayer.skin/pink.flag/jplayer.pink.flag.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo app_base_url().'/assets/'?>validate.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo app_base_url().'/assets/'?>jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css" type="text/css" />

        <link href="<?php echo app_base_url().'/assets/'?>grid.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo app_base_url().'/assets/'?>facebook.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php echo app_base_url().'/assets/'?>ui-buttons.css" rel="stylesheet" type="text/css" media="screen" />

<!--        <script type="text/javascript" src="--><?php //echo app_base_url().'/assets/'?><!--slide/jquery-1.2.6.min.js"></script>-->
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/'?>jquery-1.7.min.js"></script>
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/'?>jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/jplayer.js/'?>jquery.jplayer.js"></script>
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/jplayer.js/'?>jplayer.playlist.min.js"></script>
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/jplayer.js/'?>jquery.jplayer.inspector.js"></script>
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/'?>dropdown/dropdown_1.js"></script>
        <script type="text/javascript" src="<?php echo app_base_url('assets/tiny_mce/jquery.tinymce.js')?>"></script>
        <script type="text/javascript" src="<?php echo app_base_url().'/assets/'?>validate.js"></script>
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
            $(document).ready(function() {
                $('textarea.tinymce').tinymce({
                    // Location of TinyMCE script
                    script_url : '<?php echo app_base_url('assets/tiny_mce/tiny_mce.js')?>',

                    // General options
                    theme : "advanced",
                    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

                    // Theme options
                    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                    theme_advanced_buttons2 : "cut,copy,paste,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,code,preview,|,forecolor,backcolor",
                    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,image,advhr,|,print,|,ltr,rtl,|,fullscreen",
                    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
                    theme_advanced_toolbar_location : "top",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_statusbar_location : "bottom",
                    theme_advanced_resizing : true,

                    // Example content CSS (should be your site CSS)
                    content_css : "<?php echo app_base_url('assets/css/content.css')?>",

                    // Drop lists for link/image/media/template dialogs
//                    template_external_list_url : "lists/template_list.js",
//                    external_link_list_url : "lists/link_list.js",
//                    external_image_list_url : "lists/image_list.js",
//                    media_external_list_url : "lists/media_list.js",

                    // Replace values for the template plugin
                    template_replace_values : {
                        username : "Some User",
                        staffid : "991234"
                    }
                });
            });
        </script>