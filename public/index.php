<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../views/css/form.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Zonks</title>
</head>

<body>
    <div class="hero">
        <div class="form-box" style="margin-top: 10px;">
            <!-- Box_Button -->
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()" id="loginBtn">Log In</button>

                <button type="button" class="toggle-btn" onclick="register()" id="registerBtn">register</button>
            </div>
            <!-- ============= login-Form ============= -->
            <form class="input-group" id="login" action="../controller/login.php" method="POST">
                <input type="text" id="usernameIpt" class="input-field" name="user" placeholder="username" required>
                <input type="password" id="passIpt" class="input-field" name="password" placeholder="password" required>
                <a href="#">Esqueci minha senha</a>
                <br>
                <button type="submit" class="submit-btn">Log In</button>
            </form>
            <!-- TODO: formate a tela inicial -->
            <!-- =========== Register-form ============ -->
            <form class="input-group" id="register" action="../controller/register.php" method="POST">
                <input type="text" class="input-field" placeholder="username" name="user" required>
                <input type="email" class="input-field" placeholder="email" name="email" required>
                <input type="password" id="passRegister" class="input-field" placeholder="password" name="password" required>
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>

    <script type="module" src="../views/js/main.js"></script>

</body>

</html>