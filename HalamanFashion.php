<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Website E-commerce</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="default.css" rel="stylesheet" type="text/css" media="screen" />
        <?php include "Header.php"; ?>

        <style type="text/css">
            .myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:18px; }
            .myOtherTable th { background-color:#C28C21;color:white;width:50%; }
            .myOtherTable td, .myOtherTable th { padding:5px;border:0; }
            .myOtherTable td { border-bottom:1px dotted #C28C21; }
            .myOtherTable a{padding:0px; background:#FFFFE; color:black}
        </style>
    </head>
    <body>
        <div id="sidebarFashion">
            <ul>
                <li>
                    <h2>Categories</h2>
                    <ul>
                        <table class="myOtherTable">
                            <tr>
                                <th>Fashion Wanita</th>
                            </tr>
                            <td><li><a href="#">Pakaian</a> </li>
                                <li> <a href="#">Cosmetic</a> </li>
                                <li> <a href="#">tas</a> </li>
                                <li> <a href="#">sepatu</a> </li>
                                <li> <a href="#">aksesoris</a> </li>
                            </td>
                            </tr>
                            <tr>
                                <th>Fashion Pria</th>
                            </tr>
                            <td><li><a href="#">Pakaian</a> </li>
                                <li> <a href="#">Cosmetic</a> </li>
                                <li> <a href="#">tas</a> </li>
                                <li> <a href="#">sepatu</a> </li>
                                <li> <a href="#">aksesoris</a> </li>
                            </td>
                            </tr>
                        </table>

                </li>
            </ul>
        </div>

        <div id="page">
            <!-- start content -->
            <div id="content fashion">
                <ul class="vProductItems cycle-slideshow vertical clearfix"
					    data-cycle-fx="carousel"
					    data-cycle-timeout=0
					    data-cycle-slides="> li"
					    data-cycle-next=".vPrev"
					    data-cycle-prev=".vNext"
					    data-cycle-carousel-visible="2"
					    data-cycle-carousel-vertical="true"
					    >
							<li class="span4 clearfix">
								<div class="thumbImage">
									<a href="#"><img src="img/92x92.jpg" alt=""></a>
								</div>
								<div class="thumbSetting">
									<div class="thumbTitle">
										<a href="#" class="invarseColor">
											Foliomania the title here
										</a>
									</div>
									<div class="thumbPrice">
										<span>$150.00</span>
									</div>
									<ul class="rating">
										<li><i class="star-off"></i></li>
										<li><i class="star-off"></i></li>
										<li><i class="star-off"></i></li>
										<li><i class="star-off"></i></li>
										<li><i class="star-off"></i></li>
									</ul>
								</div>
							</li>
                </ul>
            </div>
    </body>
</html>