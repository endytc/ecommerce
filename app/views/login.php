<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
</head>

<body style="background: #d9d9d9;">
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="row-fluid">
                <div class="span12 center HeaderTitle login-header">
                    <h2>Login Admin/Operator</h2>
                </div>
            </div>

            <div class="row-fluid" >
                <div class="well span5 center login-box">
                    <div class="alert alert-info">
                        Please login with your Username and Password.
                    </div>
                    <form action='<?php echo app_base_url('login_proses') ?>' method='POST' >
                        <fieldset>
                            <div class="input-prepend" title="Username" data-rel="tooltip">
                                <span class="add-on"><i class="icon-user"></i></span>
                                <input autofocus class="input-large span10" name="username" id="username" type="text" />
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password" data-rel="tooltip">
                                <span class="add-on"><i class="icon-lock"></i></span>
                                <input class="input-large span10" name="password" id="password" type="password" value="" />
                            </div>
                            <div class="clearfix"></div>

                            <p class="center span5">
                                <button type="submit" class="btn btn-info">Login</button>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
<?php
if (isset($_SESSION['success'])) {
    echo "noticeSuccess('$_SESSION[success]')";
    unset($_SESSION['success']);
}
if (isset($_SESSION['failed'])) {
    echo "noticeFailed('$_SESSION[failed]')";
    unset($_SESSION['failed']);
}
?>
    </script>
</body>
</html>

