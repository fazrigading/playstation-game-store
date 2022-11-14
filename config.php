<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$db = mysqli_connect("localhost", "root", "", "playstation-game-store");

function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) $rows[] = $row;
    return $rows;
}

// Session and Cookie Start
// ----------------------------------------------------------------
function cookieCheck() {
    global $db;
    if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];
        
        $result = mysqli_query($db, "SELECT username FROM users WHERE id = $id");
        $rows = mysqli_fetch_assoc($result);
        if ($rows['username'] == 'admin') {
            if ($key === hash('sha256', $rows['username'])){
                $_SESSION["loginAdmin"] = true;
            }
        } else if ($key === hash('sha256', $rows['username'])){
            $_SESSION["loginUser"] = true;
        }
    }
}

// Session and Cookie end
// ----------------------------------------------------------------
// Login and register start
function login($data) {
    global $db;
    $result = mysqli_query($db, "SELECT * FROM users");
    
        $username = mysqli_real_escape_string($db, $data["username"]); 
        $password = mysqli_real_escape_string($db, $data["password"]);
        $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
        if ( mysqli_num_rows($result) === 1 ){
            $rows = mysqli_fetch_assoc($result);
            if (password_verify($password, $rows["password"])){
                if (isset($_POST["remember"])){
                    setcookie('id', $rows["id"], time()+ 3600);
                    setcookie('key', hash('sha256', $rows["username"]), time()+ 3600);
                };
                
                if ($username == 'admin') {
                    setcookie('id', $rows["id"], time()+ 36000);
                    $_SESSION["loginAdmin"] = true;
                    header("Location: admin/products/");
                } else {
                    setcookie('id', $rows["id"], time()+ 36000);
                    $_SESSION["loginUser"] = true;
                    header("Location: index.php");
                }
                exit;
            } else {
                echo " <script>
                alert('Password yang anda masukkan salah!')
                </script>";
            }
        } else {
            echo "<script>alert('Username tidak ditemukan!')</script>";
        }
}

function register($data){
    global $db;
    // $photo = upload();
    // if (!$photo) return false;
    $name = mysqli_real_escape_string($db, $data["fullname"]);
    $username = mysqli_real_escape_string($db, $data["user"]);
    $email = mysqli_real_escape_string($db, $data["email"]);
    $password = mysqli_real_escape_string($db, $data["pass"]);
    $confirm_password = mysqli_real_escape_string($db, $data["cpass"]);
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script> alert('Username telah digunakan. Tolong gunakan username lain.'); </script>";
        return false;
    };
    if ($password !== $confirm_password) {
        echo "<script> alert('Password konfirmasi berbeda.'); </script>";
        return false;
    };
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($db, "INSERT INTO users (fullname, username, password, email) VALUES ('$name', '$username', '$password_hashed', '$email')");
    return (mysqli_affected_rows($db));
};

// Login and register end
// ----------------------------------------------------------------
// Users starts
function upload(){
    $nameFile = $_FILES["photo"]["name"];
    $sizeFile = $_FILES["photo"]["size"];
    $errorFile = $_FILES["photo"]["error"];
    $temporaryFile = $_FILES["photo"]["tmp_name"];
    
    $validFileExt = ['jpg', 'jpeg', 'png'];
    $imgExt = explode('.', $nameFile);
    $imgExt = strtolower(end($imgExt));
    if (in_array($imgExt, $validFileExt) === False){
        echo "<script> alert('Uploaded file is not supported.'); </script>";
        return false;
    }
    if ($sizeFile > 2000000){
        echo " <script> alert('File size exceeded, please upload file < 2MB.'); </script>"; 
        return false;
    }
    date_default_timezone_set('Asia/Makassar');
    $newFileName = 'IMG_' . date('mdY_his', time());
    $newFileName .= '.';
    $newFileName .= $imgExt;
    
    
    // Upload file
    $moved = move_uploaded_file($temporaryFile, SITE_ROOT . '/resources/img/' . $newFileName);

    if( !$moved ) {
        echo "Not uploaded because of error #".$errorFile;     
        exit;
    }

    return $newFileName;
}

function updateUser($data){
    global $db;
    $samePhoto = htmlspecialchars($data["samePhoto"]);
    if ($_FILES['photo']['error'] === 4){
        $photo =  $samePhoto;   
    } else {
        $photo = upload();
    }
    $id = $data["id"];
    $fullname = mysqli_escape_string($db, htmlspecialchars($data["fullname"]));
    $address = mysqli_escape_string($db, htmlspecialchars($data["address"]));
    $username = mysqli_escape_string($db, htmlspecialchars($data["user"]));
    $email = mysqli_escape_string($db, htmlspecialchars($data["email"]));
    $oldPassword = mysqli_escape_string($db, htmlspecialchars($data["oldPass"]));
    $newPassword = mysqli_escape_string($db, htmlspecialchars($data["newPass"]));
    $confirmNewPassword = mysqli_escape_string($db, htmlspecialchars($data["confirmNewPass"]));
    if ($newPassword == '') {
        $newPassword = $oldPassword;
    } else {
        if ($newPassword != $confirmNewPassword) {
            echo "<script>alert('Konfirmasi Password Salah');</script>"; 
        }
    }
    $password_hashed = password_hash($newPassword, PASSWORD_DEFAULT);
    $result = $db->query("SELECT * FROM users WHERE id = '$id'");
    if (mysqli_num_rows($result) == 1){
        $rows = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET 
            fullname = '$fullname', 
            username = '$username', 
            email = '$email', 
            password = '$password_hashed', 
            address = '$address', 
            photo = '$photo' 
            WHERE id = '$id'
            ";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }
}

function deleteUser($id){
    global $db;
    mysqli_query($db, "DELETE FROM users WHERE id = $id");
    return (mysqli_affected_rows($db));
}
// Users end
// ----------------------------------------------------------------
// Products start
function addProduct($data){
    global $db;
    $photo = upload();
    if (!$photo) return false;
    $name = mysqli_escape_string($db, $data["name"]);
    $price = mysqli_escape_string($db, $data["price"]);
    $stock = mysqli_escape_string($db, $data["stock"]);
    $descriptions = mysqli_escape_string($db, $data["descriptions"]);
    $category = mysqli_escape_string($db, $data["category"]);
    
    $query = "INSERT INTO products (
        name, 
        price, 
        photo, 
        stock, 
        descriptions, 
        category
        ) VALUES (
            '$name', 
            '$price', 
            '$photo', 
            '$stock', 
            '$descriptions', 
            '$category'
            )";
    mysqli_query($db, $query);
    return (mysqli_affected_rows($db));
};

function updateProduct($data){
    global $db;
    $samePhoto = htmlspecialchars($data["samePhoto"]);
    if ($_FILES['photo']['error'] === 4){
        $photo =  $samePhoto;   
    } else {
        $photo = upload();
    }
    $id = mysqli_escape_string($db, $data["id"]);
    $name = mysqli_escape_string($db, $data["name"]);
    $price = mysqli_escape_string($db, $data["price"]);
    $stock = mysqli_escape_string($db, $data["stock"]);
    $descriptions = mysqli_escape_string($db, $data["descriptions"]);
    $category = mysqli_escape_string($db, $data["category"]);
    $result = $db->query("SELECT * FROM products WHERE id = '$id'");
    if (mysqli_num_rows($result) === 1){
        try { 
            $query = "UPDATE products SET 
            name = '$name', 
            photo = '$photo', 
            price = '$price', 
            stock = '$stock', 
            descriptions = '$descriptions', 
            category = '$category' 
            WHERE id = '$id'";
           $result = mysqli_query($db, $query); 
        } catch (mysqli_sql_exception $e) { 
           var_dump($e);
           exit; 
        } 
        return (mysqli_affected_rows($db));
    }
}
function deleteProduct($id){
    global $db;
    mysqli_query($db, "DELETE FROM products WHERE id = $id");
    return (mysqli_affected_rows($db));
}


// Start Cart
function addToCart($data) {
    global $db;
    $idUser = $_COOKIE['id'];
    $idProduct = $data["idProduct"];
    $query = "INSERT INTO cart (id_user, id_product, quantity) VALUES ('$idUser', '$idProduct', '1')";
    mysqli_query($db, $query);
    return (mysqli_affected_rows($db));
}
function deleteFromCart($id) {
    global $db;
    $query = "DELETE FROM cart WHERE id=$id";
    mysqli_query($db, $query);
    return (mysqli_affected_rows($db));
}
function buy($data) {
    global $db, $idToCheckout;
    $idUser = $_COOKIE['id'];
    $productName = mysqli_escape_string($db, $data["productName"]);
    $totalPrice = mysqli_escape_string($db, $data["totalPrice"]);
    $date = date('m/d/Y-h:i:s');
    $query = "INSERT INTO history (id_user, product_name, date, total_price, status) VALUES ('$idUser', '$productName', '$date', '$totalPrice', 'success')";
    mysqli_query($db, $query);
    
    foreach($idToCheckout as $idToDelete) {
        mysqli_query($db, "DELETE FROM cart WHERE id = $idToDelete");
    }
    return (mysqli_affected_rows($db));
}