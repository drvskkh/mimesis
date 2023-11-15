<?php include "admin_read.php";?>
<!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>mimesis studio</title>
</head>

<body>
<?php if ($_COOKIE['role'] == 'admin') : ?>
    <?php include 'inc/header.php'?>
    <div class="space">
        <div class="block" id="block_emp">
            <div class="lbl">
                <h1 class="cat">Работники</h1>
                <button id="emp_add"><img id="add" src="assets/img/add.svg"></button>
            </div>

            <h1 class="type">дизайнеры</h1>
            <table class="content" id="content_emp">
                <thead class="thead_d">
                    <th>id</th>
                    <th>имя</th>
                    <th>email</th>
                    <th></th>
                </thead>
                <tbody>
                <?php while ($des = mysqli_fetch_assoc($des_result)){?>
                    <tr>
                        <td><?php echo $des['emp_id'] ?></td>
                        <td><?php echo $des['full_name'] ?></td>
                        <td><?php echo $des['email'] ?></td>
                        <td>
                            <form action="admin_del?delete_id=<?php echo $des['emp_id'] ?>&flag=1" method="post">
                                <button><img id="del" src="assets/img/add.svg"></button>
                            </form>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

            <h1 class="type">программисты</h1>
            <table class="content" id="content_emp">
                <thead class="thead_d">
                <th>id</th>
                <th>имя</th>
                <th>email</th>
                <th></th>
                </thead>
                <tbody>
                <?php while ($pr = mysqli_fetch_assoc($pr_result)){?>
                    <tr>
                        <td><?php echo $pr['emp_id'] ?></td>
                        <td><?php echo $pr['full_name'] ?></td>
                        <td><?php echo $pr['email'] ?></td>
                        <td>
                            <form action="admin_del?delete_id=<?php echo $pr['emp_id'] ?>&flag=1" method="post">
                                <button><img id="del" src="assets/img/add.svg"></button>
                            </form>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>



        <div class="block" id="block_work">
            <div class="lbl">
                <h1 class="cat">Работы</h1>
                <button id="work_add"><img id="add" src="assets/img/add.svg"></button>
            </div>

            <h1 class="type">дизайн</h1>
            <table class="content" id="content_emp">
                <thead class="thead_d">
                    <th>id</th>
                    <th>название</th>
                    <th>цена</th>
                    <th></th>
                </thead>
                <tbody>
                <?php while ($w_des = mysqli_fetch_assoc($w_des_result)){?>
                    <tr>
                        <td><?php echo $w_des['work_id'] ?></td>
                        <td><?php echo $w_des['name'] ?></td>
                        <td><?php echo $w_des['price'] ?></td>
                        <td>
                            <form action="admin_del?delete_id=<?php echo $w_des['work_id'] ?>&flag=2" method="post">
                                <button><img id="del" src="assets/img/add.svg"></button>
                            </form>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>

            <h1 class="type">кодинг</h1>
            <table class="content" id="content_emp">
                <thead class="thead_d">
                <th>id</th>
                <th>название</th>
                <th>цена</th>
                <th></th>
                </thead>
                <tbody>
                <?php while ($w_pr = mysqli_fetch_assoc($w_pr_result)){?>
                    <tr>
                        <td><?php echo $w_pr['work_id'] ?></td>
                        <td><?php echo $w_pr['name'] ?></td>
                        <td><?php echo $w_pr['price'] ?></td>
                        <td>
                            <form action="admin_del?delete_id=<?php echo $w_pr['work_id'] ?>&flag=2" method="post">
                                <button><img id="del" src="assets/img/add.svg"></button>
                            </form>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- EMP + MODAL -->
    <div class="modal" id="emp_modal" >
        <div class="modal-window">
            <h1 class="modal_head">Добавление работника</h1>
            <button class="btn-close" id="emp_close">x</button>
            <form action="emp_add" method="post">
                <label for="full_name">полное имя</label>
                <input class="log_input" id="full_name" name="full_name"></input>
                <label for="login">логин</label>
                <input class="log_input" id="login" name="login"></input>
                <label for="password">пароль</label>
                <input class="log_input" id="password" type="password" name="password"></input>
                <label for="email">адрес эл.почты</label>
                <input class="log_input" id="email" name="email"></input>
                <label for="role">роль</label>
                <input class="log_input" id="password_conf" name="role"></input></br>

                <button class="log_but" id="reg" type="submit">зарегестрировать</button>
            </form>
        </div>
        <div class="overlay"></div>
    </div>

    <!-- WORK + MODAL -->
    <div class="modal" id="work_modal" >
        <div class="modal-window">
            <h1 class="modal_head">Добавление работы</h1>
            <button class="btn-close" id="work_close">x</button>
            <form action="work_add" method="post">
                <label for="full_name">название</label>
                <input class="log_input" id="full_name" name="name"></input>
                <label for="type">тип</label>
                <input class="log_input" id="type" name="type"></input>
                <label for="price">цена</label>
                <input class="log_input" id="price" name="price"></input></br>

                <button class="log_but" id="reg" type="submit">добавить</button>
            </form>
        </div>
        <div class="overlay"></div>
    </div>

    <script src="assets/js/modal.js"></script>
    <?php include 'inc/fade.php'?>

<?php else: header('location: login')?>
<?php endif;?>

</body>

</html>