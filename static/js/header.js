window.onload = function () {
    // 导航栏背景变色
    let navs = document.querySelector(".nav");
    let texts = document.querySelectorAll(".nav-inner-a a");
    let hots = document.querySelector(".nav-inner-a .hot");
    window.onscroll = function () {
        let tops = document.body.scrollTop || document.documentElement.scrollTop;
        if (tops >= 120) {
            navs.style.background = "#fff";
            texts.forEach(val => {
                val.style.color = "#000";
            });
            hots.style.color ="#16b0dc";
        }
        else if (tops < 120) {
            navs.style.background = "rgba(0,0,0,0.15)";
            texts.forEach(val => {
                val.style.color = "#fff";
            })
            hots.style.color ="#16b0dc";
        }
    }
    // 鼠标移入效果以及点击效果
    let list = $(".nav-inner-a>ul");
    list.on("mouseover",".first",function () {
        $(this).addClass("hot");
    });
    list.on("mouseout",".first",function () {
        $(this).removeClass("hot");
    })
}
