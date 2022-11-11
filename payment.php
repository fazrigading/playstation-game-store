<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="resources/css/payment.css?v=<?php echo time(); ?>">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/5bbbb39d34.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="resources/assets/logo.png" class="logo">
            <h1>Playstation Game Store</h1>
            <nav>
                <ul id="menuList">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="catalog.php">Catalog</a></li>
                    <li>
                        <label>
                            <input type="checkbox" class="checkbox" id="modegelap">
                            <span class="check"></span>
                        </label>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <main>
        <div class="basket">
            <div class="basket-labels">
                <ul>
                    <li class="item item-heading">Barang</li>
                    <li class="price">Harga</li>
                    <li class="quantity">Kuantitas</li>
                    <li class="subtotal">Subtotal</li>
                </ul>
            </div>
            <div class="basket-product">
                <div class="item">
                    <div class="product-image">
                        <img src="resources/assets/PS5SIDE3.jpg" alt="Placholder Image 2" class="product-frame">
                    </div>
                    <div class="product-details">
                        <h1><strong><span class="item-quantity">4</span> x Playstation 5</strong> Disc Version</h1>
                    </div>
                </div>
                <div class="price">26.00</div>
                <div class="quantity">
                    <input type="number" value="4" min="1" class="quantity-field">
                </div>
                <div class="subtotal">104.00</div>
                <div class="remove">
                    <button>Remove</button>
                </div>
            </div>

            <div class="basket-product">
                <div class="item">
                    <div class="product-image">
                        <img src="resources/assets/PS5SIDE3.jpg" alt="Placholder Image 2" class="product-frame">
                    </div>
                    <div class="product-details">
                        <h1><strong><span class="item-quantity">4</span> x Playstation 5</strong> Disc Version</h1>
                    </div>
                </div>
                <div class="price">26.00</div>
                <div class="quantity">
                    <input type="number" value="1" min="1" class="quantity-field">
                </div>
                <div class="subtotal">26.00</div>
                <div class="remove">
                    <button>Remove</button>
                </div>
            </div>

        </div>

        <aside>
            <div class="summary">
                <div class="summary-total-items"><span class="total-items"></span> Barang Di Dalam Keranjang</div>
                <div class="summary-subtotal">
                    <div class="subtotal-title">Subtotal</div>
                    <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
                </div>
                <div class="summary-total">
                    <div class="total-title">Total</div>
                    <div class="total-value final-value" id="basket-total">130.00</div>
                </div>
                <div class="summary-checkout">
                    <button class="checkout-cta">Checkout</button>
                </div>
            </div>
        </aside>
    </main>
    <script src="resources/js/payment.js"></script>
</body>

</html>