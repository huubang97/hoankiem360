
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

  if (scroll >= 28) {
    $('.wr-header-bot').addClass("scroll-on");
  } else {
    $('.wr-header-bot').removeClass("scroll-on");
  }
});

// giỏ hàng
$('.box-icon-cart').click(function(){
  $('.wr-cart').css('right','0');
})
$('.colse-cart-mobile').click(function(){
  $('.wr-cart').css('right','-510px');
})

// menu mobile
$('.icon-menu-mobile').click(function(){
  $('.menu-mobile').css('left','0');
  $('.mask-mobile').css({'visibility':'visible','opacity':'1'})
})

$('.colse-menu-mobile').click(function(){
  $('.menu-mobile').css('left','-300px');
  $('.mask-mobile').css({'visibility':'hidden','opacity':'0'})
})

function increaseCount(a, b) {
  var input = b.previousElementSibling;
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}

function decreaseCount(a, b) {
  var input = b.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}

$('.box-log.boxOn').click(function(){
  $('.box-log-info').toggleClass('on');
})


$('.box-chevor').click(function(){
  let hei = $('.wr-banner').height();
  $('html, body').animate({scrollTop:hei}, '800');
})

$('.wr-banner .mask').click(function(){
  $('.wr-banner .mask').remove();
})


$('.ifram_destination .mask').click(function(){
  $('.ifram_destination .mask').remove();
})


function mouseover(e) {
  $('.blog-box').removeClass('selected');
  $(e).addClass('selected');
  $('.blog-box .mask').css('background','rgba(0, 0, 0, 0.6)');
  $(e).find('.mask').css('background','none');
}

function btnMenu(e) {
  $('.menu-map').toggleClass('on');
  $('.iframe-map').toggleClass('on2');
}

function tabLogRegis(e,tab) {
  $('.wr-form-res').children('form').attr('hidden','hidden');
  if(tab=='individual') {
    $('.wr-form-res').find('.tab-check').removeClass('lbchecked');
    $('.wr-form-res').find('.tab-check[for="'+tab+'"]').addClass('lbchecked');
    $('.wr-form-res > form:first-child()').removeAttr('hidden');
  }else if (tab=='company') {
    $('.wr-form-res').find('.tab-check').removeClass('lbchecked');
    $('.wr-form-res').find('.tab-check[for="'+tab+'"]').addClass('lbchecked');
    $('.wr-form-res > form:nth-child(2)').removeAttr('hidden');
  }
}

// show eyes
function eyeShow(e) {
  $(e).toggleClass('showOn');
  if($(e).hasClass('showOn')) {
    $(e).parents('label.eye').children('input').attr('type','text');
  }else {
    $(e).parents('label.eye').children('input').attr('type','password');
  }
}

function rePost(e){
  $(e).toggleClass('btn-clearcm');
}

function reload(e,onMonth) {
  let month = $(e).val();
  if(month=='') {
     window.location="su_kien";
  }else if(onMonth == month) {

  }else {
    window.location="su_kien?month="+month;
  }
}

function reloadNotice(e) {
  let idNotice = $('#idNotice').val();
   window.location=idNotice+".html";
  
}

// load event
function loadEvent(e) {
  var month = $(e).attr('data-month');
  //var url = 'su_kien?month='+month;
  $.ajax({
      type: "GET",
      url: 'ajax_event',
      data:{ month:month }
    }).done(function( msg ) {
      var msg = JSON.parse(msg);
      $('.box-month-event').html(msg.text);
      $('.main-month-event').flickity({
        cellAlign: 'left',
        contain: true,
        fade: true,
        pageDots: false,
        draggable: false,
        contain: true
      });
      if(msg.code==2){
        $('.box-month-event').css('background','#efb138');
      }else {
        $('.box-month-event').css('background','#fff');
      }
    });
}

$('.nav-nav .previous').click(function(){
 	var month = $('.nav-nav .carousel-cell.is-selected').attr('data-month');
  	alert(month);
})

function loadEventNextPrev(e) {
  var month = $('.nav-nav .is-selected').attr('data-month');
  //var url = 'su_kien?month='+month;
  $.ajax({
      type: "GET",
      url: 'ajax_event',
      data:{ month:month }
    }).done(function( msg ) {
      var msg = JSON.parse(msg);
      $('.box-month-event').html(msg.text);
      $('.main-month-event').flickity({
        cellAlign: 'left',
        contain: true,
        fade: true,
        pageDots: false,
        draggable: false,
        contain: true
      });
      if(msg.code==2){
        $('.box-month-event').css('background','#efb138');
      }else {
        $('.box-month-event').css('background','#fff');
      }
    });
}

// load Notice
function loadNoticeKM(e,id=3) {
  $('.main-notice:not(".main-notice'+id+'")').attr('hidden','hidden');
  $('.main-notice'+id).removeAttr('hidden');
  $('.navs-tab > a').removeClass('selected');
  $(e).addClass('selected');
}

// menu scroll 
$(document).ready(function() {
    $('a[href*="#"]').bind('click', function(e) {
        e.preventDefault(); // prevent hard jump, the default behavior
        $('.wr-menu-mb').removeClass('menu-mb-active');
        var target = $(this).attr("href"); // Set the target as variable)
        // perform animated scrolling by getting top-position of target-element and set it as scroll target
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 500, function() {
            location.hash = target; //attach the hash (#jumptarget) to the pageurl
        });

        return false;
    });
    $('.main-notice:not(".main-notice3")').attr('hidden','hidden');

    $('.nav-nav .flickity-prev-next-button').attr('onclick','loadEventNextPrev(this)');
});

$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();

    // Show/hide menu on scroll
    //if (scrollDistance >= 850) {
    //    $('nav').fadeIn("fast");
    //} else {
    //    $('nav').fadeOut("fast");
    //}
  
    // Assign active class to nav links while scolling
    $('.page-section').each(function(i) {
        if ($(this).position().top <= scrollDistance+40) {
            $('.navigation a.active-menu').removeClass('active-menu');
            $('.navigation a').eq(i).addClass('active-menu');
        }
    });
}).scroll();


// tab dang nhap
