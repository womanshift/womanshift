$(function() {
    var path = window.location.href.split('/').pop();
    $("#logo").append("<a href='/'><img src='/assets/img/logo.png' /></a>");
    $("#toggle").append("<img src='/assets/img/menu_button.png' />");
    $.getJSON("http://glamourousparty.com/api/categories.json" , function(menu) {
        var active = "";
        var html = "<div class='menu_title'>Glamourous Party<br/>menu</div>";
        html += "<ul>";
        html += "<li>Q&Acategory</li>";
        $(menu.contents).each(function(i, v) {
            active = active_css(path, "index.html?&category_id=" + v.id);
            html += "<li class='menu_category'><a href='index.html?&category_id=" + v.id + "' " + active + ">" + v.name + "</a></li>";
        });
        html += "<li class='menu_partision'></li>";
        active = active_css(path, "about-site.html");
        html += "<li><a href='about-site.html' " + active + ">about</a></li>";
        html += "<li class='menu_partision'></li>";
        active = active_css(path, "introduction-lawmaker.html");
        html += "<li><a href='introduction-lawmaker.html' " + active + ">参加議員紹介</a></li>";
        html += "<li class='menu_partision'></li>";
        html += "</ul>";
        $("#menu").append(html);
    });
    $("#toggle").click(function() {
        $("#menu").show();
    })
});
function active_css(path, href){
    if (path == href) {
        return "class='active'";
    } else {
        return "";
    }

}
