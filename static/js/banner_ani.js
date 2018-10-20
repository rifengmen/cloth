// 参数一：轮播点儿集合
// 参数二：图片元素集合
// 参数三：banner元素
// 参数四：左箭头元素
// 参数五：右箭头元素
// 参数六：banner盒子宽度
// 参数七：轮播时间
// 参数八：图片配字
function banner_ani(dots,imgs,banner,lbtn,rbtn,widths,val,dotst) {
    let now = 0;
    let next = 0;
    imgs[0].style.left = 0;
    dots[0].style.backgroundColor = "#757575";
    dotst[0].style.display = "block";
    for (let i = 0; i < dots.length; i++) {
        dots[i].onclick = function () {
            for (let j = 0; j < imgs.length; j++) {
                imgs[j].style.left = widths+"px";
                dots[j].style.backgroundColor = "#ccc";
                dotst[j].style.display = "none";
            }
            imgs[i].style.left = 0;
            dots[i].style.backgroundColor = "#757575";
            dotst[i].style.display = "block";
            now = i;
            next = i;
        }
    }
    // 自动轮播
    let t = setInterval(move,val);
    function move() {
        next++;
        if (next === dots.length) {
            next = 0;
        }
        imgs[now].style.left = 0;
        dotst[now].style.display = "block";
        imgs[next].style.left = widths+"px";
        dotst[next].style.display = "none";
        animate(imgs[now],{left:-widths},function () {
            dots[now].style.backgroundColor = "#757575";
            dotst[now].style.display = "none";
        });
        animate(imgs[next],{left:0},function () {
            for (let i = 0; i < imgs.length; i++) {
                dots[i].style.backgroundColor = "#757575";
                dotst[i].style.display = "none";
            }
            dots[next].style.backgroundColor = "#ccc";
            dotst[next].style.display = "block";
        });
        now = next;
    }
    // 鼠标移入时暂停
    banner.onmouseover = function () {
        clearInterval(t);
    };
    banner.onmouseout = function () {
        t = setInterval(move,val)
    };
    // 点击轮播
    rbtn.onclick = function () {
        move()
    };
    lbtn.onclick = function () {
        next--;
        if (next === -1) {
            next = imgs.length-1;
        }
        imgs[now].style.left = 0;
        dotst[now].style.display = "block";
        imgs[next].style.left = (-widths)+"px";
        dotst[next].style.display = "none";
        animate(imgs[now],{left:widths},function () {
            dots[now].style.backgroundColor = "#ccc";
            dotst[now].style.display = "none";
        });
        animate(imgs[next],{left:0},function () {
            for (let j = 0; j < dots.length; j++) {
                dots[j].style.backgroundColor = "#ccc";
                dotst[j].style.display = "none";
            }
            dots[next].style.backgroundColor = "#757575";
            dotst[next].style.display = "block";
        });
        now = next;

    }
}