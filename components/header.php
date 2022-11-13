<div class="navbar">
    <img src="../resources/assets/logo.png" class="logo">
    <nav>
        <ul id="menuList">
            <li><a href="index.php">Home</a></li>
            <li><a href="catalog.php">Catalog</a></li>
            <li><a href="profile.php">Profile</a></li>
            <?php 
            if(isset($_SESSION["loginAdmin"])){
                echo "<li><a href='../admin/products/'>Dashboard</a></li>";
            } else if (!isset($_SESSION["loginUser"]) && !isset($_SESSION["loginAdmin"])){
                echo "<li><a href='auth.php'>Login</a></li>";
            }
            if(isset($_SESSION["loginUser"]) || isset($_SESSION["loginAdmin"])){
                echo "<li><a href='logout.php'>Logout</a></li>";
            }
            ?>
            <li>
                <label>
                    <input type="checkbox" class="checkbox" id="modegelap">
                    <span class="check"></span>
                </label>
            </li>
        </ul>
    </nav>
</div>