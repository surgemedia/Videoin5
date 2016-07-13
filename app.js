/*===================================
=            GLOBAL INIT            =
===================================*/
// makes sure the whole site is loaded
jQuery(window).load(function() {
        // will first fade out the loading animation
    jQuery(".status").fadeOut();
        // will fade out the whole DIV that covers the website.
    jQuery(".preloader").delay(1000).fadeOut("slow");
})
/*=============================================
=           New Tab System          =
=============================================*/

function notRequired(e){
  $('.errors').removeClass('show');
  $('.errors p').remove();
  value_elements = [];
  $(e).toggleClass('required');
}



//step 2 Show Video Upload
function show_video_upload(){
$('#upload_box_video').removeClass('hide');
$('#upload_box_video').addClass('show');
}

function unhide(e){
$(e).removeClass('hide');
$(e).addClass('show');
}

function reveal(hide,show){ 
    $(hide).removeClass('show');
    $(show).removeClass('hide');
    $(hide).addClass('hide');
    $(show).addClass('show');
}

function stepsClass(index){
 var steps = $('#how_it_works li');
 if(!$(steps[0]).hasClass('completed')){
  $(steps[0]).addClass('completed');
}
$(steps[index]).removeClass('error_step');

 $(steps[index]).addClass('completed');
 var current_e = steps[index];
 $(current_e).find('i').remove();
 $(current_e).find('.icon_border').append('<i class="fa fa-thumbs-o-up"></i>');
}
function wrongStep(index){
 var steps = $('#how_it_works li');
$(steps[index]).addClass('error_step');
$(steps[index]).removeClass('completed');

 var current_e = steps[index];
 $(current_e).find('i').remove();
 $(current_e).find('.icon_border').append('<i class="fa fa-thumbs-o-down"></i>');
}


function goBackTab(number){
  if(master_tab_index < 0 || number < 0){
    number = 0;
    master_tab_index = 0;
  }
   master_tab_index = number;
   var tabs = $('#app li.form_step');
   $('#app li.form_step').removeClass('current');
   $(tabs[master_tab_index]).addClass('current');
   wrongStep(number);
}


var master_tab_index = 0;
function autoTabing(){
    master_tab_index-1;
    $('.next.button_trigger').click(function(event) {
    master_tab_index++;
    var tabs = $('#app li.form_step');
    $('#app li.form_step').removeClass('current');
    $(tabs[master_tab_index]).addClass('current');
    stepsClass(master_tab_index-1);
    removeText(master_tab_index);
    validateSteps(master_tab_index);

    });
}
autoTabing();

function validateSteps(index){
  if(index == 2){
    var result = required('#step_2 div','.required', 'Please upload a logo or use the text box provided','You need to select a video for us to make awesome');
    if(result != true){
      goBackTab(1);

    }

  }
  if(index == 3){
   var result = required('#step_3 div','.required', 'Please Select an animation style. When you have it will display below in green.');
    if(result != true){
      goBackTab(2);

    }
  }
 if(index == 4){
   var result = required('#step_4 .video_message','.required.textarea2', 
    "Untick the box if you don't want to display text in this area.","Untick the box if you don't want to display text in this area.","Untick the box if you don't want to display text in this area.");
    if(result != true){
      goBackTab(3);

    }
  }
  
}
function CheckRequired(checkbox,inputbox){

  if($(checkbox).prop('checked')){
    if(!$(inputbox).hasClass('required')){
    $(inputbox).addClass('required');
    }
  } else {
    $(inputbox).removeClass('required');
  }
}
$('#upper_message_check').prop('checked', true);
$('#middle_message_check').prop('checked', true);
$('#bottom_message_check').prop('checked', true);




function removeText(index){
  if(index > 0){
    var steps_text = $('#how_it_works li p');
    $(steps_text).addClass('hide')
  }
}


function stickyHeader(){
  $(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
   // console.log(scroll);
   if(scroll > 1000){ 
    $('#vidbg').slideUp(400);
    $('#small_header').removeClass('hide');
    $('#faq').addClass('hide');
     }
});
}

stickyHeader();


function next_tab(next_step, trigger) {
    $(trigger).click(function(event) {
    var old_tab = $('li').hasClass('current');
    old_tab.removeClass('current');
    $(next_step).addClass('current');
    });
}

function isTrue(element, index, array) {
  return (element == true);
}

  function required(){
  $('.errors p').remove();
  var element = arguments[0];
  var form_element = arguments[1]
  var error_message = [];
  var value_elements = [];
  var result = false;
  for (var i = arguments.length - 1; i >= 2; i--) {
    error_message.push(arguments[i]);
  };
  var check_input = $(element).children(form_element);
  // console.log(check_input);
  for (var i = check_input.length - 1; i >= 0; i--) {
  var val = $(check_input[i]).val();
  //If Element is false push
  if(val <= 0){
    value_elements.push(false);
  } else {
  //true
    value_elements.push(true);
  }
  };
  for (var i = value_elements.length - 1; i >= 0; i--) {
    console.log(value_elements);
    if(!value_elements[i]){
    $('.errors').addClass('show');
    if(error_message[i] != undefined){
    $('.errors').append('<p><i class="fa fa-warning"></i>  '+error_message[i]+'</p>');
    }
  } 
  };
  if(value_elements.every(isTrue)){
    $('.errors').removeClass('show');
     $('.errors p').remove();
     result = true;
  };
 return result;
}


// required('#step_1','.required','Please fill in all fields');
required('#step_3','.required','Please fill in all fields');
required('#step_4','.required','Please fill in all fields');
required('#step_4','.required','Please fill in all fields');




/* =================================
===  WOW ANIMATION             ====
=================================== */
wow = new WOW(
  {
  });
wow.init();

jQuery.localScroll();
/*=========================================
=            Create New Object            =
=========================================*/
    $(function () {

      // Slideshow 1
      $(".rslides").responsiveSlides({
        maxwidth: 960,
        minheight: 400,
        speed: 700,
        auto:false,
        pager: true,
        // nav: true,
        prevText: "",   // String: Text for the "previous" button
        // nextText: "Next Step" 
      });

     

    });

$('#animations li').click(function(event) {
  var name = $(this).find('input').attr('value');
  $('p.name').text('');
  $('#animation_style').val(name);
  $(this).find('p').text(name);
});

// function loadingTrigger(id) {
//   $(id).click(function(event) {
//     $(document).ready(function(){
//     $("#spinner").bind("ajaxSend", function() {
//          $('body').append("<div id='overlay'><i id='loader'></i></div>");
//     }).bind("ajaxStop", function() {
//         $('#overlay
//           ')
//     }).bind("ajaxError", function() {
//         $(this).hide();
//     });
 
//      });
//     /* Act on the event */
   
//   });
// }

// BRAD's JAVASCRIPT
      $('#realtime_tcname').change(function(){ $('#upper_cname-2').val($(this).val()); });    
      $('#realtime_mcname').change(function(){ $('#middle_cname-2').val($(this).val()); });   
      $('#realtime_bcname').change(function(){ $('#bottom_cname-2').val($(this).val()); });   
      $('#cfont_style').change(function(){ $('#cfont_style-2').val($(this).val()); });    
      $('#cfont_size').change(function(){ $('#cfont_size-2').val($(this).val()); });    
      $('#cfont_tran').change(function(){ $('#cfont_tran-2').val($(this).val()); });    
      $('#cfont_style2').change(function(){ $('#cfont_style2-2').val($(this).val()); });    
      $('#cfont_size2').change(function(){ $('#cfont_size2-2').val($(this).val()); });    
      $('#cfont_tran2').change(function(){ $('#cfont_tran2-2').val($(this).val()); });    
      $('#cfont_style3').change(function(){ $('#cfont_style3-2').val($(this).val()); });    
      $('#cfont_size3').change(function(){ $('#cfont_size3-2').val($(this).val()); });    
      $('#cfont_tran3').change(function(){ $('#cfont_tran3-2').val($(this).val()); });    
      $('#cbackgroup_color').change(function(){ $('#cbackgroup_color-2').val($(this).val()); });    
      $('#backgroup_color').change(function(){ $('#backgroup_color-2').val($(this).val()); });    
      $('#realtime_upmsg').change(function(){ $('#upper_message-2').val($(this).val()); });   
      $('#realtime_mdmsg').change(function(){ $('#middle_message-2').val($(this).val()); });    
      $('#realtime_bumsg').change(function(){ $('#bottom_message-2').val($(this).val()); });    
      $('#font_style').change(function(){ $('#font_style-2').val($(this).val()); });    
      $('#font_size').change(function(){ $('#font_size-2').val($(this).val()); });    
      $('#font_tran').change(function(){ $('#font_tran-2').val($(this).val()); });    
      $('#font_style2').change(function(){ $('#font_style2-2').val($(this).val()); });    
      $('#font_size2').change(function(){ $('#font_size2-2').val($(this).val()); });    
      $('#font_tran2').change(function(){ $('#font_tran2-2').val($(this).val()); });    
      $('#font_style3').change(function(){ $('#font_style3-2').val($(this).val()); });    
      $('#font_size3').change(function(){ $('#font_size3-2').val($(this).val()); });    
      $('#font_tran3').change(function(){ $('#font_tran3-2').val($(this).val()); });    
      $('#fname').change(function(){ $('#fname-2').val($(this).val()); });    
      $('#email').change(function(){ $('#email-2').val($(this).val()); });    
      $('#mobile').change(function(){ $('#mobile-2').val($(this).val()); });    
      $('input[name=group]').change(function(){ $('#group-2').val($(this).val()); });   
      $('input[name=pcode]').change(function(){ $('#pcode-2').val($(this).val()); });   
      $('select[name=color_match]').change(function(){ $('#color_match-2').val($(this).val()); });    
      $('textarea[name=notes]').change(function(){ $('#notes-2').val($(this).val()); });    
      $('#logo_file').change(function(){
          $('#logo').val('Logo File Name: ' + $(this).val());
          $( "#companyname" ).addClass("disappear");
          $( "#mission_logo" ).removeClass("disappear");
      });   
      $('#video_file').change(function(){
          $('#video').val('Video File Name: ' + $(this).val());
      });
      $('#font_style').change(function(){
        var jq_style1 = $(this).val();
        $('#realtime_upmsg').css('font-family', jq_style1), 'important';
      });
      $('#font_size').change(function(){
        var jq_style2 = $(this).val();
        $('#realtime_upmsg').css('font-size', jq_style2, 'important');
      });
      $('#font_tran').change(function(){
        var jq_style3 = $(this).val();
        $('#realtime_upmsg').css('text-transform', jq_style3, 'important');
      });
      $('#cfont_style').change(function(){
        var jq_style11 = $(this).val();
        $('#realtime_tcname').css('font-family', jq_style11), 'important';
      });
      $('#cfont_size').change(function(){
        var jq_style12 = $(this).val();
        $('#realtime_tcname').css('font-size', jq_style12, 'important');
      });
      $('#cfont_tran').change(function(){
        var jq_style13 = $(this).val();
        $('#realtime_tcname').css('text-transform', jq_style13, 'important');
      });
      $('#font_style2').change(function(){
        var jq_style4 = $(this).val();
        $('#realtime_mdmsg').css('font-family', jq_style4), 'important';
      });
      $('#font_size2').change(function(){
        var jq_style5 = $(this).val();
        $('#realtime_mdmsg').css('font-size', jq_style5, 'important');
      });
      $('#font_tran2').change(function(){
        var jq_style6 = $(this).val();
        $('#realtime_mdmsg').css('text-transform', jq_style6, 'important');
      });
      $('#cfont_style2').change(function(){
        var jq_style14 = $(this).val();
        $('#realtime_mcname').css('font-family', jq_style14), 'important';
      });
      $('#cfont_size2').change(function(){
        var jq_style15 = $(this).val();
        $('#realtime_mcname').css('font-size', jq_style15, 'important');
      });
      $('#cfont_tran2').change(function(){
        var jq_style16 = $(this).val();
        $('#realtime_mcname').css('text-transform', jq_style16, 'important');
      });
      $('#font_style3').change(function(){
        var jq_style7 = $(this).val();
        $('#realtime_bumsg').css('font-family', jq_style7), 'important';
      });
      $('#font_size3').change(function(){
        var jq_style8 = $(this).val();
        $('#realtime_bumsg').css('font-size', jq_style8, 'important');
      });
      $('#font_tran3').change(function(){
        var jq_style9 = $(this).val();
        $('#realtime_bumsg').css('text-transform', jq_style9, 'important');
      });
      $('#cfont_style3').change(function(){
        var jq_style17 = $(this).val();
        $('#realtime_bcname').css('font-family', jq_style17), 'important';
      });
      $('#cfont_size3').change(function(){
        var jq_style18 = $(this).val();
        $('#realtime_bcname').css('font-size', jq_style18, 'important');
      });
      $('#cfont_tran3').change(function(){
        var jq_style19 = $(this).val();
        $('#realtime_bcname').css('text-transform', jq_style19, 'important');
      });
      $( "#backgroup_color" ).change(function () {
        $( "#realtime_upmsg" ).removeClass("bg_White bg_Black");
        $( "#realtime_mdmsg" ).removeClass("bg_White bg_Black");
        $( "#realtime_bumsg" ).removeClass("bg_White bg_Black");
        $( "#realtime_tcname" ).removeClass("bg_White bg_Black");
        $( "#realtime_mcname" ).removeClass("bg_White bg_Black");
        $( "#realtime_bcname" ).removeClass("bg_White bg_Black");
        var colorclass = "";
        $( "#backgroup_color option:selected" ).each(function() {
          colorclass += "bg_"+$( this ).text() + " ";
        });
        $( "#realtime_upmsg" ).addClass(colorclass);
        $( "#realtime_mdmsg" ).addClass(colorclass);
        $( "#realtime_bumsg" ).addClass(colorclass);
        $( "#realtime_tcname" ).addClass(colorclass);
        $( "#realtime_mcname" ).addClass(colorclass);
        $( "#realtime_bcname" ).addClass(colorclass);
      })
      $( "#cbackgroup_color" ).change(function () {
        var jq_style20 = $(this).val();
        $( "#realtime_tcname" ).css('color', jq_style20);
        $( "#realtime_mcname" ).css('color', jq_style20);
        $( "#realtime_bcname" ).css('color', jq_style20);
      })
      .change();
      $('#realtime_upmsg').focus(function() {
        $( "#select_option1" ).removeClass("display disappear");
        $( "#select_option2" ).removeClass("display disappear");
        $( "#select_option3" ).removeClass("display disappear");
        $( "#select_option1" ).addClass("display");
        $( "#select_option2" ).addClass("disappear");
        $( "#select_option3" ).addClass("disappear");
      });
      $('#realtime_mdmsg').focus(function() {
        $( "#select_option1" ).removeClass("display disappear");
        $( "#select_option2" ).removeClass("display disappear");
        $( "#select_option3" ).removeClass("display disappear");
        $( "#select_option1" ).addClass("disappear");
        $( "#select_option2" ).addClass("display");
        $( "#select_option3" ).addClass("disappear");
      });
      $('#realtime_bumsg').focus(function() {
        $( "#select_option1" ).removeClass("display disappear");
        $( "#select_option2" ).removeClass("display disappear");
        $( "#select_option3" ).removeClass("display disappear");
        $( "#select_option1" ).addClass("disappear");
        $( "#select_option2" ).addClass("disappear");
        $( "#select_option3" ).addClass("display");
      });
      $('#realtime_tcname').focus(function() {
        $( "#logo_file" ).addClass("disappear diable_bg_style");
        $( "#logo_file2" ).addClass("display");
        $( "#icon_square_wrapper").addClass("diable_bg_style");
        $( "#logo_icon").addClass("thin_del");
        $( "#logo_icon").removeClass("thin");
        $('#logo').val("");
        $( "#cselect_option1" ).removeClass("display disappear");
        $( "#cselect_option2" ).removeClass("display disappear");
        $( "#cselect_option3" ).removeClass("display disappear");
        $( "#cselect_option1" ).addClass("display");
        $( "#cselect_option2" ).addClass("disappear");
        $( "#cselect_option3" ).addClass("disappear");
      });
      $('#realtime_mcname').focus(function() {
        $( "#logo_file" ).addClass("disappear diable_bg_style");
        $( "#logo_file2" ).addClass("display");
        $( "#icon_square_wrapper").addClass("diable_bg_style");
        $( "#logo_icon").addClass("thin_del");
        $( "#logo_icon").removeClass("thin");
        $('#logo').val("");
        $( "#cselect_option1" ).removeClass("display disappear");
        $( "#cselect_option2" ).removeClass("display disappear");
        $( "#cselect_option3" ).removeClass("display disappear");
        $( "#cselect_option1" ).addClass("disappear");
        $( "#cselect_option2" ).addClass("display");
        $( "#cselect_option3" ).addClass("disappear");
      });
      $('#realtime_bcname').focus(function() {
        $( "#logo_file" ).addClass("disappear diable_bg_style");
        $( "#logo_file2" ).addClass("display");
        $( "#icon_square_wrapper").addClass("diable_bg_style");
        $( "#logo_icon").addClass("thin_del");
        $( "#logo_icon").removeClass("thin");
        $('#logo').val("");
        $( "#cselect_option1" ).removeClass("display disappear");
        $( "#cselect_option2" ).removeClass("display disappear");
        $( "#cselect_option3" ).removeClass("display disappear");
        $( "#cselect_option1" ).addClass("disappear");
        $( "#cselect_option2" ).addClass("disappear");
        $( "#cselect_option3" ).addClass("display");
      });
      $( "#logo_file2" ).click(function() {
        $( "#logo_file" ).removeClass("disappear diable_bg_style");
        $( "#logo_file2" ).removeClass("display");
        $( "#icon_square_wrapper").removeClass("diable_bg_style");
        $( "#logo_icon").removeClass("thin_del");
        $( "#logo_icon").addClass("thin");
      });
      $( "#mission_logo" ).click(function() {
          $( "#companyname" ).removeClass("disappear");
          $( "#mission_logo" ).addClass("disappear");
      });
      $("#submitbutton").click(function() {
        $( "#form1" ).submit();
      });



