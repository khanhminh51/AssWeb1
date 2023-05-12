<?php
        include('../../view/header.php');
        require_once('../../database/dbhelper.php');
        $email = $_GET['email'];
        $idOrder = $_GET['idOrder'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../view/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/account.css">
    <link rel="stylesheet" href="../../view/css/stylefooter.css">
    <link rel="stylesheet" href="../../view/css/styleheader.css">
    <link rel="stylesheet" href="../../view/css/stylemain.css">
    <link rel="stylesheet" href="../../view/css/themify-icons/themify-icons.css">
</head>
<body>
<div class="nav-list">
<ul class="col-2">
            <li class=""><a href="./info.php" class="">Thông tin cá nhân </a></li>
            <li class=" active"><a href="./order.php" class="">Danh sách đơn hàng</a></li>
            <li class=""><a href="./feedback.php" class="">Gửi ý kiến</a></li>
            <li class=""><a href="./order.php?logout=true" class="">Thoát</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
            <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Image</td>
                    <td>Type</td>
                    <td>Size</td>
                    <td>So Luong</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "select * from ordersdetail where idOrder = '$idOrder'";
            $result = executeResult($sql);
            if(count($result) > 0){
                foreach($result as $row ){
                    
                    $idProduct = $row['productId'];
                    $sql2 = "select * from products where id = '$idProduct'";
                    $result2 = executeResult($sql2);
                    foreach($result2 as $row2 ){
            ?>
            
            <tr>
                <td><?php echo $row2['name']?></td>
                <td><?php echo $row2['price']?></td>
                <td><img src="<?php echo $row2['image']?>" alt="" width="100px"></td>
                <td><?php echo $row2['type']?></td>
                <td><?php echo $row['size']?></td>
                <td><?php echo $row['quantity']?></td>
                <td>
                <form action="" method="post">
                    <button name="deleteProductInCart" value="<?php echo $idProduct?>">Xoa</button>
                </form>
                </td>
            </tr>
            <?php
                    }
                }
            }
            ?>
            </tbody>
        </table>
            </div>
            
        </div>
    </div>       
</body>
</html>