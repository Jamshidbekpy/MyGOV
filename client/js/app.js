function scrollHeader() {
    let navbar = document.getElementById('navbar')
    let bigDrop = document.getElementById('big-drop')
    if (this.scrollY >= 50) {
      navbar.classList.add('scroll-header')
      bigDrop.classList.add('scroll-header')
    } else {
      navbar.classList.remove('scroll-header')
      bigDrop.classList.remove('scroll-header')
    }
  }
  window.addEventListener('scroll', scrollHeader)
  
  let newsSwiper = new Swiper('.newsSwiper', {
    slidesPerView: 1.3,
    spaceBetween: 24,
    loop: true,
    // centeredSlides: true,
    speed: 1000,
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      1024: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next-0',
      prevEl: '.swiper-button-prev-0',
    },
  })
  
  let partnersSwiper = new Swiper('.partnersSwiper', {
    slidesPerView: 2,
    // centeredSlides: true,
    spaceBetween: 24,
    loop: true,
    speed: 1000,
    autoplay: {
      delay: 2500,
    },
    breakpoints: {
      1024: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
    },
  })
  let partnersSwiper2 = new Swiper('.partnersSwiper2', {
    slidesPerView: 2,
    // centeredSlides: true,
    spaceBetween: 24,
    loop: true,
    speed: 1000,
    autoplay: {
      delay: 2500,
    },
    breakpoints: {
      1024: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
    },
  })
  
  // partnersSwiper.controller.control = partnersSwiper2;
  // partnersSwiper2.controller.control = partnersSwiper;
  
  new Swiper('.buildSwiperFirst', {
    loop: true,
    autoplay: {
      delay: 2000,
    },
    speed: 1000,
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  })
  new Swiper('.buildSwiperSecond', {
    loop: true,
    autoplay: {
      delay: 3000,
    },
    speed: 1000,
    pagination: {
      el: '.page-2',
    },
    navigation: {
      nextEl: '.next-2',
      prevEl: '.prev-2',
    },
  })
  new Swiper('.buildSwiperThird', {
    loop: true,
    autoplay: {
      delay: 2500,
    },
    speed: 1000,
    pagination: {
      el: '.page-3',
    },
    navigation: {
      nextEl: '.next-3',
      prevEl: '.prev-3',
    },
  })
  new Swiper('.buildSwiperFourth', {
    slidesPerView: 2,
    spaceBetween: 8,
    loop: true,
    autoplay: {
      delay: 3500,
    },
    speed: 1000,
    pagination: {
      el: '.page-4',
    },
    navigation: {
      nextEl: '.next-4',
      prevEl: '.prev-4',
    },
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
    },
  })
  new Swiper('.buildSwiperFive', {
    slidesPerView: 2,
    spaceBetween: 8,
    loop: true,
    autoplay: {
      delay: 1500,
    },
    speed: 1000,
    pagination: {
      el: '.page-5',
    },
    navigation: {
      nextEl: '.next-5',
      prevEl: '.prev-5',
    },
    breakpoints: {
      1024: {
        slidesPerView: 2,
        spaceBetween: 24,
      },
    },
  })
  mainLayout = document.getElementById('main')
  let navToggle = document.getElementById('burger')
  navClose = document.getElementById('x-japan')
  navCollapse = document.getElementById('bottom')
  
  if (navToggle) {
    navToggle.addEventListener('click', () => {
      navCollapse.classList.toggle('show-menu')
    })
  }
  
  if (navClose) {
    navClose.addEventListener('click', () => {
      navCollapse.classList.remove('show-menu')
    })
  }
  
  if (mainLayout) {
    mainLayout.addEventListener('click', () => {
      navCollapse.classList.remove('show-menu')
    })
  }
  let openBtn = document.getElementById('opener')
  closeBtn = document.getElementById('closer')
  activeUl = document.getElementById('active-ul')
  hiddenUl = document.getElementById('hidden-ul')
  
  if (openBtn) {
    openBtn.addEventListener('click', () => {
      activeUl.classList.add('hide-ul')
      hiddenUl.classList.add('show-ul')
  
      activeUl.classList.remove('show-ul')
      hiddenUl.classList.remove('hide-ul')
    })
  }
  
  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      activeUl.classList.remove('hide-ul')
      hiddenUl.classList.remove('show-ul')
  
      activeUl.classList.add('show-ul')
      hiddenUl.classList.add('hide-ul')
    })
  }
  
  const tabs = document.querySelectorAll('[data-target]'),
    tabContents = document.querySelectorAll('[data-content]'),
    closers = document.querySelectorAll('.closer')
  
  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      const activeUl = document.getElementById('active-ul')
      const target = document.querySelector(tab.dataset.target)
  
      let secondWrapper = document.querySelector('.second__wrapper')
      let firstWrapper = document.querySelector('.mobile__wrapper')
  
      tabContents.forEach((tabContent) => {
        tabContent.classList.remove('show-ul')
      })
      target.classList.add('show-ul')
      target.classList.remove('hide-ul')
      activeUl.classList.add('hide-ul')
      secondWrapper.style.display = 'none'
      firstWrapper.style.height = '100%'
  
      closers.forEach((closer) => {
        closer.addEventListener('click', () => {
          tabContents.forEach((tabContent) => {
            tabContent.classList.add('hide-ul')
          })
          activeUl.classList.add('show-ul')
          activeUl.classList.remove('hide-ul')
          secondWrapper.style.display = 'block'
          firstWrapper.style.height = '75%'
        })
      })
    })
  })
  
  let count1 = document.getElementById('count-1')
  let count2 = document.getElementById('count-2')
  let count3 = document.getElementById('count-3')
  let count4 = document.getElementById('count-4')
  
  const counterAnim = (qSelector, start = 0, end, duration = 1000) => {
    const target = document.querySelector(qSelector)
    let startTimestamp = null
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp
      const progress = Math.min((timestamp - startTimestamp) / duration, 1)
      target.innerText = Math.floor(progress * (end - start) + start)
      if (progress < 1) {
        window.requestAnimationFrame(step)
      }
    }
    window.requestAnimationFrame(step)
  }
  //#endregion - end of - number counter animation
  
  document.addEventListener('DOMContentLoaded', () => {
    counterAnim('#count1', 10, 16, 2000)
    counterAnim('#count2', 5000, 60, 1500)
    counterAnim('#count3', -1000, 6200, 2000)
    counterAnim('#count4', 50, 6, 2500)
  })
  AOS.init()
  
  let facultyBtn = document.querySelector('.faculties')
  let bigDrop = document.querySelector('.big__drop')
  let navPic = document.querySelector('.nav__pic')
  let nextLink = document.querySelector('.next__link')
  let prevLink = document.querySelector('.prev__link')
  let navTop = document.querySelector('.nav__top')
  
  if (facultyBtn) {
    facultyBtn.addEventListener('mouseover', () => {
      bigDrop.classList.add('show')
    })
  }
  
  if (mainLayout) {
    mainLayout.addEventListener('mouseover', () => {
      bigDrop.classList.remove('show')
    })
  }
  
  if (navPic) {
    navPic.addEventListener('mouseover', () => {
      bigDrop.classList.remove('show')
    })
  }
  
  if (nextLink) {
    nextLink.addEventListener('mouseover', () => {
      bigDrop.classList.remove('show')
    })
  }
  if (prevLink) {
    prevLink.addEventListener('mouseover', () => {
      bigDrop.classList.remove('show')
    })
  }
  if (navTop) {
    navTop.addEventListener('mouseover', () => {
      bigDrop.classList.remove('show')
    })
  }
  
  const links = document.querySelectorAll('[data-link]'),
    grids = document.querySelectorAll('[data-grid]')
  
  links.forEach((link) => {
    link.addEventListener('click', () => {
      const href = document.querySelector(link.dataset.link)
  
      grids.forEach((grid) => {
        grid.classList.remove('active')
      })
      href.classList.add('active')
      links.forEach((link) => {
        link.classList.remove('active')
      })
      link.classList.add('active')
    })
  })
  
  const links1 = document.querySelectorAll('[data-point]'),
    grids1 = document.querySelectorAll('[data-direction]')
  
  links1.forEach((link1) => {
    link1.addEventListener('click', () => {
      const href1 = document.querySelector(link1.dataset.point)
  
      grids1.forEach((grid1) => {
        grid1.classList.remove('active')
      })
      href1.classList.add('active')
      links1.forEach((link1) => {
        link1.classList.remove('active')
      })
      link1.classList.add('active')
    })
  })
  
  var swiper = new Swiper('.mySwiper', {
    spaceBetween: 12,
    slidesPerView: 2,
    freeMode: true,
    watchSlidesProgress: true,
    preloadImages: false,
    lazy: true,
    breakpoints: {
      1024: {
        slidesPerView: 6,
        spaceBetween: 24,
        centeredSlides: true,
      },
    },
  })
  var swiper2 = new Swiper('.mySwiper2', {
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: swiper,
    },
    preloadImages: false,
    lazy: true,
  })