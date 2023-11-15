//INTRO
VANTA.FOG({
    el: "#intro",
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    highlightColor: 0xffb3,
    midtoneColor: 0xef00ff,
    baseColor: 0x0,
    blurFactor: 0.90,
    zoom: 0.60
})

const logo = document.querySelectorAll('#logo path');

for(let i = 0; i < logo.length; i++) {
    console.log("Letter " + i + " is " + logo[i].getTotalLength());
}

logo2.onclick = function () {
    var logo2 = document.getElementById("logo2");
    var backgr = document.getElementById("intro");

    var fadeEffect = setInterval(function () {
        if (!logo2.style.opacity) {
            logo2.style.opacity = 1;
        }
        if (logo2.style.opacity > 0) {
            logo2.style.opacity -= 0.01;
        } else {
            clearInterval(fadeEffect);
        }
    }, 5);
    setTimeout(() => {
        fadeEffect = setInterval(function () {
            if (!backgr.style.opacity) {
                backgr.style.opacity = 1;
            }
            if (backgr.style.opacity > 0) {
                backgr.style.opacity -= 0.01;
            } else {
                clearInterval(fadeEffect);
            }
        }, 5);
    }, 1500);

    setTimeout(() => {document.location.href = 'login'}, 2200);
    setTimeout(() => {backgr.style.opacity = 1; logo2.style.opacity = 1}, 2300);
}
////////////////////////////////////////////////////////////////






