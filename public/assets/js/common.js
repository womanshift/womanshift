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


/* index */

// カテゴリ取得
var category = "";
var param = location.search.substring(1).split('&');
// category切り替えられるようになったらパラメータから取得
if (!category=="") {
    category = param[0];
}
var data = {
    "category": category   // パラメータ
};

// API へリクエスト
$.getJSON('http://glamourousparty.com/api/cards',data, function(json) {
    // 警告
    if (json.contents.length === 0) {
        alert('コンテンツが見つかりませんでした(´・ω・｀)');
        return;
    }

    var cardsQuestion = [];
    for (i=0; i<=json.contents.length-1; i++) {

        // 背景になるカードを交互に出し分ける
        // ↑ によって文字も色わける
        cardUrlQ = "/assets/img/Questionwhite.png",
        questionStyle =  "buleText",
        cardUrlA = "/assets/img/Answerblue.png",
        answerStyle =  "whiteText";

        if (i%2==0) {
            var cardUrlQ = "/assets/img/Questionblue.png",
            questionStyle = "whiteText",
            cardUrlA = "/assets/img/Answerwhite.png",
            answerStyle = "buleText";
        }

        // こたえが空白だったらはじく
        if (json.contents[i].text === "") {
            continue;
        }

        cardsQuestion.push(
            {
             "name": json.contents[i].nickname,
             "question": json.contents[i].title,
             "answer": json.contents[i].text,
             "icon": json.contents[i].icon_url,
             "cardUrlQ": cardUrlQ,
             "cardUrlA": cardUrlA,
             "questionStyle": questionStyle,
             "answerStyle": answerStyle
            }
        );
    }

    $.tmpl($( "#question-item" ), cardsQuestion).appendTo( ".flip-horizen" );
});

$(document).on('click', '.flip-container', function() {
    $(this).toggleClass('flipped');
});


/* introduction-lawmaker */

// API へリクエスト
$.getJSON('http://glamourousparty.com/api/councilors', function(json) {
    // 警告
    if (json.contents[0].length === 0) {
        alert('コンテンツが見つかりませんでした(´・ω・｀)');
        return;
    }
    var memberInfo = [];
    var i=0;
    for (i=0; i<=json.contents.length-1; i++) {

        // 背景になるカードを交互に出し分ける
        // ↑ によって文字も色わける
        var colorStyle = "color-white";
        if (i%2==0) {
            colorStyle = "color-blue";
        }
        memberInfo.push(
            {
             "name": json.contents[i].name,
             "nickname":json.contents[i].nickname,
             "location":json.contents[i].location,
             "icon_url": json.contents[i].icon_url,
             "emphasis": json.contents[i].emphasis,
             "catchphrase": json.contents[i].catchphrase,
             "twitter": json.contents[i].twitter,
             "facebook": json.contents[i].facebook,
             "link": json.contents[i].link,
             "colorStyle": colorStyle
            }
        );
    }
    $.tmpl($( "#member" ), memberInfo).appendTo( ".content-introduction-lawmaker" );
});