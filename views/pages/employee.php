<?php include "emp_read.php";?>
<!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/employee.css">
    <title>mimesis studio</title>
</head>

<body>

    <?php if ($_COOKIE['role'] == 'employee') : ?>
        <div class="space">
            <div class="block" id="block_order">
                <div class="lbl">
                    <h1 class="cat">Заказы</h1>
                </div>

                <table class="content" id="content_emp">
                    <thead class="thead_d">
                    <th>дата</th>
                    <th>заказ</th>
                    <th>цена</th>
                    <th>заказчик</th>
                    <th>контакт</th>
                    </thead>
                    <tbody>
                    <?php while ($ord = mysqli_fetch_assoc($ord_result)){?>
                        <tr>
                            <td><?php echo $ord['date'] ?></td>
                            <td><?php echo $ord['name'] ?></td>
                            <td><?php echo $ord['price'] ?></td>
                            <td><?php echo $ord['full_name'] ?></td>
                            <td><?php echo $ord['email'] ?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
        <?php include 'inc/header.php'?>
        <?php include 'inc/fade.php'?>

    <?php else: header('location: login')?>
    <?php endif;?>


</div>

</body>

</html>