window.onload = function () {
    // 导航栏背景变色
    let navs = $("div.nav");
    window.onscroll = function () {
        let tops = document.body.scrollTop || document.documentElement.scrollTop;
        if (tops >= 120) {
            navs.addClass("hot");
        }
        else if (tops < 120) {
            navs.removeClass("hot");
        }
    }
}
