<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/userpanel.css?v=<?php echo time(); ?>">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <a class='main'>
            <h2>Panel Admin</h2>
        </a>
        <a class="active" href="#home">User Panel</a>
        <a href="#news">Product Panel</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <section>
            <!--for demo wrap-->
            <div class="warp">
                <h1>tabel user</h1>
                <button class="button-add">Tambah</button>

            </div>
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="resources/assets/PS5SIDE3.jpg" alt="Avatar" class="avatar"></td>
                            <td>Alex</td>
                            <td>Alex123</td>
                            <td>Alex1234@gmail.com</td>
                            <td><button class="button-delete">Hapus</button>
                                <button class="button-update">Ubah</button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="resources/assets/PS5SIDE3.jpg" alt="Avatar" class="avatar"></td>
                            <td>Alex</td>
                            <td>Alex123</td>
                            <td>Alex1234@gmail.com</td>
                            <td><button class="button-delete">Hapus</button>
                                <button class="button-update">Ubah</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td><img src="resources/assets/PS5SIDE3.jpg" alt="Avatar" class="avatar"></td>
                            <td>Alex</td>
                            <td>Alex123</td>
                            <td>Alex1234@gmail.com</td>
                            <td><button class="button-delete">Hapus</button>
                                <button class="button-update">Ubah</button>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td><img src="resources/assets/PS5SIDE3.jpg" alt="Avatar" class="avatar"></td>
                            <td>Alex</td>
                            <td>Alex123</td>
                            <td>Alex1234@gmail.com</td>
                            <td><button class="button-delete">Hapus</button>
                                <button class="button-update">Ubah</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="edit">
                <form>
                    <fieldset>
                        <legend>Masukkan Data</legend>
                        <label for="name">Username</label>
                        <input type="text" id="Username" name="user_Username">

                        <label for="Password">Password:</label>
                        <input type="text" id="Password" name="user_Password">

                        <label for="cityname">Email:</label>
                        <input type="email" id="mail" name="user_email">

                        <label for="filename">Photo:</label>
                        <input type="file" id="myFile" name="filename">
                    </fieldset>
                    <button type="submit" class="button-submit">Submit</button>
                </form>
            </div>
        </section>
    </div>
    <script src="resources/js/adminpanel.js"></script>

</body>



</html>