$(function() {
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

  $('#ziti').removeClass('menu_active');

  font_dom = document.getElementById("buke_postcard_text");
  objchangefont(font_dom, 'a28d6bc9a592429e93378a6001f9e547');

  $('#slider').slider({
    range: 'min',
    min: 24,
    max: 45,
    values: 1,
    slide: function (event, ui) {
      $("#amount").val(ui.value);
      $("#postcard_content_cant").css('fontSize', ui.value);
    }
  })

  $('#opacity').slider({
    range: 'min',
    min: 2,
    max: 100,
    create: function(event, ui) {
      $(this).slider('value','100')
      $("#opacity_amount").val('100%');
    },
    slide: function (event, ui) {
      $("#opacity_amount").val(ui.value+'%');
      $("#buke_postcard_text").css('opacity', ui.value/100);
    }
  })

  $('#xuanzhuan').slider({
    range: 'min',
    min: -50,
    max: 50,
    values: 100,
    create: function(event, ui) {
      $("#xuanzhuan_amount").val('0deg');
    },
    slide: function (event, ui) {
      $("#xuanzhuan_amount").val(ui.value+' deg');
      $("#buke_postcard_text").css('transform', "rotate("+ui.value+"deg)");
    }
  })

  $('#stamp_opacity').slider({
    range: 'min',
    min: 2,
    max: 100,
    create: function(event, ui) {
      $(this).slider('value','100')
      $("#stamp_opacity_amount").val('100%');
    },
    slide: function (event, ui) {
      $("#stamp_opacity_amount").val(ui.value+'%');
      $(".buke_stamp").css('opacity', ui.value/100);
    }
  })

  $('#stamp_xuanzhuan').slider({
    range: 'min',
    min: -180,
    max: 180,
    values: 100,
    create: function(event, ui) {
      $("#stamp_xuanzhuan_amount").val('0deg');
    },
    slide: function (event, ui) {
      $("#stamp_xuanzhuan_amount").val(ui.value+' deg');
      $(".buke_stamp").css('transform', "rotate("+ui.value+"deg)");
    }
  })

  $('#background_opacity').slider({
    range: 'min',
    min: 2,
    max: 100,
    create: function(event, ui) {
      $(this).slider('value','100')
      $("#background_opacity_amount").val('100%');
    },
    slide: function (event, ui) {
      $("#background_opacity_amount").val(ui.value+'%');
      $("#postcard_buke_background_img").css('opacity', ui.value/100);
    }
  })

  $('#background_xuanzhuan').slider({
    range: 'min',
    min: -180,
    max: 180,
    values: 100,
    create: function(event, ui) {
      $("#background_xuanzhuan_amount").val('0deg');
    },
    slide: function (event, ui) {
      $("#background_xuanzhuan_amount").val(ui.value+' deg');
      $("#postcard_buke_background_img").css('transform', "rotate("+ui.value+"deg)");
    }
  })

  $('#background_radius').slider({
    range: 'min',
    min: 0,
    max: 50,
    values: 100,
    create: function(event, ui) {
      $("#background_radius_amount").val('0px');
    },
    slide: function (event, ui) {
      $("#background_radius_amount").val(ui.value+' px');
      $("#postcard_buke_background_img").css('border-radius', ui.value+"px");
    }
  })

  $("#amount").val($('#slider').slider('value'))
  $('#postcard_content_cant').css('fontSize', $('#slider').slider('value'))
})
/** 修改字体 */
function changeFontFamily(event, fontFamily, accesskey, lineHeight) {
  var obj = event.srcElement.parentNode;
  obj = $(obj);
  obj.addClass('active');
  var siblings = obj.siblings();
  siblings.removeClass('active');
  objchangefont(font_dom, accesskey);
  return false;
}

function show_category() {
  $("#dropdown-menu").slideToggle(300);
}

function changePostCardBackground(event, id) {
    $.ajax({
        url : "/postCard/"+id,
        type: 'GET',
        success : function (data) {
            var back = $("#postcard_buke_background_img");
            back.css('backgroundImage','url('+data['image']+')');
        },
        fail : function () {

        }
    })

    obj = $(event.srcElement);
    obj.addClass('postcard_tums_active');
}

function show_postcard_content(i) {
  show_category();
  console.log(vm.$data);
  $("#postcard_category").show();
  if(i == 1) {
    $("#postcard_content").fadeIn();
    $("#postcard_content_cant").hide();
    $("#cantpostcard").removeClass('menu_active')
    $("#postcard_button").val("可编辑明信片")
  } else {
    $("#postcard_content").hide();
    $("#postcard_content_cant").fadeIn();
    $("#cantpostcard").addClass('menu_active') 
    $("#postcard_button").val("不可编辑明信片")
  }
}

function show_cate_hide_text () {
  
}

/**
 * 颜色相关
 */
$('#letter_all_colors').ColorPicker({
  onShow: function(colpkr) {
    $(colpkr).fadeIn(200);
    return false;
  },
  onHide: function(colpkr) {
    $(colpkr).fadeOut(200);
    return false;
  },
  onChange: function(hex, hsb) {
    console.log(hex);
    $("#buke_postcard_text").css('color', '#' + hsb);
  }
})

$(".letter_color").click(function() {
  var color = this.style.backgroundColor;
  var letter_container = document.getElementById('#buke_postcard_text');
  letter_container.style.color = color;
  var siblings = $(this).siblings();
  $(this).addClass('active');
  for (var i = 0; i < siblings.length; i++) {
    $(siblings[i]).removeClass('active');
  }
})

/** 上传邮票 */
