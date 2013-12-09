
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Website E-commerce</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="default.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="dropdown/dropdown_1.css" type="text/css" />
        <script type="text/javascript" src="dropdown/dropdown_1.js"></script>
    </head>
    <body>
        <!-- start header -->
        <div id="header">
            <div class="login-holder">
                <form name="login" enctype="" action="salam.php" method="post">
                    <label class="email-holder">
                        <input name="email" placeholder="Email" type="text">
                    </label>
                    <input name="password" placeholder="Password" type="password">
                    <input value="Login" type="submit">
                </form>
                <div class="options">
                    <a href="FormMember.php">Daftar Member</a>||<a href="" target="_blank">Lupa Password</a>
                </div>
            </div>
            <div id="logo">
                <h1><a href="#">E-COMMERCE PENJUALAN PRODUK </a></h1>
                <div id="flags-holder">
                </div>
            </div>
            <div class="search-holder">
                 <input type="text" /> <button>Search</button>
             </div>

            <div id="menu">
                <ul>
                    <li class=""><a href="index.html" accesskey="1" title="">Home</a></li>
                    <li>
                        <!--                        <a href="#" rel="dropMenu1"accesskey="2" title="">Produk</a>-->
                        <dl class="dropdown">
                            <dt id="one-ddheader" onmouseover="ddMenu('one',1)" onmouseout="ddMenu('one',-1)"><a href="#" rel="dropMenu1"accesskey="2" title="">Product</a></dt>
                            <dd id="one-ddcontent" onmouseover="cancelHide('one')" onmouseout="ddMenu('one',-1)">
                                <ul>
                                    <li><a href="HalamanFashion.php" class="underline">Fashion</a></li>
                                    <li><a href="HalamanElektronik.php" class="underline">Electronic</a></li>
                                    <li><a href="HalamanProperti.php" class="underline">Properti</a></li>
                                    <li><a href="#" class="underline">Garage Sale</a></li>
                                   
                                </ul>
                            </dd>
                        </dl>

                    </li>
                    <li>
                        <dl class="dropdown">
                            <dt id="two-ddheader" onmouseover="ddMenu('two',1)" onmouseout="ddMenu('two',-1)"><a href="#" rel="dropMenu2"accesskey="3" title="">Shop</a></dt>
                            <dd id="two-ddcontent" onmouseover="cancelHide('two')" onmouseout="ddMenu('two',-1)">
                                <ul>
                                    <li><a href="HalamanBuy.php" class="underline">Buy</a></li>
                                    <li><a href="#" class="underline">Chart</a></li>
                                    <li><a href="#" class="underline">Best Seller</a></li>
                                    <li><a href="#" class="underline">New Arrival</a></li>

                                </ul>
                            </dd>
                        </dl>
                    </li>
                    <li><a href="#" accesskey="4" title="">About</a></li>
                    <li>
                        <dl class="dropdown">
                            <dt id="three-ddheader" onmouseover="ddMenu('three',1)" onmouseout="ddMenu('three',-1)"><a href="#" rel="dropMenu3"accesskey="5" title="">Contact</a></dt>
                            <dd id="three-ddcontent" onmouseover="cancelHide('three')" onmouseout="ddMenu('three',-1)">
                                <ul>
                                    <li><a target="_blank" href=http://www.facebook.com><span><img border="0" src="images/facebook.jpg" width="30" height="30" alt="" title=""></span></a></li>
                                    <li><a target="_blank" href=http://www.twitter.com><span><img border="0" src="images/twitter.jpg" width="30" height="30" alt="" title=""></span></a></li>
                                    <li><a target="_blank" href=http://www.blogspot.com><span><img border="0" src="images/blog.jpg" width="30" height="30" alt="" title=""></span></a></li>
                                    <li><a target="_blank" href=http://www.google.com/talk/><span><img border="0" src="images/gtalk.gif" width="30" height="30" alt="" title=""></span></a></li>
                        </div>

                                </ul>
                            </dd>
                        </dl>

                </ul>
            </div>
        </div>

        <!--  1st drop down menu-->
        <!-- <div id = "dropMenu1" class = "dropmenudiv">
          <a href="#"><span>Fashion</span></a>
         <a href="#"><span>Electronic</span></a>
         <a href="#"><span>Properti</span></a>
         <a href="#"><span>Garage Sale</span></a>
         </div>


        <!--        2nd drop down menu-->
        <!-- <div id = "dropMenu2" class = "dropmenudiv" style = "width: 100px;">
         <a href="#"><span>Foto</span></a>
         <a href="#"><span>Video</span></a>

         </div>

        <!--        3nd drop down menu-->
        <!--  <div id = "dropMenu3" class = "dropmenudiv" style = "width: 100px;">
          <a target="_blank" href=http://www.facebook.com><span><img border="0" src="images/facebook.jpg" width="30" height="30" alt="" title=""></span></a>
          <a target="_blank" href=http://www.twitter.com><span><img border="0" src="images/twitter.jpg" width="30" height="30" alt="" title=""></span></a>
          <a target="_blank" href=http://www.blogspot.com><span><img border="0" src="images/blog.jpg" width="30" height="30" alt="" title=""></span></a>
          <a target="_blank" href=http://www.google.com/talk/><span><img border="0" src="images/gtalk.gif" width="30" height="30" alt="" title=""></span></a>
          </div>

   <script type = "text/javascript">

          cssdropdown.startchrome("chromemenu")

          </script>

                  </td>
          </tr>


                           </body>

                           </html>-->
        <?php
        /*
         * To change this template, choose Tools | Templates
         * and open the template in the editor.
         */
        ?>
