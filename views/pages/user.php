<?php include "user_read.php";?>
<!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>mimesis studio</title>
</head>

<body>
<?php if ($_COOKIE['role'] == 'user') : ?>

    <?php include 'inc/header.php'?>
    <div class="space">
        <div class="block" id="block_order">
            <div class="lbl">
                <h1 class="cat">Заказы</h1>
                <button id="order_add"><img id="add" src="assets/img/add.svg"></button>
            </div>

            <table class="content" id="content_emp">
                <thead class="thead_d">
                <th>дата</th>
                <th>заказ</th>
                <th>цена</th>
                <th>работник</th>
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

    <!-- WORK + MODAL -->
    <div class="modal" id="order_modal" >
        <div class="modal-window">
            <h1 class="modal_head">Новый заказ</h1>
            <button class="btn-close" id="order_close">x</button>
            <form action="order_add" method="post">
                <h1 class="type">работа</h1>
                <select class="sel_works" id="sel_works" name="sel_work">
                    <?php while ($works = mysqli_fetch_assoc($workss)){?>
                            <option class="opt" value="<?=$works['work_id'];?>"><?=$works['name'];?> (<?=$works['price'];?> руб)</option>
                    <?php } ?>
                </select>
                <h1 class="type">описание</h1>
                <textarea name="desc" class="desc" id="desc"></textarea>
                <button class="log_but" id="reg" type="submit">заказать</button>
            </form>
        </div>
        <div class="overlay"></div>
    </div>

    <script src="assets/js/modal_order.js"></script>
    <?php include 'inc/fade.php'?>

<?php else: header('location: login')?>
<?php endif;?>

</body>

</html>