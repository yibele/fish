$(function () {
  /** 信纸和字体左右滑动控制组件 */


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

  $('#xinzhi').slidesjs({
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

  //因为bug重新设置#ziti的class
  $('#ziti').removeClass('menu_active');

  //初始化页面字体
  objchangefont(letter_neirong, 'a28d6bc9a592429e93378a6001f9e547');

  /** 字体大小滑动 */
  $('#slider').slider({
    range: 'min',
    min: 24,
    max: 45,
    values: 1,
    slide: function (event, ui) {
      $("#amount").val(ui.value);
      $("#letter_container").css('fontSize', ui.value);
    }
  })
  $("#amount").val($('#slider').slider('value'))
  $('#letter_container').css('fontSize', $('#slider').slider('value'))
})

/** 修改字体 */
function changeFontFamily(event, fontFamily, accesskey, lineHeight) {
  var obj = event.srcElement.parentNode;
  obj = $(obj);
  obj.addClass('active');
  var siblings = obj.siblings();
  siblings.removeClass('active');
  objchangefont(letter_neirong, accesskey);
  letter_neirong.style.lineHeight = lineHeight;
  return false;
}

/**检测是否登录 */

/**  保存信件 */
function createLetter() {
  var data = checkLogin();
  data = eval('('+data+')');
  if (data) {
    /** 获取信件部分的相关属性，并发送到数据库中 */
    $letter_neirong = $('#letter_neirong')[0];
    $letter_container = $('#letter_container')[0];
    $lt_back = $letter_container.style.backgroundImage.slice(4, -1) ? $letter_container.style.backgroundImage.slice(4, -1):'/img/xinzhi/xinzhi_1.jpg';
    $lt_content = $letter_neirong.innerHTML;
    $lt_fontSize = $letter_container.style.fontSize.slice(0, -2);
    $lt_fontFamily = [$letter_neirong.getAttribute('fontid'), $letter_neirong.getAttribute('accesskey')];
    $lt_color = $letter_container.style.color ? $letter_container.style.color : '#ffffff';
    $user_id = data.userId;
    //防止csrf攻击
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    letter_data = {
      'user_id':$user_id,
      'lt_back':$lt_back,
      'lt_content':$lt_content,
      'lt_fontSize':$lt_fontSize,
      'lt_fontFamily':$lt_fontFamily,
      'lt_color':$lt_color
    }

    $.ajax({
      method: 'POST',
      url: '/letter/create',
      data: letter_data,
      async: false ,
      timeout : 15000,
      success: function (data) {
        var lid = data;
        document.location.href ="/createContact/"+lid;
      },
      fail: function (data) {
          alert('网络错误，请检查网络');
      }
    })
  } else {
    showLoginModal();
  }
}



