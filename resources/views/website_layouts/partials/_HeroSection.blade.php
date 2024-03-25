<div style="background-image:url({{asset('images/home/hero-bg.png')}})" class=" bg-cover bg-no-repeat m-0  bg-start h-screen w-[100%] flex flex-col items-center ">
    <!-- <img src="{{asset('images/home/hero-bg.png')}}" alt=""> -->
    <div class="w-full lg:w-[80%] p-5">
        <div class="bg-black w-full text-white flex items-center justify-between p-10 mt-10">
            
            <div class="hidden md:flex items-start gap-3 w-[33%]">
                <img src="{{asset('images/home/timeIcon.svg')}}" alt="" class="mt-1">
                <div>
                    <p>MON-SAT: 6.00 AM - 10.00 PM</p>
                    <p class="mt-2">SUN: CLOSED</p>
                </div>
            </div>
            <div class="w-full md:w-[33%] flex items-center justify-between md:justify-center">
                <img src="{{asset('images/logo.png')}}" alt="logo" class="h-[60px]">
                <img src="{{asset('images/home/burger-icon.jpg')}}" alt="" class="h-[30px] md:hidden" onclick="showNav()">
            </div>
            <div class="hidden md:flex w-[33%] items-center justify-end gap-5y lg:gap-10 ">
                <a href="#"><img src="{{asset('images/home/facebook-f.svg')}}" alt="" class=""></a>
                <a href="#"><img src="{{asset('images/home/instagram.svg')}}" alt="" class=""></a>
                <a href="#"><img src="{{asset('images/home/youtube.svg')}}" alt="" class=""></a>
                <div class="flex gap-3 items-center">
                    <a href="#"><img src="{{asset('images/home/pakistan.png')}}" alt="" class=""></a>
                    <p>PK</p>    
                </div>
            </div>
        </div>
        <div class="bg-first w-full h-[70px] hidden md:flex items-center justify-center gap-10 ">
            <a href="#" class="font-semibold hover:underline">HOME</a>
            <a href="#" class="font-semibold hover:underline">ABOUT</a>
            <a href="#" class="font-semibold hover:underline">CALCULATE</a>
            <a href="#" class="font-semibold hover:underline">HOTELS</a>
            <a href="#" class="font-semibold hover:underline">CONTACT US</a>
        </div>
    </div>
    <div class="w-fit flex flex-col items-center justify-center gap-10 mt-[140px] md:mt-[180px] lg:mt-[70px] ">
        <h2 class="text-white text-center text-6xl font-semibold ">Solution for <br/> The Hajj and Umrah</h2>
        <button class="bg-first py-4 px-10 rounded-xl hover:bg-opacity-80 uppercase text-sm">Calculate</button>
    </div>

    <!-- Mobile Menu starts -->
    <div id="mobileMenu" class="fixed top-0 left-0 w-full h-screen overflow-hidden md:hidden">        
        <div class="bg-black text-white w-full h-full flex flex-col items-center justify-start py-20 px-10">
            <div class="w-full flex items-center justify-between">
                    <img src="{{asset('images/logo.png')}}" alt="logo" class="h-[60px]">
                    <img src="{{asset('images/home/cross.png')}}" alt="" class="h-[30px] md:hidden" onclick="hideNav()">
            </div>

            <div class="w-full flex flex-1 flex-col items-center justify-center gap-5">
                <a href="#" class="text-lg hover:underline">HOME</a>
                <a href="#" class="text-lg hover:underline">ABOUT</a>
                <a href="#" class="text-lg hover:underline">CALCULATE</a>
                <a href="#" class="text-lg hover:underline">HOTELS</a>
                <a href="#" class="text-lg hover:underline">CONTACT US</a>
            </div>

            <div class="flex items-center gap-5 ">
                <a href="#"><img src="{{asset('images/home/facebook-f.svg')}}" alt="" class=""></a>
                <a href="#"><img src="{{asset('images/home/instagram.svg')}}" alt="" class=""></a>
                <a href="#"><img src="{{asset('images/home/youtube.svg')}}" alt="" class=""></a>
                <div class="flex gap-3 items-center">
                    <a href="#"><img src="{{asset('images/home/pakistan.png')}}" alt="" class=""></a>
                    <p>PK</p>    
                </div>
            </div>


        </div>
    </div>
    <!-- Mobile Menu ends -->
</div>


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