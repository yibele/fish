
$(function () {
    $('#ziti').slidesjs({
        width: 1120,
        height: 189,
        navigation: {
            active: false,
            effect: 'slide'
        },
        pagination: {
            active: false
        },
    })

    $('#cantpostcard').slidesjs({
        width: 1120,
        height: 189,
        navigation: {
            active: false,
            effect: 'slide'
        },
        pagination: {
            active: false
        }
    })




    var font_dom = document.getElementById("buke_postcard_text");
    objchangefont(font_dom, 'a28d6bc9a592429e93378a6001f9e547');
})

function change_show_order (){
   var index1 =  $("#postcard_buke_background_img").css('zIndex')
   var index2 = $("#postcard_buke_background_content").css('zIndex');

   $("#postcard_buke_background_content").css('zIndex',index1);
   $("#postcard_buke_background_img").css('zIndex',index2);

}

function show_category(){
    $("#dropdown-menu").slideToggle(300);
}

