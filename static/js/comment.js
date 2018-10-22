$(function () {
    let btn = $("button");
    let num = 5;
    let pagenum = 0;
    let main = $(".main-left");
    let flag = true;
    btn.on("click",function () {
        let data = $("form").serialize();
        let arr = $("form").serializeArray();
        $.ajax({
            url: "insertcomment.php",
            data: data,
            success: function (res) {
                if (res == "success") {
                    fn(arr);
                }
                else if(res == "fail") {
                    alert("留言添加失败");
                }
            }
        })
    });
    function fn(arr) {
        $("form")[0].reset();
        let str = `<li>
                        <div class="icon">
                            <i class="iconfont icon-touxiang"></i>
                        </div>
                        <div class="inf">
                            <h4>${arr[0].value}</h4>
                            <p>${arr[2].value}</p>
                        </div>
                        <div class="times">${formDate()}</div>
                    </li>`;
        main.prepend(str);
    };
    function formDate() {
        let date = new Date();
        let y = date.getFullYear(),
            m = date.getMinutes()+1,
            d = date.getDate(),
            h = date.getHours(),
            i = date.getMinutes(),
            s = date.getSeconds();
        return y+'-'+m+'-'+d+' '+h+':'+i+':'+s;
    };
    $(".page").on('click',function (e) {
        e.preventDefault();
        if (flag == false) {
            return;
        }
        $(".page>i").attr("class","iconfont icon-jiazai");
        flag = false;
        pagenum++;
        $.ajax({
            url: "page.php",
            data: {
                num: num,
                pagenum: pagenum
            },
            dataType: "json",
            success: function (res) {
                if (res.length) {
                    flag = true;
                    $(".page>i").attr("class","iconfont icon-icon-test");
                    render(res);
                }
                else {
                    $(".page>i").attr("class","iconfont");
                    alert("已经没有更多的留言了");
                }
            }
        })
    });
    function render(ele) {
        // 三种拼接方法
        // let list = [];
        // list = list.concat(ele);
        // list.push(...ele);
        // Array.prototype.push.apply(list,ele);
        ele.forEach(v => {
            let str = `<li>
                        <div class="icon">
                            <i class="iconfont icon-touxiang"></i>
                        </div>
                        <div class="inf">
                            <h4>${v.names}</h4>
                            <p>${v.text}</p>
                        </div>
                        <div class="times">${v.times}</div>
                    </li>`;
            main.append(str);
        })
    };
    $('.page').triggerHandler('click');
})