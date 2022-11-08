<?php
$db = mysqli_connect("localhost", "root", "", "playstation-game-store");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) $rows[] = $row;
    return $rows;
}

function update($data){
    global $db;
    $id = htmlspecialchars($data["id"]);
    $username = htmlspecialchars($data["user"]);
    $password = htmlspecialchars($data["pass"]);
    $photo = upload();
    $samePhoto = htmlspecialchars($data["samePhoto"]);

    if ($_FILES['photo']['error'] === 4) $photo =  $samePhoto;
    $result = $db->query("SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1){
        $rows = mysqli_fetch_assoc($result);
        if (password_verify($password, $rows["password"])) {
            mysqli_query($db, "UPDATE users SET username = '$username', photo = '$photo' WHERE id = '$id'");
            return (mysqli_affected_rows($db));
        } else {
            echo "<script> alert('Confirmation password different.'); </script>";
            return false;
        }
    }
}

function delete($id){
    global $db;
    mysqli_query($db, "DELETE FROM users WHERE id = $id");
    return (mysqli_affected_rows($db));
}

function upload(){
    $nameFile = $_FILES["photo"]["name"];
    $sizeFile = $_FILES["photo"]["size"];
    // $errorFile = $_FILES["photo"]["error"];
    $temporaryFile = $_FILES["photo"]["tmp_name"];
    
    $validFileExt = ['jpg', 'jpeg', 'png'];
    $imgExt = explode('.', $nameFile);
    $imgExt = strtolower(end($imgExt));
    if (in_array($imgExt, $validFileExt) === False){
        echo "<script> alert('Uploaded file is not supported.'); </script>";
        return false;
    }
    if ($sizeFile > 2000000){
        echo " <script> alert('File size exceeded, please upload file < 20 MB.'); </script>"; 
        return false;
    }
    date_default_timezone_set('Asia/Makassar');
    $newFileName = date('m-d-Y h-i-s a', time());
    $newFileName .= '.';
    $newFileName .= $imgExt;
    
    move_uploaded_file($temporaryFile, 'img/' . $newFileName);
    return $newFileName;
}

function register($data){
    global $db;
    $photo = upload();
    if (!$photo) return false;
    $username = strtolower(stripslashes($data["user"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($db, $data["pass"]);
    $confirm_password = mysqli_real_escape_string($db, $data["cpass"]);
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script> alert('User found. Please use another username.'); </script>";
        return false;
    };
    if ($password !== $confirm_password) {
        echo "<script> alert('Confirmation password different.'); </script>";
        return false;
    };
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($db, "INSERT INTO users (username, password, email, photo) VALUES ('$username', '$password_hashed', '$email', '$photo')");
    return (mysqli_affected_rows($db));
};