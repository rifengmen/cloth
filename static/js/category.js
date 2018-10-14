$(function () {
    let h4 = $("h4");
    h4.on("click",function () {
        $(this).next().stop();
        $(this).next().slideToggle();
    });
    let inbtn = $('.btn-success');
    inbtn.on("click",function () {
        let header1 = $(".header1").val();
        let header2 = $(".header2").val();
        let pid = $(".pid").val();
        $.get("insert.php",{header1:header1,header2:header2,pid:pid},function (res) {
            if (res == "no") {
                alert("添加失败");
            }
            else if (res == "yes") {
                alert("添加成功");
            }
        });
    });
})