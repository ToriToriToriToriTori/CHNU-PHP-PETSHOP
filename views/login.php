<?php
$validation = array(); 
if(!empty($_POST)) {

    if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,}$/", $_POST["password"])){
        $validation[] = "password";
    }

    if(!preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $_POST["email"])){
    $validation[] = "email";
    }

    if( empty($validation)){
        require_once('./db/conect.php');
        $conn = mysqli_connect("localhost", $DBLogin, $DBPassword, $DBName);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['password'])) {
                    
                    $_SESSION["auth"] = true;
                    $_SESSION["user_id"] = $row['id'];
                    $_SESSION["user_name"] = $row['name'];
                    $_SESSION["is_admin"] = $row['isadmin'];

                    header("Location:index.php?action=shop");
                } else {
                    echo "Incorrect password!";
                }
            } else {
                echo "User not found!";
            }
            
           
        }

    }
} 
?>

<div class="full-screen-banner ">
    <div class="full-screen-banner-description">
        <h2>Станьте постійним клієнтом вже зараз і виведіть руботу про улюбленця на новий рівень:</h3>
        <ol>
            <li>Більш вигідні пропозиції</li>
            <li>Інформація про новинки</li>
            <li>Безкоштовна консультація ветеринарів</li>
        </ol>
        <a href="/petshop/index.php?action=signup">Зареєструватися</a>
    </div>

    <div>
        <form class="login-form" action="" method="POST">
            <h3>Вхід в аккаунт</h3>

            <input type="email" name="email" id="email" placeholder="Email"
            <?php if(isset($_POST["email"])){echo "value='".$_POST["email"]."'";}?>
            <?php if(in_array("email", $validation)){echo "class='invalid'";}?>>

            <input type="password" name="password" id="password" placeholder="Password"
            <?php if(in_array("password", $validation)){echo "class='invalid'";}?>>

            <input type="submit" value="Увійти" class="login-form-submit">
        </form>
    </div>
</div>