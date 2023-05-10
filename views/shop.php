<?php

        require_once('./db/conect.php');
        $conn = mysqli_connect("localhost", $DBLogin, $DBPassword, $DBName);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{

            $sql = "SELECT * FROM goods";
            $goods = mysqli_query($conn, $sql);

            if (mysqli_num_rows($goods) == 0) {
                    echo "Incorrect!";
            } 
        
        }
?>
<div class="page">

    <div class="shop-grid">
    <?php  foreach ($goods as $item): ?>
        <div class="product">
                <img src="<?= $item["img"]?>" alt="">
                <h5>
                    <?= $item["name"]?>
                </h5>
                <h6><?= $item["description"]?></h6>
                <button class="product-btn">В кошик</button>
            </div>
    <?php endforeach; ?>
    <?php  foreach ($goods as $item): ?>
        <div class="product">
                <img src="<?= $item["img"]?>" alt="">
                <h5>
                    <?= $item["name"]?>
                </h5>
                <h6><?= $item["description"]?></h6>
                <button class="product-btn">В кошик</button>
            </div>
    <?php endforeach; ?>
    <?php  foreach ($goods as $item): ?>
        <div class="product">
                <img src="<?= $item["img"]?>" alt="">
                <h5>
                    <?= $item["name"]?>
                </h5>
                <h6><?= $item["description"]?></h6>
                <button class="product-btn">В кошик</button>
            </div>
    <?php endforeach; ?>
    </div>



</div>