
    <div class="bg-white w-full text-black flex items-center justify-between p-5 md:p-10 lg:mt-10">
        
        <div class="hidden md:flex items-start gap-3 w-[33%]">
            <img src="{{asset('images/home/timeIcon.svg')}}" alt="" class="mt-1">
            <div class="text-sm font-bold">
                <!-- <p>MON-SAT: 6.00 AM - 10.00 PM</p> -->
                <!-- <p class="mt-2">SUN: CLOSED</p> -->
            </div>
        </div>
        <div class="w-full md:w-[33%] flex items-center justify-between md:justify-center">
            <a href="/home_page"><img src="{{asset('images/logo.png')}}" alt="logo" class="h-[60px]"></a>            
            <img src="{{asset('images/home/burger-icon2.png')}}" alt="" class="cursor-pointer h-[30px] md:hidden" onclick="showNav()">
        </div>
        <div class="hidden md:flex w-[33%] items-center justify-end gap-5y gap-3 lg:gap-7 ">
            <a href="#"><img src="{{asset('images/home/facebook-f.svg')}}" alt="" class="hover:scale-90 transition-all"></a>
            <a href="#"><img src="{{asset('images/home/instagram.svg')}}" alt="" class="hover:scale-90 transition-all"></a>
            <a href="#"><img src="{{asset('images/home/youtube.svg')}}" alt="" class="hover:scale-90 transition-all"></a>
            <!-- <div class="flex gap-3 items-center">
                <a href="#"><img src="{{asset('images/home/pakistan.png')}}" alt="" class=""></a>
                <p class="text-sm font-semibold">PK</p>    
            </div> -->
        </div>
    </div>
    <div class="bg-first text-white w-full h-[70px] hidden md:flex items-center justify-center gap-10 ">
        <a href="/home_page" class="font-semibold hover:underline text-sm">HOME</a>
        <a href="/about" class="font-semibold hover:underline text-sm">ABOUT</a>
        <!-- <a href="/custom-package" class="font-semibold hover:underline text-sm">CALCULATE</a>     -->
        <div href="#" class="relative font-semibold text-sm py-5 cursor-pointer group">
            UMRAH PACKAGE
            <div class="absolute bg-white w-[200px] text-black hidden group-hover:flex flex-col border border-r-gray-200 shadow-md top-[100%] left-0  ">
                <a href="/custom-package" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Customized</a>
                <a href="/home_page#pre-defined" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Pre Defined</a>                
            </div>
        </div>
        <div href="#" class="relative font-semibold text-sm py-5 cursor-pointer group">
            HOTELS
            <div class="absolute bg-white w-[200px] text-black hidden group-hover:flex flex-col border border-r-gray-200 shadow-md top-[100%] left-0  ">
                <a href="/hotel-city/makkah" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Hotels In Makkah</a>
                <a href="/hotel-city/madinah" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Hotels In Madinah</a>
                <a href="/hotel-city/jeddah" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Hotels In Jeddah</a>
            </div>
        </div>                    
        <a href="/contact" class="font-semibold hover:underline text-sm">CONTACT US</a>
    </div>

    <!-- Mobile Menu starts -->
    <div id="mobileMenu" class="fixed top-0 left-0 w-full h-screen overflow-hidden md:hidden">        
            <div class="bg-white text-black w-full h-full flex flex-col items-center justify-start py-20 px-10">
                <div class="w-full flex items-center justify-between">
                        <img src="{{asset('images/logo.png')}}" alt="logo" class="h-[60px]">
                        <img src="{{asset('images/home/cross-icon3.png')}}" alt="" class="h-[30px] md:hidden cursor-pointer" onclick="hideNav()">
                </div>
    
                <div class="w-full flex flex-1 flex-col items-center justify-center gap-5">
                    <a href="/home_page" class="text-lg hover:underline">HOME</a>
                    <a href="/about" class="text-lg hover:underline">ABOUT</a>
                    <a href="#" class="text-lg hover:underline">CALCULATE</a>
                    <div href="#" class="relative text-lg  cursor-pointer group">
                        UMRAH PACKAGE
                        <div class="absolute z-10 bg-white w-[200px] text-black hidden group-hover:flex flex-col border border-r-gray-200 shadow-md top-[100%] left-0  ">
                            <a href="/custom-package" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Customized</a>
                            <a href="/home_page#pre-defined" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Pre Defined</a>                            
                        </div>
                    </div>  
                    <div href="#" class="relative text-lg  cursor-pointer group">
                        HOTELS
                        <div class="absolute bg-white w-[200px] text-black hidden group-hover:flex flex-col border border-r-gray-200 shadow-md top-[100%] left-0  ">
                            <a href="/hotel-city/makkah" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Hotels In Makkah</a>
                            <a href="/hotel-city/madinah" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Hotels In Madinah</a>
                            <a href="/hotel-city/jeddah" class="font-semibold hover:bg-first hover:text-white text-sm p-2 ">Hotels In Jeddah</a>
                        </div>
                    </div>   
                    <a href="/contact" class="text-lg hover:underline">CONTACT US</a>
                </div>
    
                <div class="flex items-center gap-5 ">
                    <a href="#"><img src="{{asset('images/home/facebook-f.svg')}}" alt="" class=""></a>
                    <a href="#"><img src="{{asset('images/home/instagram.svg')}}" alt="" class=""></a>
                    <a href="#"><img src="{{asset('images/home/youtube.svg')}}" alt="" class=""></a>
                    <div class="flex gap-3 items-center">
                        <a href="#"><img src="{{asset('images/home/pakistan.png')}}" alt="" class=""></a>
                        <p >PK</p>    
                    </div>
                </div>
    
    
            </div>
        </div>
        <!-- Mobile Menu ends -->



<script>
    window.onload = function() {
        hideNav();
    }
    function hideNav(){
        document.getElementById("mobileMenu").style.display = 'none';
    }

    function showNav(){
        document.getElementById("mobileMenu").style.display = 'block';
    }
</script>