import Swiper, { Navigation } from 'swiper';

export default {
  init() {

    if (window.innerWidth > 991) {
      scrollAnimation();
    }

    if (window.innerWidth < 768) {
      const serviceItems = document.querySelectorAll('.services__item');

      if (serviceItems.length) {
        Array.from(serviceItems).forEach((serviceItem) => {
          serviceItem.addEventListener('click', (e) => {
            e.preventDefault();

            serviceItem.querySelector('.services__text').classList.toggle('services__text--active');
          })
        });
      }
    }

    const headerEl = document.querySelector('.header');
    window.addEventListener('scroll', () => {
      // header
      if (window.scrollY > 0 && !headerEl.classList.contains('header--active')) {
        headerEl.classList.add('header--active');
      } else if (window.scrollY <= 0 && headerEl.classList.contains('header--active')) {
        headerEl.classList.remove('header--active');
      }
    });

    const clientsList = document.querySelector('.our-clients__list');
    const clientsItems = document.querySelectorAll('.our-clients__item');

    const initClienstSlider = () => {
      new Swiper('.our-clients__list', {
        slidesPerView: clientsItems.length < 2 ? clientsItems.length : 2,
        loop: false,
        breakpoints: {
          768: {
            slidesPerView: 3,
          },
          991: {
            slidesPerView: 4,
          },
        },
      });
    }

    if (clientsList) {
      initClienstSlider();
    }

    const reviewsSlider = document.querySelector('.reviews__list');
    const reviewsSliderItems = document.querySelectorAll('.reviews__item');

    console.log('reviewsSliderItems.length > ', reviewsSliderItems.length);

    const initReviewsSlider = () => {
      new Swiper('.reviews__list', {
        modules: [Navigation],
        navigation: {
          nextEl: '.reviews-button-next',
          prevEl: '.reviews-button-prev',
        },
        slidesPerView: 1,
        loop: false,
        spaceBetween: 20,
        breakpoints: {
          768: {
            slidesPerView: 2,
          },
          991: {
            slidesPerView: reviewsSliderItems.length < 4 ? reviewsSliderItems.length : 3,
          },
        },
      });
    }

    if (reviewsSlider) {
      initReviewsSlider();
    }


    const navLinks = document.querySelectorAll('.header__menu a');

    navLinks.forEach((link) => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        let href = link.getAttribute('href');
        if (href) {
          let anchor = document.querySelector(href);

          anchor.scrollIntoView({
            behavior: 'smooth',
          });
        }
      })
    });

    function scrollAnimation() {

      const heroLineEl = document.querySelector('.hero__line');
      const heroSvgContainer = document.querySelector('.hero__svg')
      const heroSvg = document.querySelector('#heroSvg');
      let heroRect = heroSvg.getBoundingClientRect();

      let heroLineLength = heroLineEl.getTotalLength();
      heroLineEl.style.strokeDasharray = heroLineLength + ' ' + heroLineLength;
      heroLineEl.style.strokeDashoffset = heroLineLength;

      const contactUsEl = document.querySelector('.contact-us');
      const contactUsLine = document.querySelector('.contact-us__line');
      let contactUsLineLength = contactUsLine.getTotalLength();
      contactUsLine.style.strokeDasharray = contactUsLineLength + ' ' + contactUsLineLength;
      contactUsLine.style.strokeDashoffset = -contactUsLineLength;

      const currentCase = heroSvgContainer.getAttribute('data-hero-type');


      let capabilitiesEl = document.querySelector('.capabilities');
      let capRightLine = document.querySelector('.capabilities__svg-right');
      let capLeftLine = document.querySelector('.capabilities__svg-left');
      let capLeftStroke = document.querySelector('.capabilities__image-left-stroke');

      window.addEventListener('scroll', () => {
        var scrollPercentage = document.documentElement.scrollTop / heroRect.height;

        // Length to offset the dashes
        var drawLength = (heroLineLength * scrollPercentage);
        drawLength += currentCase === 'purplox' ? 500 : 0

        // Draw in reverse
        heroLineEl.style.strokeDashoffset = drawLength - heroLineLength;

        let startBlock = contactUsEl.offsetTop;
        let endBlock = contactUsEl.offsetTop + contactUsEl.clientHeight;

        if (window.scrollY + window.innerHeight > endBlock && window.scrollY < startBlock) {
          let contactUsScrollPercentage = (endBlock - startBlock) * 2;
          let form = (window.scrollY + window.innerHeight) - (contactUsEl.offsetTop + contactUsEl.clientHeight) - 10;

          let x = form / contactUsScrollPercentage;

          if (x < 1) {
            contactUsLine.style.strokeDashoffset = -contactUsLineLength * (1 - x);
          }
        }

        if (window.scrollY > capabilitiesEl.offsetTop - (capabilitiesEl.clientHeight / 3)) {
          capRightLine.classList.add('active');

          setTimeout(() => {
            capLeftLine.classList.add('active');
          }, 500)

          setTimeout(() => {
            capLeftStroke.classList.add('active');
          }, 1000)
        }
      });
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
