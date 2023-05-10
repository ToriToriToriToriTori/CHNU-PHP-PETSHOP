<?php
$validation = array(); 
if(!empty($_POST)) {

    if(isset($_POST["name"]) && strlen($_POST["name"])<4) {
    $validation[] = "name"; 
    }

    if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,}$/", $_POST["password"])){
        $validation[] = "password";
    }

    if($_POST["checkpassword"] != $_POST["password"]){
        $validation[] = "checkpassword";
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

            $name = $_POST['name'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $email = $_POST['email'];

            $sql = "INSERT INTO users (name, password, email, isadmin) VALUES ('$name', '$password', '$email', 'false')"; 

            if (mysqli_query($conn, $sql)) {
                
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                
                $_SESSION["auth"] = true;
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                $_SESSION["is_admin"] = $row['isadmin'];

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
            mysqli_close($conn);
            header("Location:index.php?action=shop");
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
        <a href="/petshop/index.php?action=login">Увійти</a>
    </div>

    <div>
        <form class="login-form" action="" method="POST" id="signupform">
            <h3>Реєстрація</h3>
            <input type="text" name="name" id="name" placeholder="Name"
            <?php if(isset($_POST["name"])){echo "value='".$_POST["name"]."'";}?>
            <?php if(in_array("name", $validation)){ echo "class='invalid'";}?>>

            <input type="email" name="email" id="email" placeholder="Email"
            <?php if(isset($_POST["email"])){echo "value='".$_POST["email"]."'";}?>
            <?php if(in_array("email", $validation)){echo "class='invalid'";}?>>

            <input type="password" name="password" id="password" placeholder="Password"
            <?php if(in_array("password", $validation)){echo "class='invalid'";}?>>

            <input type="password" name="checkpassword" id="password" placeholder="Chack password"
            <?php if(in_array("checkpassword", $validation)){echo "class='invalid'";}?>>

            <input type="submit" value="Зараєструватися" class="login-form-submit">
        </form>
    </div>
</div>