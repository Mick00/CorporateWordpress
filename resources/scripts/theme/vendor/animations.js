import {WOW} from '~/wowjs/dist/wow.js';
import '~/animate.css/animate.css';

//import Swup from '~/swup/dist/swup.js';

//const swup = new Swup();
const wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       90,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();
// swup.on('contentReplaced', () =>{
//   wow.sync();
// });
