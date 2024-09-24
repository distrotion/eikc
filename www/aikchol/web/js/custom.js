$(document).ready(function() {
	jQuery.easing.def = 'easeOutQuint';
	//$('input, textarea').placeholder();	
	
	
	$(window).load(function(){
		$("#cover").delay(500).fadeOut(1000);
    
    
	});

	var winWidth =$(window).width();
    
    (function($,sr){
        var debounce = function (func, threshold, execAsap) {
            var timeout;
    
          return function debounced () {
              var obj = this, args = arguments;
              function delayed () {
                  if (!execAsap)
                      func.apply(obj, args);
                  timeout = null;
              };
    
              if (timeout)
                  clearTimeout(timeout);
              else if (execAsap)
                  func.apply(obj, args);
    
              timeout = setTimeout(delayed, threshold || 100);
          };
      }
      // smartresize 
      jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
    
    })(jQuery,'smartresize');

    function getDocHeight() {
      var D = document;
      return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
      );
    }

    $(window).scroll(function(){
      if($("#home_main_nav").length > 0){
        var slideHeight = $("#main_slide_container").height();
        if($(this).scrollTop() > slideHeight){
          $("body").addClass("scrolled");
          $(".main_nav_container").addClass("fix_top");
          $(".mobile_nav_whole").addClass("fix_top");
        }else{
          $("body").removeClass("scrolled");
          $(".main_nav_container").removeClass("fix_top");
          $(".mobile_nav_whole").removeClass("fix_top");
        }    
      }else{
        var langHeight = $(".lang_container").height();
        if($(this).scrollTop() > langHeight){
          $("body").addClass("scrolled");
          $(".main_nav_container").addClass("fix_top");
          $(".mobile_nav_whole").addClass("fix_top");
        }else{
          $("body").removeClass("scrolled");
          $(".main_nav_container").removeClass("fix_top");
          $(".mobile_nav_whole").removeClass("fix_top");
        }  
      }

      if($(this).scrollTop() > 0){
        $('#to_top_container').addClass('move_up');
      } else {
        $('#to_top_container').removeClass('move_up');
      }

      if($(window).scrollTop() + $(window).height() >= getDocHeight() - $('footer').outerHeight() ) {
           $("#to_top_container").addClass("stop_move");
          }else{
          $("#to_top_container").removeClass("stop_move");
      }    
    });

    $(".to_top_btn").on('click', function(){
        $('html, body').stop().animate({
            'scrollTop': 0
        }, 800, 'swing');
    
      return false;
    });

    $(".mobile_btn").on('click',function(){
      $(this).toggleClass('open_nav');
      $('.mobile_nav').stop(true,true).slideToggle();
    });

    $(".mobile_product_nav").on('click',function(){
      $(".mobile_sub_nav").stop(true,true).slideToggle();
    });

    $(".sub_nav_btn").on('click', function(){
        $(this).toggleClass('sub_open');
        $(".section_sub_nav").stop(true,true).slideToggle();
        return false;
    });

    

    $('.med_nav').hover(function(){
      $(".sub_nav_container").stop(true,true).slideDown();
    },function(){
      $(".sub_nav_container").stop(true,true).slideUp();
    });

    $('.package_list li').hover(function(){
      $(this).find(".package_list_detail").stop(true,true).slideDown();
    },function(){
      $(this).find(".package_list_detail").stop(true,true).slideUp();
    });

    $('.csr_list li').hover(function(){
      $(this).find(".csr_list_detail").stop(true,true).slideDown();
    },function(){
      $(this).find(".csr_list_detail").stop(true,true).slideUp();
    });

    $('.tips_list li').hover(function(){
      $(this).find(".tips_list_detail").stop(true,true).slideDown();
    },function(){
      $(this).find(".tips_list_detail").stop(true,true).slideUp();
    });

    $('#room_slide .slide').hover(function(){
      $(this).find(".room_slide_detail").stop(true,true).slideDown();
    },function(){
      $(this).find(".room_slide_detail").stop(true,true).slideUp();
    });



    

    if($('#main_slide').length > 0){
      $('#main_slide').cycle({
         fx: 'scrollHorz',
         timeout: 4000,
         speed:   1500,
         slides: "> div",
         pager: $('#pager'),
         swipe: true
      });

      if($('#main_slide > div').length < 2) {
      
        $("#pager").hide();
      }
    }

    if($('#room_slide').length > 0){
      $('#room_slide').slick({
          centerMode: true,
          centerPadding: '25%',
          slidesToShow: 1,
          autoplay: false,
          autoplaySpeed: 2000,
          arrows: false,
          responsive: [
              {
                breakpoint: 1199,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '25%',
                  slidesToShow: 1
                }
              },
              {
                breakpoint: 991,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '15%',
                  slidesToShow: 1
                }
              },
              {
                breakpoint: 767,
                settings: {
                  arrows: false,
                  centerMode: true,
                  centerPadding: '0',
                  slidesToShow: 1
                }
              }
          ]   
      });

    }

    $("#next_btn").on('click',function(){
        $('#room_slide').slick('slickNext');
        return false;
    });

    $("#prev_btn").on('click',function(){
        $('#room_slide').slick('slickPrev');
        return false;
    });

    $('.doctor_thumb').hover(function(){
      $(this).find(".make_appointment_container").stop(true,true).fadeIn();
    },function(){
      $(this).find(".make_appointment_container").stop(true,true).fadeOut();
    });

    $(".make_appointment_container .hover_btn2").on('click',function(){
      $('.popup_container').stop(true,true).fadeIn();
      if(Modernizr.touch) {
        $('html').addClass('stop_scroll');
        $('body').addClass('stop_scroll');
      }
      return false
    })

    
    $(".appointment_btn").on('click',function(){
      $('.popup_container').stop(true,true).fadeIn();
      if(Modernizr.touch) {
        $('html').addClass('stop_scroll');
        $('body').addClass('stop_scroll');
      }
      return false
    })


    $(".close_btn").on('click',function(){
      $('.popup_container').stop(true,true).fadeOut();
      if(Modernizr.touch) {
        $('html').removeClass('stop_scroll');
        $('body').removeClass('stop_scroll');
      }
      return false
    })

    $('.social_main_img').hover(function(){
      $(this).find(".social_main_detail").stop(true,true).fadeIn();
    },function(){
      $(this).find(".social_main_detail").stop(true,true).fadeOut();
    });

    $('.award_main_img').hover(function(){
      $(this).find(".social_main_detail").stop(true,true).fadeIn();
    },function(){
      $(this).find(".social_main_detail").stop(true,true).fadeOut();
    });

    $(".make_appointment_container .hover_btn2").on('click',function(){
      $('.popup_container').stop(true,true).fadeIn();
      return false
    })


    $('#contact_form').validate({
      submitHandler: function(form) {
        var params = {
           name : $('input[name=name]').val(),
           email : $('input[name=email]').val(),
           subject : $('input[name=subject]').val(),
           detail : $("#contact_detail").val(),
        }

        $.post($('#contact_form').attr('action'), params);

        //$('input[type=text]').val("");
        //$('input[type=email]').val("");
        //$('textarea').val("");
        $("#thankyou_container").stop(true,true).fadeIn();
      } 

    });

    $('.news_letter_form').validate({
      submitHandler: function(form) {
        form.submit();
      } 

    });

    $('.appointement_form').validate({
      submitHandler: function(form) {
        var params = {
          specialty: $('#select_specialty').val(),
          doctor: $('#select_doctor').val(),
          date: $('select[name=date]').val(),
          time: $('select[name=time]').val(),
          desc: $('textarea[name=describe]').val(),
          name : $('input[name=name]').val(),
          lastname: $('input[name=last_name').val(),
          birthdate: $('input[name=dob').val(),
          gender: $('select[name=gender]').val(),
          phone: $('input[name=phone]').val(),
          email: $('input[name=email]').val(),
          national: $('select[name=nationality]').val(),
          register: $('input[name=register]').val(),
          _csrf: $('input[name=_csrf]').val(),
        }

        $.post($('.appointement_form').attr('action'), params);

        $('input[type=text]').val("").hide();
        $('input[type=email]').val("").hide();
        $('input[type=submit]').hide();
        $('textarea').val("").hide();
        $('select').val("").hide();
        $(".appointment_field").hide();
        $("#thankyou_appointment_container").stop(true,true).fadeIn();
            
      } 

    });

    $('#apply_form1').validate({
      submitHandler: function(form) {
        //var params = {
          // name : $('input[name=name]').val(),
          // email : $('input[name=email]').val(),
          // subject : $('input[name=subject]').val(),
          // message : $("#message_box").val(),
       
        //}

        //$('input[type=text]').val("")
        //$('select').val("")
        form.submit();
            
      } 

    });


    $('.apply_form').validate({
      submitHandler: function(form) {
        //var params = {
          // name : $('input[name=name]').val(),
          // email : $('input[name=email]').val(),
          // subject : $('input[name=subject]').val(),
          // message : $("#message_box").val(),
       
        //}

        /*$('input[type=text]').val("")
        $('input[type=email]').val("")
        $('input[type=radio]').val("")
        $('select').val("")*/

        form.submit();
            
      } 

    });

    $('.need_num').each(function() {
      $(this).rules('add', {
          number: true
      });
  });

    
    

    

    
    
	
});