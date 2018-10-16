$(function () {
    let h4 = $("h4");
    h4.on("click",function () {
        $(this).next().stop();
        $(this).next().slideToggle();
        $(this).children(".icon-xiala").toggleClass("hot");
    });
})