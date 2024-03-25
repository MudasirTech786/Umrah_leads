<swiper-container class="testimonialsSwiperContainer " pagination="true" pagination-clickable="true" space-between="30">
    @foreach ($testimonial as $testimonials)
        <swiper-slide>
            <div
                class="border border-gray-200 rounded-[5px] h-[400px] flex flex-col items-center justify-center p-[10px] text-center">
                <p class="text-gray-500 text-[15px]">{{ $testimonials->content }}.</p>
                <div class="flex mt-10 space-x-3">
                    <div class="h-[60px] w-[60px] rounded-full overflow-hidden">
                        @if ($testimonials->image != null)
                            <img src="{{ asset('uploads/' . $testimonials->image) }}"
                                alt="" class="h-full w-full  object-cover object-top">
                        @else
                            <img src="{{ asset('app-assets/images/profile/profile_picture.jpeg') }}"
                                alt="" class="h-full w-full  object-cover object-top">
                        @endif
                    </div>
                    <div class="pt-1 text-start">
                        <h4 class="text-red-500 font-semibold">{{ $testimonials->first_name }}
                            {{ $testimonials->last_name }} </h4>
                        <p class="text-[12px]">{{ $testimonials->designation }}</p>
                    </div>
                </div>
            </div>
        </swiper-slide>
    @endforeach
</swiper-container>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script>
    const swiperE2 = document.querySelector('.testimonialsSwiperContainer')
    Object.assign(swiperE2, {
        slidesPerView: 1,
        // spaceBetween: 40,

        // navigation: { 
        //   clickable: true,        
        // },

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
                slidesPerView: 2,
                spaceBetween: 0,
            },
            "@1.50": {
                slidesPerView: 3,
                spaceBetween: 0,
            },
        },
    });


    swiperE2.initialize();
</script>
