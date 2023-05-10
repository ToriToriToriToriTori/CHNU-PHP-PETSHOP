<?php 
    $validation = array(); 
    if($_SESSION["auth"] != true){  header("Location:index.php?action=mainpage");}

    if(empty($validation) && !empty($_POST)){
        require_once('./db/conect.php');
        $conn = mysqli_connect("localhost", $DBLogin, $DBPassword, $DBName);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $name = $_POST['name'];
            $description = $_POST['description'];
            $img = $_POST['img'];
            $creator = $_SESSION['user_id'];

            $sql = "INSERT INTO goods (creator, name, description, img, count) VALUES ('1', '$name', '$description', '$img', '0')";
           
            $result = mysqli_query($conn, $sql);
                
            if(!$result){
                die("Error: " . mysqli_error($conn));
            }

            mysqli_close($conn);

        }
    }

?>
<div class="page">

    <form action="" method="POST">
        <input type="text" name="name" id="name" placeholder="Назва">
        <input type="text" name="description" id="description" placeholder="Опис">
        <input type="url" name="img" id="img" placeholder="Зображення">
        <input type="submit" value="додати">
    </form>

</div>