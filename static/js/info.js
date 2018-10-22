$(function () {
    let ids = location.search.split('=')[1];
    let id = ids.split("&")[0];
    let count = $('.count').text()*1+1;
    $.ajax({
        url: "count.php",
        data: {
            id: id,
            count: count
        },
        success: function () {
        }
    })
})