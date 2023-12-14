/* navbar slider */
$('.owl-carousel.text').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:1
        },
    }
})

$('.catSliders ul').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:4
        },
    }
})

$('.catSliders3 ul').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        768:{
            items:3
        },
    }
})

$('.horoscopes ul').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    margin:20,
    responsive:{
        0:{
            items:2
        },
        768:{
            items:6
        },
    }
})


/* stars rate */
$(document).ready(function(){
  
    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){
      var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
     
      // Now highlight all the stars that's not after the current hovered star
      $(this).parent().children('li.star').each(function(e){
        if (e < onStar) {
          $(this).addClass('hover');
        }
        else {
          $(this).removeClass('hover');
        }
      });
      
    }).on('mouseout', function(){
      $(this).parent().children('li.star').each(function(e){
        $(this).removeClass('hover');
      });
    });
    
    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
      var onStar = parseInt($(this).data('value'), 10); // The star currently selected
      var stars = $(this).parent().children('li.star');
      
      for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
      }
      
      for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
      }
      
    });
    
  });

  
  if( $(window).width() < 768){
    $(".headerNav").insertAfter(".logo");
    $(".socialMedia").insertAfter(".ftbarLink");
  };
  
  $('.searchIcon').click(function(){
    $('.searchArea').toggleClass('dispBlock');
  });

  $('.collapseList').find(".hidden").click(function(){
    $(this).addClass('dispNone');
    $(".show").removeClass('dispNone');
    $(".show").addClass('dispBlock');
    $(".collapseList ul").addClass('maxList');
  });

  $('.collapseList').find(".show").click(function(){
    $(this).removeClass('dispBlock');
    $('.hidden').removeClass('dispNone');
    $(".collapseList ul").removeClass('maxList');
  });


$(function(){ //loadmore fonksiyonu
  $(".prodCartKapsar").find(".productCartv2").slice(0, 9).show(); //gorunecek alan
  $("#load").click(function(e){ 
      e.preventDefault();
      $(".productCartv2:hidden").slice(0, 3).show(); //kacar adet eklenecek
  });
});

$(function(){ //loadmore fonksiyonu
  $("#productsSub2").find(".productCart").slice(0, 9).show(); //gorunecek alan
  $("#load").click(function(e){ 
      e.preventDefault();
      $(".productCart:hidden").slice(0, 3).show(); //kacar adet eklenecek
  });
});