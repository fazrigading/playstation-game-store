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
    $name = htmlspecialchars($data["name"]);
    $username = htmlspecialchars($data["username"]);

    $query = "UPDATE users SET name = '$name', username = '$username' WHERE id = '$id'";
    mysqli_query($db, $query);
    return (mysqli_affected_rows($db));
}

function delete($id){
    global $db;
    $query = "DELETE FROM users WHERE id = $id";
    mysqli_query($db, $query);
    return (mysqli_affected_rows($db));
}

function register($data){
    global $db;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $confirm_password = mysqli_real_escape_string($db, $data["confirm_password"]);
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username telah digunakan, mohon gunakan username lainnya!')
        </script>";
        return false;
    } 
    if ($password !== $confirm_password) {
        echo "<script>
            alert('Password tidak sama!')   
        </script>";
        return false;
    };

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($db, "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')");
    return (mysqli_affected_rows($db));
};