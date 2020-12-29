$(document).ready(function(){ 
    $(".nav-tabs a").click(function(){
      $(this).tab('show')

      setTimeout(function(){ 

          var swiper = new Swiper('.swiper-container', {
          slidesPerView: 1,
        //   slidesPerColumn: 2,  
          spaceBetween: 30,   
          loop: true,
          autoplay: {
              delay: 2500,
              disableOnInteraction: true,
          },     
          navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
          },
          breakpoints: {
                  '@0.00': {
                  slidesPerView: 1,
                  spaceBetween: 10,
                  },
                  '@0.75': {
                  slidesPerView: 2,
                  spaceBetween: 20,
                  },
                  '@1.00': {
                  slidesPerView: 3,
                  spaceBetween: 40,
                  },
                  '@1.50': {
                  slidesPerView: 4,
                  spaceBetween: 50,
                  },
              }   
          });



       }, 200);
     
      });




  var swiper = new Swiper('.swiper-container', {
          slidesPerView: 1,
          spaceBetween: 30,     
          loop: true,
          autoplay: {
              delay: 2500,
              disableOnInteraction: true,
          },     
          navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
          },
          breakpoints: {
                  '@0.00': {
                  slidesPerView: 1,
                  spaceBetween: 10,
                  },
                  '@0.75': {
                  slidesPerView: 2,
                  spaceBetween: 20,
                  },
                  '@1.00': {
                  slidesPerView: 3,
                  spaceBetween: 40,
                  },
                  '@1.50': {
                  slidesPerView: 4,
                  spaceBetween: 50,
                  },
              }  
          });

});