<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development" />
        <meta name="keywords" content="" />
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="../theme/asset/bootstrap/css/bootstrap.min.css" />        
        <link rel="stylesheet" type="text/css" href="theme/css/login-box.css" />

        <style>
            .error {
                color: #d43f3a;
            }
        </style>

        <script type="text/javascript" src="../theme/asset/js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="../theme/asset/js/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#vForm").validate({
                    rules: {
                        inputUser: "required",
                        password: "required"
                    },
                    messages: {
                        inputUser: " *) harus diisi",
                        password: " *) harus diisi"
                    },
                    submitHandler: function (form) {
                        form.submit();
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="theme/images/heart-healthy_icon_350x350.png" />
                <p id="profile-name" class="profile-name-card"> </p>
                <form class="form-signin" method="post" name="login" action="index.php" accept="#" novalidate="novalidate" id="vForm">
                    <div class="form-group input-group">
                        <label> Username</label>
                        <input name="username" type="text" id="inputUser" class="input-sm form-control" />
                    </div>
                    <div class="form-group input-group">
                        <label> Password</label>
                        <input name="password" type="password" id="inputPassword" class="input-sm form-control" />
                    </div>
                    <input type="submit" name="submitLogin" class="btn btn-sm btn-primary btn-block btn-signin" value="Login" />
                </form>	
                <br/>
                <div class="footer text-center">
                    <strong>Admin &copy; <?=date('Y')?></strong>
                </div>
            </div>
        </div>	
    </body>
</html>