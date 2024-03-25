<swiper-container class="mySwiper" init="false" navigation-prev-el="#my-prev-button"
 navigation-next-el="#my-next-button" >
    <swiper-slide>
      <img src="{{asset('images/about/team1.jpg')}}" alt="">
      <div class="text-white">
        <h4 class="text-[23px] font-semibold mt-5">Aqeel Sb</h4>
        <h5 class="text-[15px] font-semibold ">Manager</h5>
        <div class=" text-[12px] space-x-10 mt-10">
          <a href="#"><i class="fa-brands fa-facebook-f hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a> 
          <a href="#"><i class="fa-brands fa-linkedin hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>
          <a href="#"><i class="fa-regular fa-envelope hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>          
        </div>

      </div>
    </swiper-slide>
    
    <swiper-slide>
      <img src="{{asset('images/about/team1.jpg')}}" alt="">
      <div class="text-white">
        <h4 class="text-[23px] font-semibold mt-5">Aqeel Sb</h4>
        <h5 class="text-[15px] font-semibold ">Manager</h5>
        <div class=" text-[12px] space-x-10 mt-10">
          <a href="#"><i class="fa-brands fa-facebook-f hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a> 
          <a href="#"><i class="fa-brands fa-linkedin hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>
          <a href="#"><i class="fa-regular fa-envelope hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>          
        </div>

      </div>
    </swiper-slide>
    
    <swiper-slide>
      <img src="{{asset('images/about/team1.jpg')}}" alt="">
      <div class="text-white">
        <h4 class="text-[23px] font-semibold mt-5">Aqeel Sb</h4>
        <h5 class="text-[15px] font-semibold ">Manager</h5>
        <div class=" text-[12px] space-x-10 mt-10">
          <a href="#"><i class="fa-brands fa-facebook-f hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a> 
          <a href="#"><i class="fa-brands fa-linkedin hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>
          <a href="#"><i class="fa-regular fa-envelope hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>          
        </div>

      </div>
    </swiper-slide>
    
    <swiper-slide>
      <img src="{{asset('images/about/team1.jpg')}}" alt="">
      <div class="text-white">
        <h4 class="text-[23px] font-semibold mt-5">Aqeel Sb</h4>
        <h5 class="text-[15px] font-semibold ">Manager</h5>
        <div class=" text-[12px] space-x-10 mt-10">
          <a href="#"><i class="fa-brands fa-facebook-f hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a> 
          <a href="#"><i class="fa-brands fa-linkedin hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>
          <a href="#"><i class="fa-regular fa-envelope hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>          
        </div>

      </div>
    </swiper-slide>
    
    <swiper-slide>
      <img src="{{asset('images/about/team1.jpg')}}" alt="">
      <div class="text-white">
        <h4 class="text-[23px] font-semibold mt-5">Aqeel Sb</h4>
        <h5 class="text-[15px] font-semibold ">Manager</h5>
        <div class=" text-[12px] space-x-10 mt-10">
          <a href="#"><i class="fa-brands fa-facebook-f hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a> 
          <a href="#"><i class="fa-brands fa-linkedin hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>
          <a href="#"><i class="fa-regular fa-envelope hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>          
        </div>

      </div>
    </swiper-slide>
    
    <swiper-slide>
      <img src="{{asset('images/about/team1.jpg')}}" alt="">
      <div class="text-white">
        <h4 class="text-[23px] font-semibold mt-5">Aqeel Sb</h4>
        <h5 class="text-[15px] font-semibold ">Manager</h5>
        <div class=" text-[12px] space-x-10 mt-10">
          <a href="#"><i class="fa-brands fa-facebook-f hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a> 
          <a href="#"><i class="fa-brands fa-linkedin hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>
          <a href="#"><i class="fa-regular fa-envelope hover:-translate-y-1 transition duration-300 w-[20px] h-[20px]" ></i></a>          
        </div>

      </div>
    </swiper-slide>
    

    
    
  </swiper-container>
  <button id="my-next-button"><i class="fa-solid fa-angle-right"></i></button>
  <button id="my-prev-button"><i class="fa-solid fa-angle-left"></i></button>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

  <script>
    const swiperEl = document.querySelector('swiper-container')
    Object.assign(swiperEl, {
      slidesPerView: 1,
      spaceBetween: 10,
      
      navigation: { 
        clickable: true,        
      },
      
      breakpoints: {
        "@0.00": {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        "@0.75": {
          slidesPerView: 2,
          spaceBetween: 0,
        },
        "@1.00": {
          slidesPerView: 3,
          spaceBetween: 0,
        },
        "@1.50": {
          slidesPerView: 4,
          spaceBetween: 0,
        },
      },
    });

    
    swiperEl.initialize();


  </script>