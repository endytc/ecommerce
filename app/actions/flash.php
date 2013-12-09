


<!--jquery include for fadetop-->
<script type="text/javascript" src="js/FixedFadeOutMenu/jquery-1.3.2.js"></script>




<!--Java Script include for fadetop-->
<script type="text/javascript">
    $(function() {
        $(window).scroll(function(){
            var scrollTop = $(window).scrollTop();
            if(scrollTop != 0)
                $('#nav').stop().animate({'opacity':'0.2'},400);
            else
                $('#nav').stop().animate({'opacity':'1'},400);
        });

        $('#nav').hover(
        function (e) {
            var scrollTop = $(window).scrollTop();
            if(scrollTop != 0){
                $('#nav').stop().animate({'opacity':'1'},400);
            }
        },
        function (e) {
            var scrollTop = $(window).scrollTop();
            if(scrollTop != 0){
                $('#nav').stop().animate({'opacity':'0.2'},400);
            }
        }
    );
    });
</script>

<script type="text/javascript" src="js/popuplogin/jquery.form.js"></script>
<script src="js/popuplogin/facebox/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".contimage").hover(function() {
            $(this).animate({
                opacity:1
            },200);
        }, function() {
            $(this).animate({
                opacity:0.8
            },200);
        });
        $('#submitform').ajaxForm({
            target: '#error',
            success: function() {
                $('#error').fadeIn('slow');
            }
        });
        $('a[rel*=facebox]').facebox()
    });
</script>

<!--Java Script include for availability-->
<script src="js/availability/settings.js" type="text/javascript"></script>
<SCRIPT type="text/javascript">
    pic1 = new Image(16, 16);
    pic1.src = "js/availability/loader.gif";

    $(document).ready(function(){

        $("#username").change(function() {

            var usr = $("#username").val();

            if(usr.length >= 6)
            {
                $("#status").html('<img src="js/availability/loader.gif" align="absmiddle">&nbsp;Checking availability...');

                $.ajax({
                    type: "POST",
                    url: "v/check.php",
                    data: "username="+ usr,
                    success: function(msg){

                        $("#status").ajaxComplete(function(event, request, settings){

                            if(msg == 'OK')
                            {
                                $("#username").removeClass('object_error'); // if necessary
                                $("#username").addClass("object_ok");
                                $(this).html('&nbsp;<img src="js/availability/accepted.png" align="absmiddle"> <font color="Green"> Available </font>  ');
                            }
                            else
                            {
                                $("#username").removeClass('object_ok'); // if necessary
                                $("#username").addClass("object_error");
                                $(this).html(msg);
                            }

                        });

                    }

                });

            }
            else
            {
                $("#status").html('<font color="red">&nbsp;username <strong>6</strong> characters minimun.</font>');
                $("#username").removeClass('object_ok'); // if necessary
                $("#username").addClass("object_error");
            }

        });

    });

    //-->
</SCRIPT>

<!--Java Script include for validity-->
<script src="js/validity/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">

    $().ready(function() {

        // validate signup form on keyup and submit
        $("#frmpeople").validate({
            rules: {
                nama: "required",
                tgl1: "required",
                bln1: "required",
                thn1: "required",
                alamat: "required",
                kota: "required",
                negara: "required",
                kodepos: "required",
                telp: "required",
                password: {
                    required: true,
                    minlength: 6
                },
                password2: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                nama: " <font color='red'>Masukkan nama lengkap anda!</font>",
                tgl1: " <font color='red'>Masukkan tanggal lahir anda!</font>",
                bln1: " <font color='red'>Masukkan bulan lahir anda!</font>",
                thn1: " <font color='red'>Masukkan tahun lahir anda!</font>",
                alamat: " <font color='red'>Masukkan alamat lengkap anda!</font>",
                kota: " <font color='red'>Masukkan nama kota anda!</font>",
                negara: " <font color='red'>Masukkan nama negara anda!</font>",
                kodepos: " <font color='red'>Masukkan kode pos anda!</font>",
                telp: " <font color='red'>Masukkan nomor telepon anda!</font>",
                password: {
                    required: " <font color='red'>Password belum diisi.</font>",
                    minlength: " <font color='red'>Password minimal 6 karakter.</font>"
                },
                password2: {
                    required: " <font color='red'>Masukkan konfirmasi password.</font>",
                    minlength: " <font color='red'>Konfirmasi password minimal 6 karakter.</font>",
                    equalTo: " <font color='red'>Password dan konfirmasi tidak cocok.</font>"
                },
                email: " <font color='red'>&nbsp;Masukkan alamat email anda dengan benar.</font>"
            }
        });

    });
</script>

<!--Java Script include for tooltip-->
<script src="js/tooltip/main.js" type="text/javascript"></script>

<!--Java Script include for Banner-->
<script type="text/javascript" src="js/navfade/jquery_002.js"></script>
<script type="text/javascript">
    $(function() {

        $("#showcase_right").showcase({
            animation: { type: "fade" },
            titleBar: { autoHide: false },
            navigator: { autoHide: true }
        });

        SyntaxHighlighter.all();
    });
</script>

<!--Java Script include for innerzoom-->
<script type="text/javascript" src="js/innerzoom/main.js"></script>
<script type="text/javascript" src="js/innerzoom/animator.js"></script><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Latest | FLASHY SHOP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
        <meta name="description" content="FLASHY is an independent clothing and distro which was established in 1998. Our main product is bag, and we also provide jacket, shirt, t-shirt, wallet and accesories.
              Our speciality is customizing Bag which means that customers can bring their own design and we produce it.
              Our designs are unique and up to date, because we use a special material for our products.
              For us, customer's satisfaction is our pride." />
        <meta name="keywords" content="flashy, flashy shop bandung, distro flashy, clothing flashy, distro bandung, owlee, dress cewek, kemeja cewek, tas cantik, tas gaul, tas flashy, kickfest, dipatiukur 1, buah batu, women blazer, wallets Yudi Rinaldi"/>
        <link rel="icon" href="themes/psdstore/icons/favicon.gif" type="image/x-icon" />
        <link rel="shortcut icon" href="themes/psdstore/icons/favicon.gif" type="image/x-icon"/>
        <link rel="stylesheet" href="themes/psdstore/css/style.css" type="text/css" media="screen"/>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "54e24d14-8007-4f55-8002-2fbc8798541e"}); </script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-35072677-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    </head>

    <body background="filebox/bground/" bgcolor="#FFFFFF" style="background-position:top center; background-attachment:fixed;">
        <div id="nav">
            <div id="reference">
                <div id="wrapper_sekunder">
                    <div id="searchin_box">
                        <div id="search">
                            <div id="search_content">
                                <form action="main.php?v=search_result" method="post" name="frmcari" id="frmcari">
                                    <input type="text" name="cari" value="Product Name" id="search_field" onblur="if(this.value=='') this.value='Product Name';" onFocus="if(this.value=='Product Name') this.value='';" />
                                    <input type="submit" name="tb_cari" value="GO" id="search_button" />
                                </form>
                            </div>
                        </div>                    </div>
                    <div id="jejaring_box">
                        <a href="http://www.facebook.com/pages/FLASHY/73772128134"><img src="filebox/jejaring/cln20110420112217.jpg" border="0" id="jejaringlogo"></a>
                        </a>
                        <a href="http://twitter.com/#!/flashy_shop"><img src="filebox/jejaring/cln20110420112340.jpg" border="0" id="jejaringlogo"></a>
                        </a>
                    </div>
                    <div id="member_box">

                        <div id="cart_blok">
                            <img src="themes/psdstore/icons/carticon.gif" title="Cart" alt="Cart" />
                            <a href="main.php?v=cart" class="keranjang">Empty</a>					</div>


                        <div id="member_blok">
                            <a href="v/login.php" rel="facebox">Login</a> |
                            <a href="registration.html">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper_utama">
            <div id="boxz">
                <div id="logo"><a href="index.php"><img src="filebox/logo/logo flashy sambung 2.jpg" title="FLASHY SHOP" alt="FLASHY SHOP" /></a></div>
                <div id="top_panel">
                    <div id="menu_box">
                        <ul class='menu'><li><a href='shop.html' class=current><span>SHOP</span></a></li><li><a href='stcontent-20101215182039-HOW TO BUY.html' class=><span>HOW TO BUY</span></a></li><li><a href='stcontent-20101215181032-OFFLINE STORE.html' class=><span>OFFLINE STORE</span></a></li><li><a href='stcontent-20110411100233-ABOUT US.html' class=><span>ABOUT US</span></a></li><li><a href='contact.html' class=><span>CONTACT</span></a></li><li><a href='dblog.html' class=><span>NEWS</span></a></li></ul>                    </div>
                </div>
                <div id="content_box">
                    <div id="kiri_box">
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                            </head>
                            <body>

                                <div id="produkkat_box">
                                    <div id="produkkat_box_content">

                                        <ul class=katprod>
                                            <li class=katutama><a href=main.php?v=produk&kt=ef19664ffe76c98ff0236885e843ba6d&title=BAGS>BAGS</a>
                                                <ul class=katprod>
                                                    <li class=katsub><a href=main.php?v=produk&kt=fc2f69b33a2aad6337b41fb0ddd3fd04&title=HANDBAGS>HANDBAGS</a></li>
                                                    <li class=katsub><a href=main.php?v=produk&kt=9fc1d662fda437e509cacb1e8e98f566&title=SLING BAGS>SLING BAGS</a></li>
                                                    <li class=katsub><a href=main.php?v=produk&kt=0ad2a410ce90d094c41e341b0e54d392&title=BACKPACKS>BACKPACKS</a></li>
                                                    <li class=katsub><a href=main.php?v=produk&kt=363fc27cc7c4439c178b6508e6176e14&title=SHOULDER BAGS>SHOULDER BAGS</a></li>
                                                    <li class=katsub><a href=main.php?v=produk&kt=6a9255d24f23be79d336ab0e6ca0f79b&title=SPECIAL BAGS>SPECIAL BAGS</a></li>
                                                </ul>
                                            </li>
                                            <li class=katutama><a href=main.php?v=produk&kt=e2640bcac4754ba72c0ddd8840697f9d&title=TOPS>TOPS</a>
                                                <ul class=katprod>
                                                    <li class=katsub><a href=main.php?v=produk&kt=abe7775a3ea8bbab3a54ba6b54641842&title=TEES>TEES</a></li>
                                                    <li class=katsub><a href=main.php?v=produk&kt=99b017f4523ab2e25892548f93ecea7e&title=BLOUSES & SHIRTS>BLOUSES & SHIRTS</a></li>
                                                </ul>
                                            </li>
                                            <li class=katutama><a href=main.php?v=produk&kt=6ad75b1212970842e1223fb3ef6e2d55&title=WALLETS>WALLETS</a></li>
                                            <li class=katutama><a href=main.php?v=produk&kt=c371d3e857e66389e078f2977d037607&title=JACKETS>JACKETS</a></li>
                                            <li class=katutama><a href=main.php?v=produk&kt=15fa1fbba154c1f055f8d646fc51143f&title=BLAZERS>BLAZERS</a></li>
                                            <li class=katutama><a href=main.php?v=produk&kt=a8e35c2e518dc3598b6808b3fb81f646&title=SWEATERS & CARDIGANS>SWEATERS & CARDIGANS</a></li>
                                            <li class=katutama><a href=main.php?v=produk&kt=38d31a7925595d6aeb374845462089e4&title=BOTTOMS>BOTTOMS</a>
                                                <ul class=katprod>
                                                    <li class=katsub><a href=main.php?v=produk&kt=a93cc3d8e4008adac3d33db28d52602d&title=SKIRT >SKIRT </a></li>
                                                    <li class=katsub><a href=main.php?v=produk&kt=1f8cbc7abe2d46a6c6dab6853f5e5abd&title=PANTS>PANTS</a></li>
                                                </ul>
                                            </li>
                                            <li class=katutama><a href=main.php?v=produk&kt=caa87eeecc63421e5cbe02c8c0c298bd&title=ACCESSORIES>ACCESSORIES</a>
                                                <ul class=katprod>
                                                    <li class=katsub><a href=main.php?v=produk&kt=169806a2d8e072cbe24c3fd5cf2ffd05&title=POUCHES>POUCHES</a></li>
                                                    <li class=katsub><a href=main.php?v=produk&kt=d7ef8c9e43f9d14bd611ea12563e7496&title=KEY CHAINS>KEY CHAINS</a></li>
                                                </ul>
                                            </li>
                                            <li class=katutama><a href=main.php?v=produk&kt=1e2edc8bceb18ed18963e192075d89ca&title=OWLEE KIDS>OWLEE KIDS</a></li>
                                            <li class=katutama><a href=main.php?v=produk&kt=6efd35c10ae99f95403558f4d5b6897a&title=DESIGNERS>DESIGNERS</a>
                                                <ul class=katprod>
                                                    <li class=katsub><a href=main.php?v=produk&kt=a9d0d2c085f9296c47808e0bb7438517&title=BYCATCH>BYCATCH</a></li>
                                                </ul>
                                            </li>
                                        </ul>	</div>
                                </div>

                            </body>
                        </html>          <div id="tinyline_box"></div>
                        <div id="olchat_content">
                            <table border="0" cellpadding="0" cellspacing="0" class="tabelolchat">
                                <tr>
                                    <td align="center">
                                        <a href="ymsgr:sendim?flashy_s" title="flashy_s"><img src="filebox/olchat/offline.jpg" alt="flashy_s" /></a>               	</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div id="kanan_box">

                        <div id="product_box_wrapper">
                            <div id="product_box">



                                <div id="panel_status_wrapper"><div id="panel_status">Latest BAGS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="balsamia-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131104022433.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    BALSAMIA                        </h3>
                                                <div class="harga01">IDR 185000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFF00"></td>
                                                        <td bgcolor="#FF0000"></td>
                                                        <td bgcolor="#000000"></td>
                                                        <td bgcolor="#964B00"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="wools-up-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131104020746.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    WOOLS UP                        </h3>
                                                <div class="harga01">IDR 195000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#808080"></td>
                                                        <td bgcolor="#0000ff"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="zinnia--produk.html"><img src="filebox/produk/thumbs/thumb_pro20131101233826.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    ZINNIA                         </h3>
                                                <div class="harga01">IDR 195000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#009b10"></td>
                                                        <td bgcolor="#B5651D"></td>
                                                        <td bgcolor="#000000"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest TOPS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="eyelashes-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131120224933.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    EYELASHES                        </h3>
                                                <div class="harga01">IDR 120000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="london-stripes-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131120224313.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    LONDON STRIPES                        </h3>
                                                <div class="harga01">IDR 120000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#009b10"></td>
                                                        <td bgcolor="#FF0000"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="rustic-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131120223757.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    RUSTIC                        </h3>
                                                <div class="harga01">IDR 120000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest WALLETS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="estrella-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131104030007.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    ESTRELLA                        </h3>
                                                <div class="harga01">IDR 110000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#000000"></td>
                                                        <td bgcolor="#b200b2"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="smartshy-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131104025259.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    SMARTSHY                        </h3>
                                                <div class="harga01">IDR 120000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#009b10"></td>
                                                        <td bgcolor="#B5651D"></td>
                                                        <td bgcolor="#654321"></td>
                                                        <td bgcolor="#000000"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="circus-tent--produk.html"><img src="filebox/produk/thumbs/thumb_pro20131021222454.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    CIRCUS TENT                         </h3>
                                                <div class="harga01">IDR 100000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFF00"></td>
                                                        <td bgcolor="#013220"></td>
                                                        <td bgcolor="#ffd8d7"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest JACKETS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="cheshire-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130720021626.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    CHESHIRE                        </h3>
                                                <div class="harga01">IDR 190000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#808080"></td>
                                                        <td bgcolor="#ffd8d7"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="maine-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130418212933.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    MAINE                        </h3>
                                                <div class="harga01">IDR 210000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FF0000"></td>
                                                        <td bgcolor="#808080"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="freeze-heart-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130409031238.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    FREEZE HEART                        </h3>
                                                <div class="harga01">IDR 220000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest BLAZERS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="gladest-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130302032649.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    GLADEST                        </h3>
                                                <div class="harga01">IDR 225000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">

                                                <div id="soldout"></div>
                                                <a class="detail" href="carribean-produk.html"><img src="filebox/produk/thumbs/thumb_pro20121011115032.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    CARRIBEAN                        </h3>
                                                <div class="harga01">IDR 210000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="roony-produk.html"><img src="filebox/produk/thumbs/thumb_pro20111212112459.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    ROONY                        </h3>
                                                <div class="harga01">IDR 250000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#800000"></td>
                                                        <td bgcolor="#000000"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest SWEATERS & CARDIGANS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="cyborg-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131021223402.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    CYBORG                        </h3>
                                                <div class="harga01">IDR 150000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#654321"></td>
                                                        <td bgcolor="#808080"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="warsaw-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130927225033.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    WARSAW                        </h3>
                                                <div class="harga01">IDR 155000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#b200b2"></td>
                                                        <td bgcolor="#0000ff"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="honey-furstar-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130911002224.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    HONEY FURSTAR                        </h3>
                                                <div class="harga01">IDR 230000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest BOTTOMS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="chocochill--produk.html"><img src="filebox/produk/thumbs/thumb_pro20130930050108.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    CHOCOCHILL                         </h3>
                                                <div class="harga01">IDR 140000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#D3D3D3"></td>
                                                        <td bgcolor="#696969"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="koln-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130930045459.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    KOLN                        </h3>
                                                <div class="harga01">IDR 180000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="aniva-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130701221336.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    ANIVA                        </h3>
                                                <div class="harga01">IDR 135000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest ACCESSORIES</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="minky-pouch-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131104024455.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    MINKY POUCH                        </h3>
                                                <div class="harga01">IDR 45000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#009b10"></td>
                                                        <td bgcolor="#0000ff"></td>
                                                        <td bgcolor="#5b004f"></td>
                                                        <td bgcolor="#DCD0FF"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="picolla-produk.html"><img src="filebox/produk/thumbs/thumb_pro20131104024036.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    PICOLLA                        </h3>
                                                <div class="harga01">IDR 45000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#009b10"></td>
                                                        <td bgcolor="#000000"></td>
                                                        <td bgcolor="#964B00"></td>
                                                        <td bgcolor="#FFA500"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">

                                                <div id="soldout"></div>
                                                <a class="detail" href="sitka-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130913051437.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    SITKA                        </h3>
                                                <div class="harga01">IDR 35000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#000000"></td>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest OWLEE KIDS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="oleth-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130708030917.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    OLETH                        </h3>
                                                <div class="harga01">IDR 65000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#0000ff"></td>
                                                        <td bgcolor="#ffd8d7"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="callum-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130708030023.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    CALLUM                        </h3>
                                                <div class="harga01">IDR 65000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#00008B"></td>
                                                        <td bgcolor="#964B00"></td>
                                                        <td bgcolor="#ADD8E6"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="meoow-kids-produk.html"><img src="filebox/produk/thumbs/thumb_pro20130708025634.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    ME-OOW KIDS                        </h3>
                                                <div class="harga01">IDR 65000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#000000"></td>
                                                        <td bgcolor="#808080"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>



                                <div id="panel_status_wrapper"><div id="panel_status">Latest DESIGNERS</div></div>
                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tr><td>

                                            <div id="produkkartu">


                                                <a class="detail" href="juvenile-fish--produk.html"><img src="filebox/produk/thumbs/thumb_pro20120809084054.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    JUVENILE FISH                         </h3>
                                                <div class="harga01">IDR 175000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#00008B"></td>
                                                        <td bgcolor="#fffaeb"></td>
                                                        <td bgcolor="#ffd8d7"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="seabirds-produk.html"><img src="filebox/produk/thumbs/thumb_pro20120807081915.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    SEABIRDS                        </h3>
                                                <div class="harga01">IDR 210000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#000000"></td>
                                                        <td bgcolor="#808080"></td>
                                                        <td bgcolor="#b200b2"></td>
                                                    </tr>
                                                </table>


                                            </div>

                                            <div id="produkkartu">


                                                <a class="detail" href="marine-turtles-produk.html"><img src="filebox/produk/thumbs/thumb_pro20120807075655.jpg" class="thumbnail"></a>
                                                <h3 id="grid_title">
                                                    MARINE TURTLES                        </h3>
                                                <div class="harga01">IDR 245000</div>



                                                <table align="right" class="belistokwarnaukuran" cellpadding="5" cellspacing="1">
                                                    <tr>
                                                        <td bgcolor="#FFFFFF"></td>
                                                    </tr>
                                                </table>


                                            </div>
                                        </td></tr></table>

                            </div>
                        </div>

                    </div>                  </div>
            </div>
            <div id="footer_menu">
            </div>
            <div id="footer_box">
                <div id="kopyright">Copyright &copy; Flashy Shop 2011 All Right Reserved.</div>
                <div id="poweredby"><a href="http://semestam2.com" target="_blank">Powered by SM2</a></div>
            </div>
            <div id="regional_box">
                <script language="JavaScript" type="text/JavaScript">
                    <!--
                    function MM_jumpMenu(targ,selObj,restore){ //v3.0
                        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
                        if (restore) selObj.selectedIndex=0;
                    }
                    //-->
                </script>
                <div>
                    <select name="regional" id="regional" onChange="MM_jumpMenu('parent',this,0)">
                        <option selected="selected" value="0">-Region-</option>
                        <option value="v/setregion.php?idreg=d14a5c756db47c05dc5e8e677de53236" selected="selected">Indonesia</option>
                    </select>
                </div>				            </div>
        </div>
    </body>
</html>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

