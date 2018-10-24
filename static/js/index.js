window.onload = function () {
    // banner图
    // 参数一：获取轮播点集合
    // 参数二：获取图片元素集合
    // 参数三：获取banner盒子元素
    // 参数四：获取左向按钮元素
    // 参数五：获取右向按钮元素
    // 参数六：获取banner盒子宽度
    // 参数七：轮播时间
    // 参数八：图片配字
    let dots = document.querySelectorAll(".banner-dian>div");
    let imgs = document.querySelectorAll(".banner-img a");
    let banner = document.querySelector(".banner");
    let lbtn = document.querySelector(".banner-left");
    let rbtn = document.querySelector(".banner-right");
    let widths = parseInt(getComputedStyle(banner,null).width);
    let val = 3500;
    let dotst = document.querySelectorAll(".banner-text>span");
    banner_ani(dots,imgs,banner,lbtn,rbtn,widths,val,dotst);

    // Initialize Swiper
    // swiper 轮播图
    let mySwiper = new Swiper ('.swiper-container', {
        // 横竖屏控制
        // direction: 'vertical',
        // 是否循环
        loop: true,
        // 分屏控制（需要几幅图片）
        slidesPerView : 3,
        // 分屏间距
        spaceBetween : 26,
        // // 如果需要分页器
        // pagination: {
        //     el: '.swiper-pagination',
        // },
        // 自动轮播
        autoplay: {
            // 时间
            delay: 5000,
            // 默认为true，点击后停止自动轮播，如不停止须改为false
            disableOnInteraction: false,
        },
        // 如果需要前进后退按钮
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // // 如果需要滚动条
        // scrollbar: {
        //     el: '.swiper-scrollbar',
        // },
    })
    let navs = $("div.nav");
    let lefts = document.querySelectorAll(".main2-bottom>div.left");
    let rights = document.querySelectorAll(".main2-bottom>div.right");
    let h4s = document.querySelectorAll("h4");
    let main3 = document.querySelector(".main3 .text")
    let arrlefts = [];
    let arrrights = [];
    let arrh4s = [];
    lefts.forEach(values => {
        arrlefts.push(values.offsetTop);
    });
    rights.forEach(values => {
        arrrights.push(values.offsetTop);
    });
    h4s.forEach(values => {
        arrh4s.push(values.offsetTop);
    });
    window.onscroll = function () {
        let tops = document.body.scrollTop || document.documentElement.scrollTop;
        if (tops >= 120) {
            navs.addClass("hot");
        }
        else if (tops < 120) {
            navs.removeClass("hot");
        }
        arrlefts.forEach((val,index) => {
            if (val-950 < tops) {
                lefts[index].setAttribute('class','animated slideInLeft');
            }
        });
        arrrights.forEach((val,index) => {
            if (val-950 < tops) {
                rights[index].setAttribute('class','animated slideInRight');
            }
        });
        arrh4s.forEach((val,index) => {
            if (val-950 < tops) {
                h4s[index].setAttribute('class','animated slideInDown');
            }
        });
        if (main3.offsetTop-950 < tops) {
            main3.setAttribute('class',"text animated slideInUp");
        }
    }
}
