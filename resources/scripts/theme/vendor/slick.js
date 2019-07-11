import '~/slick-carousel/slick/slick.js';
import '~/slick-carousel/slick/slick.css';

$(document).ready(()=>{
  $('.internships-carousel').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: $('i.left-carousel-arrow'),
    nextArrow: $('i.right-carousel-arrow'),
    responsive:
    [
      {
        breakpoint: 1050,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
        }
      },
      {
        breakpoint: 650,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }
      }
    ]
  });
})
