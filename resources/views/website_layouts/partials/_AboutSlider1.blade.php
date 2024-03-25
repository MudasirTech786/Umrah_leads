
<div class=" h-[250px] md:h-[350px] lg:h-[500px] mx-auto">
    <div id="controls-carousel" class="relative w-full h-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative  overflow-hidden h-full">
             <!-- Item 1 -->
            <div style="background-image:url({{asset('images/about/about-slider1-1.jpg')}})" class=" h-full bg-cover bg-no-repeat bg-center m-0 hidden duration-700 ease-in-out " data-carousel-item="active">
                
            </div>
            <!-- Item 2 -->
            <div style="background-image:url({{asset('images/about/about-slider1-4.jpg')}})" class=" bg-cover bg-no-repeat bg-center m-0 hidden duration-700 ease-in-out " data-carousel-item="">
                
            </div>
            <!-- Item 3 -->
            <div style="background-image:url({{asset('images/about/about-slider1-1.jpg')}})" class=" bg-cover bg-no-repeat bg-center m-0 hidden duration-700 ease-in-out " data-carousel-item="">
                
            </div>
            <!-- Item 4 -->
            <div style="background-image:url({{asset('images/about/about-slider1-4.jpg')}})" class=" bg-cover bg-no-repeat bg-center m-0 hidden duration-700 ease-in-out " data-carousel-item="">
                
            </div>
            
            
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0  left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center outline-none border-none justify-center w-10 h-10 rounded-full bg-red-500  dark:bg-gray-800/30 hover:bg-[#1f1f1f] transition-all dark:group-hover:bg-gray-800/60 group-focus:ring-4 ring-transparent dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white  dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-red-500  dark:bg-gray-800/30 hover:bg-[#1f1f1f] transition-all dark:group-hover:bg-gray-800/60 group-focus:ring-4 ring-transparent dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>
