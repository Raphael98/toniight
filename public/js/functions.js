// var count = 0

function changeBanner(){
    var root = "img/",
    images = ["url("+root+"anthony-delanoix-1.jpg)", "url("+root+"yutacar-2.jpg)", "url("+root+"/ben-duchac-6.jpg)"];
    $("#banner").css("background-image", images[count]);
    count = count + 1;
    if(count >= images.length){ count = 0;}
}

function toggleSideBar(){
    var left = $("#sidebar").css("left");
    left = parseInt(left.replace("px",""));

    if(left < 0){
        $("#sidebar").css("left", "0px");
    }else{
        $("#sidebar").css("left", "-60vw");
    }
}

$(function(){
    //Any change made in menu, will be replicated to the sidebar ;
    var menu = $("#itens").children(),
    sidebar = $("#sidebar");
    for(i = 0; i < menu.length; i++){
        sidebar.append($("<a></a>").html(menu.eq(i).html()).attr("href", menu.eq(i).attr("href")).attr("class","item"));
    }
    //Sidebar animation
    $("#menu button").click(function(){
        toggleSideBar();
    });

    //Achor animation
    $('a[href^="#"]').click(function(event){
        event.preventDefault();
        var hash = $(this.hash);
        $("body, html   ").animate({
            "scrollTop": hash.offset().top - 70
        });
        toggleSideBar();
    });
});
