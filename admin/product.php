<?php
        require_once('../database/dbhelper.php');
        session_start();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "delete from products where id = '$id'";
            execute($sql);
            $sql = "UPDATE products SET id = id-1 WHERE id>'$id'";
            execute($sql);
            $sql = "ALTER TABLE products AUTO_INCREMENT=1";
            execute($sql);
        }     
        if(isset($_GET['logout'])){
            session_destroy();
            header('Location: http://localhost/coolmate/index.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="../user/css/account.css"> -->
    <title>Document</title>
</head>
<body>
    <div class="nav-list">
        <ul class="col-2">
            <li class=""><a href="./members.php" class="">Quản lý thành viên</a></li>
            <li class=""><a href="./feedback.php" class="">Quản lý phản hồi</a></li>
            <li class=""><a href="./admins.php" class="">Quản lý admin</a></li>
            <li class=""><a href="./product.php" class="">Quản lý sản phẩm</a></li>
            <li class=""><a href="./order.php" class="">Quản lý đơn hàng</a></li>
            <li class=""><a href="./business.php" class="">Quản lý kinh doanh</a></li>
            <li class=""><a href="./infor.php" class="">Quản lý thông tin</a></li>
            <li class=""><a href="./product.php?logout=true" class="">Thoát</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
            <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Image</td>
                    <td>Type</td>
                    <td>Material</td>
                    <td>Description</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from products";
                $result = executeResult($sql);
                if(count($result) > 0){
                    foreach($result as $row ){
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['price']?></td>
                    <td><img src="<?php echo $row['image']?>" alt="" style="width: 100px;"> </td>
                    <td><?php echo $row['type']?></td>
                    <td><?php echo $row['material']?></td>
                    <td><?php echo $row['description']?></td>
                    <td><a href="editProduct.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                    <td>
                    <a href="product.php?id=<?php echo $row['id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div><a href="addProduct.php">Them san pham</a></div> 
            </div>
            
        </div>
    </div>       
</body>
</html>