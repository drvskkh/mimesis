<link rel="stylesheet" href="assets/css/header.css">
<img id="glow" src="assets/img/header.png">
<div class="header">
    <img id="logo" src="assets/img/mimesis.svg">
    <div id="acc">
        <div id="user">
            <h1 id="name"><?=$_COOKIE['full_name']?></h1>
            <h1 id="role"><?=$_COOKIE['role']?></h1>
        </div>
        <form action="exit" method="post">
            <button><img id="exit" src="assets/img/exit.svg"></button>
        </form>
    </div>
</div>