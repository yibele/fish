/**
 * Created by yibele on 2017/9/10.
 */


$(function () {
    $('#contact_slides').slidesjs({
        width: 448,
        height: 185,
        navigation: {
            active: false,
            effect: 'slide'
        },
        pagination: {
            active: false
        }
    })
})

$(function() {
    if ($('.select-options ul li').hasClass('selected')) {
        $('.select .input').text($('.select-options li.selected > span:first-child').text());
    } else {
        $('.select .input').text($('.select-options li:first-child > span:first-child').text());
    }
    $('.select').click(function() {
        $('.select-options').toggleClass('visible');
    });
    $('.select-options li').click(function() {
        $('.selected').removeClass('selected');
        $(this).addClass('selected');
        $('.select .input').text($(this).find('span:first-child').text());
    });
})