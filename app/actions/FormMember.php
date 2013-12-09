<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <title>Website E-commerce</title>
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <link href="default.css" rel="stylesheet" type="text/css" media="screen" />
            <?php include "Header.php"; ?>
        </head>

        <body>

            <!-- end header -->

        <tr>
            <td width="100%" align="center">
                <table align="center"border="0" width="950" cellspacing="0" cellpadding="0">

          <!--  <tr><td width="100%" valign="bottom" height="20" class="infokecil" style="font-size: 11">Identitas Member</td></tr>-->
                    <tr><td width="100%">
                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="705" valign="top">
                                        <table border="0" width="60%" cellspacing="1" cellpadding="2">
                                            <form action="prosesBukuTamu.php" method="post">
                                                <tr><td width="100%" valign="bottom" height="40" class="judulberita_deskripsi" style="font-size: 18;color: #cc6600">Identitas Member</td></tr>

                                                <tr></tr><tr></tr>
                                                <tr>
                                                    <td width="100">Nama       </td>
                                                    <td width="150"><input name="nama" type="text" ></td>
                                                </tr>
                                                <tr>
                                                    <td width="100">Tempat & Tanggal Lahir      </td>
                                                    <td width="150"><input name="email" type="text" ></td>
                                                </tr>
                                                <tr>
                                                    <td width="100">Telepon/Handphone      </td>
                                                    <td width="150"><input name="hp" type="text" ></td>
                                                </tr>
                                                <tr>
                                                    <td width="100">Alamat      </td>
                                                    <td width="150"><input name="email" type="text" ></td>
                                                </tr>
                                                <tr>
                                                    <td width="100">Email      </td>
                                                    <td width="150"><input name="email" type="text" ></td>
                                                </tr>

                                                <td width="100" >Jenis Kelamin    </td>
                                                <td>
                                                    <input type="radio" value="P" checked name="sex">wanita
                                                    <input type="radio" value="L"  name="sex">pria
                                                </td>

                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <align="center">
                                                        <input type="submit" name="proses" value="Submit">
                                                        <align="center">
                                                        <input type="reset" name="reset" value="Cancel">
                                                    </td>

                                                    </tr>
                                            </form>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <?php
                            // put your code here
                            ?>
                            </body>
                            </html>
