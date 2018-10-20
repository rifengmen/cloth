// 参数一：轮播点儿集合
// 参数二：图片元素集合
// 参数三：banner元素
// 参数四：左箭头元素
// 参数五：右箭头元素
// 参数六：banner盒子宽度
// 参数七：自动轮播时间间隔
function banner_animate(imgs,banner,lbtn,rbtn,widths,sec) {
    let now = 0;
    let next = 0;
    let next1 = 1;
    let next2 = 2;
    let t;
    imgs[0].style.left = 0;
    imgs[1].style.left = "345px";
    imgs[2].style.left = "690px";
    // 自动轮播
    t = setInterval(move,sec);
    function move() {
        next++;
        next1++;
        next2++;
        if (next2 === imgs.length) {
            next = imgs.length-2;
            next1 = imgs.length-1;
            next2 = 0;
        }
        if (next1 === imgs.length) {
            next = imgs.length-1;
            next1 = 0;
            next2 = 1;
        }
        if (next === imgs.length) {
            next = 0;
            next1 = 1;
            next2 = 2;
        }
        imgs[now].style.left = 0;
        imgs[next].style.left = widths +"px";
        imgs[next1].style.left = 2*widths +"px";
        imgs[next2].style.left = 3*widths +"px";
        animate(imgs[now],{left:-widths});
        animate(imgs[next],{left:0});
        animate(imgs[next1],{left:widths});
        animate(imgs[next2],{left:2*widths});
        now = next;
    };
    // 鼠标移入停止轮播
    banner.onmouseover = function () {
        clearInterval(t);
    };
    banner.onmouseout = function () {
        t = setInterval(move,sec);
    };
    // 点击轮播
    rbtn.onclick = function () {
        move();
    };
    lbtn.onclick = function () {
        next--;
        next1--;
        next2--;

         if (next === -1) {
            next = imgs.length-1;
            next1 = 0;
            next2 = 1;
         }
        if (next1 === -1) {
            next =  imgs.length-2;
            next1 = imgs.length-1;
            next2 = 0;
        }
        if (next2 === -1) {
            next = imgs.length-3;
            next1 = imgs.length-2;
            next2 = imgs.length-1;
        }
        imgs[now].style.left = 0;
        imgs[next].style.left = widths +"px";
        imgs[next1].style.left = 2*widths +"px";
        imgs[next2].style.left = 3*widths +"px";
        console.log(next2,now, next, next1);
        animate(imgs[now],{left:widths});
        animate(imgs[next],{left:2*widths});
        animate(imgs[next1],{left:3*widths});
        animate(imgs[next2],{left:0});
        now = next;
    }
}
