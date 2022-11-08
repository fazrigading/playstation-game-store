<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/LoginStyle.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="container-header">
        <ul>
            <li class='sign-in'>
                Sign In
            </li>
            <li>
                Sign Up
            </li>
            <li>
                Home
            </li>
        </ul>
    </div>

    <main>
    <div class ="main-container">

    <div class ="left-container">
        <div class="left-image"></div>
    </div>

    <div class ="right-container">
        <div class="right-content">
            <h2>
                Toko videogame terlengkap <br>dan termurah
            </h2>
            <form>
                <!-- INPUT USERNAME  -->
                <label for="fname">Username</label><br>
                <input type="text" id="username" name="username"><br><br>

                <!-- INPUT PASSWORD  -->
                <label for="fname">Password</label><br>
                <input type="password" id="password" name="password"><br>
            </form>

            <button id="Sign-in">Sign in to my account</button><br>
            <button id="Sign-Up">Sign Up</button>

        </div>
    </div>
    </div>
    </main>

   

    <script src="resources/js/LoginStyle.js"></script>
</body>
</html>