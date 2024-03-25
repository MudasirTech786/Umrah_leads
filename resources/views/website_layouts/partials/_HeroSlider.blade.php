
<div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="absolute top-0 z-50 w-full  flex items-center justify-center ">
        <div class="w-full lg:w-[80%] ">
            @include('website_layouts.partials._Navbar')
        </div>
    </div>
    <div class="relative h-[400px] overflow-hidden md:h-[600px]">
         <!-- Item 1 -->
        <div style="background-image:url({{asset('images/home/hero-slider1.png')}})" class=" bg-cover bg-no-repeat bg-center m-0 hidden duration-700 ease-in-out " data-carousel-item="active">
            <div class="absolute bottom-5 lg:bottom-20 mx-auto w-full flex flex-col items-center justify-center gap-10 mt-[140px] md:mt-[180px] lg:mt-[70px] ">
                <h2 class="text-white text-center text-3xl md:text-5xl font-semibold ">Solution for <br/> The Hajj and Umrah</h2>
                <a href="/custom-package" class="bg-first text-white font-semibold py-4 px-10 rounded-xl hover:bg-opacity-80 uppercase text-sm">Calculate</a>
            </div>
        </div>
        <!-- Item 2 -->
        <div style="background-image:url({{asset('images/home/hero-slider2.jpg')}})" class=" bg-cover bg-no-repeat bg-center m-0 hidden duration-700 ease-in-out " data-carousel-item="">
            <div class="absolute bottom-5 lg:bottom-20 mx-auto w-full flex flex-col items-center justify-center gap-10 mt-[140px] md:mt-[180px] lg:mt-[70px] ">
                <h2 class="text-white text-center text-3xl md:text-5xl font-semibold ">Solution for <br/> The Hajj and Umrah</h2>
                <a href="/custom-package" class="bg-first text-white font-semibold py-4 px-10 rounded-xl hover:bg-opacity-80 uppercase text-sm">Calculate</a>
            </div>
        </div>
        <!-- Item 3 -->
        <div style="background-image:url({{asset('images/home/hero-slider1.png')}})" class=" bg-cover bg-no-repeat bg-center m-0 hidden duration-700 ease-in-out " data-carousel-item="">
            <div class="absolute bottom-5 lg:bottom-20 mx-auto w-full flex flex-col items-center justify-center gap-10 mt-[140px] md:mt-[180px] lg:mt-[70px] ">
                <h2 class="text-white text-center text-3xl md:text-5xl font-semibold ">Solution for <br/> The Hajj and Umrah</h2>
                <a href="/custom-package" class="bg-first text-white font-semibold py-4 px-10 rounded-xl hover:bg-opacity-80 uppercase text-sm">Calculate</a>
            </div>
        </div>
        <!-- Item 4 -->
        <div style="background-image:url({{asset('images/home/hero-slider2.jpg')}})" class=" bg-cover bg-no-repeat bg-center m-0 hidden duration-700 ease-in-out " data-carousel-item="">
            <div class="absolute bottom-5 lg:bottom-20 mx-auto w-full flex flex-col items-center justify-center gap-10 mt-[140px] md:mt-[180px] lg:mt-[70px] ">
                <h2 class="text-white text-center text-3xl md:text-5xl font-semibold ">Solution for <br/> The Hajj and Umrah</h2>
                <a href="/custom-package" class="bg-first text-white font-semibold py-4 px-10 rounded-xl hover:bg-opacity-80 uppercase text-sm">Calculate</a>
            </div>
        </div>
        
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0   left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center max-md:mt-20 max-lg:mt-40 outline-none border-none justify-center w-10 h-10 rounded-full bg-[#ae3234]/50  dark:bg-gray-800/30 hover:bg-[#1f1f1f] transition-all dark:group-hover:bg-gray-800/60 group-focus:ring-4 ring-transparent dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white  dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center max-md:mt-20 max-lg:mt-40 justify-center w-10 h-10 rounded-full bg-[#ae3234]/50 dark:bg-gray-800/30 hover:bg-[#1f1f1f] transition-all dark:group-hover:bg-gray-800/60 group-focus:ring-4 ring-transparent dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<script>
    // Function to simulate click on next button
    function nextSlide() {
        const nextButton = document.querySelector('[data-carousel-next]');
        nextButton.click();
    }

    // Autoplay function
    function autoplaySlider() {
        setInterval(nextSlide, 5000); // Interval set to 1000ms (1 second)
    }

    // Call autoplay function when document is ready
    document.addEventListener("DOMContentLoaded", function() {
        autoplaySlider();
    });
</script>
