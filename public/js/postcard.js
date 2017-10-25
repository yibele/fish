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
      console.log(ui.value)
      $("#postcard_content_cant").css('fontSize', ui.value);
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
  letter_neirong.style.lineHeight = lineHeight;
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
  console.log('click');
  var color = this.style.backgroundColor;
  var letter_container = document.getElementById('#buke_postcard_text');
  letter_container.style.color = color;
  var siblings = $(this).siblings();
  $(this).addClass('active');
  for (var i = 0; i < siblings.length; i++) {
    $(siblings[i]).removeClass('active');
  }
})