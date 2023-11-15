<link rel="stylesheet" href="assets/css/fade.css">
<script type="text/javascript">
    function funonload() {
        var fade = document.getElementById("fade");
        var fadeEffect = setInterval(function () {
            if (!fade.style.opacity) {
                fade.style.opacity = 1;
            }
            if (fade.style.opacity > 0) {
                fade.style.opacity -= 0.005;
            } else {
                clearInterval(fadeEffect);
            }
        }, 5);
    }
    setTimeout(() => {document.getElementById("fade").style.display="none"}, 1000);
    window.onload = funonload;
</script>
<div id="fade""></div>