const vm = new Vue({
  el: "#app",
  data: {
    /**
     * 明信片相关操作参数
     */
    postcard_step: 0,
    /**
     * 首页信件转动特效
     */
    letter_content_test: '',
    trans_class: '',
    trans_class1: '',
    letter: 'img/index/letter.png',
    letter_front: 'img/index/letter.png',
    letter_back: 'img/index/letter_back_03.png',
    letter_back_02: 'img/index/letter_back_02.png',
    card: 'img/index/card.png',
    card_front: 'img/index/card.png',
    card_back: 'img/index/card_back.png',
    card_back_03: 'img/index/card_back_03.png',
    tag1: 0,
    tag: 0,
    count: 0,
    letter_content_background: {
      'backgroundImage': 'url("/img/xinzhi/xinzhi_1.jpg")',
      'backgroundSize': 'contain'
    },
    /** 添加联系人信息页面相关 */
    contactDate: [],
    contactTime: '',
    contactName: '',
    contactPhone: "",
    contactCity: '',
    contactHome: '',
    contactShow: false,
    cur: '',
    contact_page: 1,
    feiyong: 19,
    keep_feiyong: 2,

    /** 支付 获取联系人列表的内容的时候的 dom 元素
     */
    contact_table: '',

    /** 提示信息 任何的提示信息，将显示在屏幕的右上角位置*/
    messageShow: false,
    message: '',

    /** 登录状态 */
    logined: false,
    user: {
      logined: false,
      phone: '',
      user_id: ''
    },

    /** 公开信评论 */
    comment_state: false,
    comment_like: '/img/public_letter/like.png',
    commentStateImg: '/img/public_letter/comment.png'

    /** 明信片部分 */

  },
  computed: {
    feiyong_all: function() {
      return ((this.feiyong + this.keep_feiyong) * this.contactDate.length);
    },
    keep_feiyong_all: function() {
      return (this.keep_feiyong * this.contactDate.length);
    },
    feiyong_total: function() {
      return (this.feiyong * this.contactDate.length);
    },
    feiyong_plus: function() {
      return (this.feiyong + this.keep_feiyong);
    }
  },
  beforeMount: function() {},
  mounted: function() {
    var config = {
      isCol: 'true',
      // p 标签的属性
      colNum: 8,
      marginTop: 0,
      marginBottom: 0,
      marginLeft: '48px',
      marginRight: '68px',
      fontSize: '20px',
      colWidth: '116px',
      // 容器的属性
      paddingTop: '120',
      paddingBottom: '120',
      paddingLeft: '97',
      paddingRight: '97',
      width: '100%',
      height: '100%'
    }
    this.initContainer(config);

  },
  methods: {

    /**
     * 明信片相关操作函数,还有一部分函数在postcard.js中，
     * 因为用传统的jquary区做这些，有一点麻烦，所以改为用vue来做
     */

     /**
      * 修改邮票
      */

      changeStamp : function(e) {
        this.postcard_step == 2;
      },

      showStamps : function(e){
        console.log('haha')
        this.postcard_step = 2;
      },
    /**
     * 点击文字之后，显示文字编辑菜单。
     */
    postCardShowEditFont : function(e) {
      this.postcard_step =1 ;
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
    },

    changeShowOrder: function(){
      this.postcard_step = 0;
      $(".letter_img_lt").removeClass("menu_active")
      $("#cantpostcard").slideToggle();
      
      var index1 = $("#postcard_buke_background_img").css('zIndex')
      var index2 = $("#postcard_buke_background_content").css('zIndex');
  
      $("#postcard_buke_background_content").css('zIndex', index1);
      $("#postcard_buke_background_img").css('zIndex', index2);
    },

    /**
     * 提供消息
     */
    setMessage: function(lid, e) {
      e.stopPropagation();
      $.ajax({
        url: '/editLetter/' + lid,
        type: 'get',
        success: function(data) {
          console.log(data)
        },
        fail: function(data) {
          console.log(data);
        }
      })
      return false;
    },

    /**
     * 公开信评论
     */
    showCommentState: function() {
      this.comment_state = !this.comment_state;
      if (this.comment_state) {
        this.commentStateImg = '/img/public_letter/comment_active.png'
      } else {
        this.commentStateImg = '/img/public_letter/comment.png'
      }
    },
    hideComment: function() {
      this.comment_state = false;
      if (this.comment_state) {
        this.commentStateImg = '/img/public_letter/comment_active.png'
      } else {
        this.commentStateImg = '/img/public_letter/comment.png'
      }
    },
    /**
     * 添加联系人
     */

    addContact: function() {
      this.contactTime = $("#date").val();
      address = this.contactCity + ' ' + this.contactHome;
      if (this.contactTime != '' && this.contactCity != '' && this.contactName != '' && this.contactPhone != '') {
        this.contactDate.push({
          name: this.contactName,
          phone: this.contactPhone,
          address: address,
          time: this.contactTime
        })
        this.contactShow = false;
        this.contactName = '';
        this.contactPhone = '';
        this.contactCity = '';
        this.contactHome = '';
      } else {
        this.contactShow = true;
      }
    },
    /**
     * 删除联系人
     */
    removeCon: function(index) {
      this.contactDate.splice(index, 1);
    },
    turn_to: function(event, i) {
      if (i == 0) {
        if (this.tag == 0) {
          this.tag = 1;
          this.trans_class = 'turn-0-180';
          setTimeout(this.chageImg, 750, this.letter_back, i);
          setTimeout(this.chageImg, 1500, this.letter_back_02, i);
          setTimeout(this.turn_back, 4000, i);
        }
      } else {
        if (this.tag1 == 0) {
          this.tag1 = 1;
          this.trans_class1 = 'turn-0-180';
          setTimeout(this.chageImg, 750, this.card_back_03, i);
          setTimeout(this.chageImg, 1500, this.card_back, i);
          setTimeout(this.turn_back, 4000, i);
        }
      }
    },
    /**
     * 付款
     */

    zhifu: function(lid) {
      var that = this;
      var list = {}
      for (var i = 0; i < this.contactDate.length; i++) {
        list[i] = {
          'address': this.contactDate[i]['address'],
          'name': this.contactDate[i]['name'],
          'phone': this.contactDate[i]['phone'],
          'time': this.contactDate[i]['time'],
          'letters_lid': lid
        }
      }
      $.ajax({
        url: '/saveContact',
        data: JSON.stringify(list),
        type: "post",
        statusCode: {
          419: function() {
            alert('请刷新界面后重新登录');
          }
        },
        success: function(data) {
          document.location.href = "/viewLetter/" + data;
        },
        error: function() {
          alert('error')
        }
      })
    },
    pay: function(num) {
      if (this.contactDate.length != 0) {
        this.messageShow = false;
        var tb = document.getElementById("contact_table");
        this.contact_table = tb;
        this.contact_page = num;
      } else {
        this.messageShow = true;
        this.message = '请先添加联系人，再进入下一步';
      }
    },
    chageImg: function(img, i) {
      if (i == 0) {
        this.letter = img;
      } else {
        this.card = img;
      }
    },
    changeLetterBackground: function(e) {
      var xinzhi = e.currentTarget.src;
      var xinzhi_tum = xinzhi.split('/').pop();
      xinzhi_tum = xinzhi_tum.slice(0, -8);
      xinzhi_tum = 'url(/img/xinzhi/' + xinzhi_tum + '.jpg)';
      this.letter_content_background = {
        'backgroundImage': xinzhi_tum,
        'backgroundSize': 'contain'
      };
    },
    turn_back: function(i) {
      if (i == 0) {
        if (this.tag == 1) {
          let that = this;
          this.trans_class = 'turn-180-0';
          this.letter = this.letter_back;
          setTimeout(this.chageImg, 745, this.letter_front, 0);
          setTimeout(function() {
            that.tag = 0
          }, 1500);
        }
      } else {
        if (this.tag1 == 1) {
          let that = this;
          this.trans_class1 = 'turn-180-0';
          this.card = this.card_back_03;
          setTimeout(this.chageImg, 745, this.card_front, 1);
          setTimeout(function() {
            that.tag1 = 0
          }, 1500);
        }
      }
    },
    initContainer: function(config) {
      var letter_container = document.getElementById('letter_container');
      letter_container.style.paddingTop = config.paddingTop + 'px';
      letter_container.style.paddingBottom = config.paddingBottom + 'px';
      letter_container.style.paddingLeft = config.paddingLeft + 'px';
      letter_container.style.paddingRight = config.paddingRight + 'px';
      letter_container.style.width = config.width;
      letter_container.style.height = config.height;
    },

    colors: function(colors) {

    }
  },
  delimiters: ['${', '}']
})


//------------end of vue ------------------//

window.onload = function() {

  $(".buke_stamp").draggable({cursor: "move",containment: "parent" });

  $("#buke_postcard_text").bind('dblclick',function(e) {
    $(this).css('cursor','move').css('border','2px #ccc dashed').draggable({ containment : 'parent'}).resizable();
    $(".delete_icon").fadeIn();
    $(".expand").fadeIn();
    $(this).draggable("option", "disabled", false )
    $(this).resizable("option", "disabled", false )
  })
  $("#postcard_buke_background_content").on('click',function(e) {
    if(e.target.id != 'buke_postcard_text') {
      $(".delete_icon").fadeOut();
      $(".expand").fadeOut();
      $("#buke_postcard_text").css('cursor','text').css('border','none').draggable("option", "disabled", true );
    }
  })

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var height = $(document.body).height();
  var star = $('.stars').height(height);
  $('.twinkling').height(height);
  /** 检查登录状态 */
  // checkLogin();
};

function showLoginModal(e) {
  $("#loginModal").addClass('is-active')
}

function closeModal(target) {
  $(target).removeClass('is-active');
}


/* 客服modal开关 */
function showModal() {
  $('#kefu').show();
}

function hideModal() {
  $('#kefu').hide();
  $('#loginModal').hide();
}

/* 信件编辑部分 */
$('.dropdown>ul>li').click(function() {
  $(this).addClass('active').siblings().removeClass('active');
  var index = $(this).index();
  for (let i = 0; i < 4; i++) {
    $('.letter_img_lt').removeClass('menu_active');
  }
  $('.letter_img_lt').addClass(function(j, oldClass) {
    if (j == index) {
      return 'menu_active';
    }
  })
});

$('.letter_img_detail').click(function() {
  var siblings = $(this).siblings();
  $(this).addClass('active');
  siblings.removeClass('active');
})

$(".letter_color").click(function() {
  var color = this.style.backgroundColor;
  var letter_container = document.getElementById('letter_container');
  letter_container.style.color = color;
  var siblings = $(this).siblings();
  $(this).addClass('active');
  for (var i = 0; i < siblings.length; i++) {
    $(siblings[i]).removeClass('active');
  }
})

$(".postcard_color").click(function() {
  var color = this.style.backgroundColor;
  var letter_container = document.getElementById('buke_postcard_text');
  letter_container.style.color = color;
  var siblings = $(this).siblings();
  $(this).addClass('active');
  for (var i = 0; i < siblings.length; i++) {
    $(siblings[i]).removeClass('active');
  }
})

/** 信件调色板 */

$('#letter_all_colors').ColorPicker({
  onShow: function(colpkr) {
    $(colpkr).fadeIn(500);
    return false;
  },
  onHide: function(colpkr) {
    $(colpkr).fadeOut(500);
    return false;
  },
  onChange: function(hex, hsb) {
    $("#letter_container").css('color', '#' + hsb);
  }
})

$('#postcard_all_colors').ColorPicker({
  onShow: function(colpkr) {
    $(colpkr).fadeIn(500);
    return false;
  },
  onHide: function(colpkr) {
    $(colpkr).fadeOut(500);
    return false;
  },
  onChange: function(hex, hsb) {
    $("#buke_postcard_text").css('color', '#' + hsb);
  }
})

/** 登录相关 */

/**检查是否登录 **/

function checkLogin() {
  var user = null;
  $.ajax({
    type: 'get',
    url: '/home',
    async: false,
    success: function(data) {
      user = data;
    },
    error: function() {
      return false;
    }
  })
  console.log(user);
  return user;
}

/*
 function checkLogin() {

 var Options = {
 url: '/home',
 type: 'get',
 cache: false,
 timeout: 15000,
 error: function () {
 var textList = '<div id="loginPanel"><li onclick="showLoginModal(1)">登陆&nbsp|</li><li onclick="showLoginModal(2)">注册</li></div>'
 $('#nav_login').append(textList);
 },
 success: function (data, status) {
 $('#loginPanel').hide();
 var data = eval('(' + data + ')');
 }

 }
 console.log('checkLogin');
 $.ajax(Options);
 return false;
 }
 */


/** 登录 */


/** 用户注册 **/


function checkPass() {
  var pass = $('#pass').val();
  if (pass != $("#repass").val()) {
    $('#confirmPass').slideDown();
    return false;
  } else {
    $('#confirmPass').slideUp();
    return true;
  }
}

function sendCode() {
  if (checkPhone()) {
    console.log('checkCode')
    resetCode();
    //发送短信验证码
  }
}

function checkPhone() {
  // 查看手机号是否正确
  var phone = $('#resphone').val();
  if (!(/^1[34578]\d{9}$/.test(phone))) {
    console.log(2)
    $('#confirmPhone').slideDown()
    return false;
  } else {
    $('#confirmPhone').slideUp();
    return true;
  }
}

function resetCode() {
  $('#J_getCode').hide();
  $('#J_second').html('60');
  $('#J_resetCode').show();
  var second = 60;
  var timer = null;
  timer = setInterval(function() {
    second -= 1;
    if (second > 0) {
      $('#J_second').html(second);
    } else {
      clearInterval(timer);
      $('#J_getCode').show();
      $('#J_resetCode').hide();
    }
  }, 1000);
}

$("#my_manfish").click(function(event) {
  event.preventDefault();
  var data = checkLogin();
  console.log(data);
})