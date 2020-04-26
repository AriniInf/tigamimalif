<!DOCTYPE html>
<html lang="en ">

<head>
    <meta charset="UTF-8 ">
    <meta name="viewport " content="width=device-width, initial-scale=1.0 ">
    <meta http-equiv="X-UA-Compatible " content="ie=edge ">
    <title>TigaMimAlif</title>

    <!-- Font Icon -->
    <link rel="stylesheet " href="../assets/login/fonts/material-icon/css/material-design-iconic-font.min.css ">

    <!-- Main css -->
    <link rel="stylesheet " href="../assets/login/css/style.css ">
</head>

<body>
    <div class="main ">
        <!-- Sing in  Form -->
        <section class="sign-in ">
            <div class="container ">
                <div class="signin-content ">
                    <div class="signin-image ">
                        <figure><img src="../assets/login/images/3 Mim Alif Transparan.png " alt="sing up image "></figure>
                        <a href="/" class="signup-image-link ">already a member</a>
                    </div>

                    <div class="signin-form ">
                        <h2 class="form-title ">Register</h2>
                        <form method="POST" class="data-form" action="/store-register">
                            <div class="form-group ">
                                <label for="username "><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" required/>
                            </div>
                            <div class="form-group ">
                                <label for="nama "><i class="zmdi zmdi-account-circle material-icons-name "></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Nama " required/>
                            </div>
                            <div class="form-group ">
                                <label for="email "><i class="zmdi zmdi-email material-icons-name "></i></label>
                                <input type="email " name="email" id="email" placeholder="Email " required/>
                            </div>
                            <div class="form-group ">
                                <label for="usia "><i class="zmdi zmdi-face material-icons-name "></i></label>

                                <input type="text" name="usia" id="usia" placeholder="Usia " required/>
                            </div>
                            <div class="form-group ">
                                <label for="alamat "><i class="zmdi zmdi-home material-icons-name"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Alamat" required/>
                            </div>

                            <div class="form-group ">
                                <label for="password"><i class="zmdi zmdi-lock "></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>
                            <p id='message'></p>
                            <div class="form-group ">

                                <label for="password"><i class="zmdi zmdi-lock-outline "></i></label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Register" disabled="true" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- JS -->
    <script src="../assets/login/vendor/jquery/jquery.min.js "></script>
    <script src="../assets/login/js/main.js "></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('#confirm_password').on('keyup', function() {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Matching').css('color', 'green');
                $('#signin').prop('disabled', false);
            } else {
                $('#signin').prop('disabled', true);
                $('#message').html('Not Matching').css('color', 'red');
            }
        });
    </script>
</body>

</html>