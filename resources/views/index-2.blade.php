@extends('layouts.master')
@section('title', 'Autoglass depot')@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Berkshire+Swash&family=Chewy&family=Lobster&family=Maven+Pro:wght@400;500;700;900&family=Nabla&family=Noto+Sans:ital,wght@0,500;0,900;1,800&family=Poppins&family=Rubik+Puddles&display=swap" rel="stylesheet">

<style>
    .logo-slider {
        width: 1000px;
        height: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .logo-slider .swiper-wrapper {
        flex-direction: row !important
    }

    .logo-slider .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        margin-right: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 130px !important;
        margin-top: 0px !important
            /* Center slide text vertically */
        ;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .logo-slider .swiper-pagination {
        position: relative;
        text-align: center;
        transition: .3s opacity;
        transform: translate3d(0, 0, 0);
        z-index: 45;
        /* top: 20px !important; */
        margin-top: 33px;
    }

    .our-supplier-slider {
        width: 800px;
        height: 100%;
    }

    .our-supplier-slider .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .our-supplier-slider .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;

    }

    .supplier-bg {
        border-radius: 50%;
        width: 200px;
        height: 180px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0px;
        box-shadow: 0px 0px 9px rgba(255, 255, 255, 0.1), inset 0px 0px 9px rgba(94, 104, 121, 0.5);
        object-fit: contain;
        background-color: rgb(255, 255, 255);
    }

    .supplier-bg img {
        display: block;
        /* width: 80%; */

    }

    .usa-number-div {
        width: 1140px;
        height: 400px;

        margin: 0px auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;

    }



    .usa-number-div-inner-content {
        width: 291px;
        height: 350px;
        transform: skew(-3deg);
        box-shadow: 0px 0px 10px 0px rgba(187.5, 187.5, 187.5, 0.22);
        padding: 40px 20px 40px 20px;
        position: relative;
        background-color: #FFFFFF;

    }

    .usa-number-div-inner-content span {
        color: #84848414;
        font-family: "Hind", Sans-serif;
        font-size: 90px;
        font-weight: 600;
        position: absolute;
        left: 0px;
        top: -66px;
    }

    .usa-number-div-inner-content:hover span {
        color: #ed5217
    }

    .usa-number-div-inner-content h5 {

        color: #000000;

        font-size: 20px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .special-left-h1 {
        font-style: normal;
        font-size: 55px;
        line-height: 70px;
        text-align: center;
        color: black;
        font-weight: 700;

        margin-top: 70px;
        font-family: 'Josefin Sans', sans-serif;

    }

    .special-left-h3 {
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 300;
        font-size: 35px;
        line-height: 44px;
        margin-top: 10px;
        color: black;
        text-align: center;
        margin-bottom: 30px;
    }
</style>

@endpush

@section('content')

<section class="hero hero-static-image-2">
    <div class="container hero-img-sec">
        <div class="row">
            <div class="col col-md-6 col-sm-7 home-desc-main">
                <div class="slide-title">
                    <h2 style="    text-transform: uppercase;font-size: 41px;">One Stop Shop for All Your Auto Glass Needs</span></h2>
                </div>
                <div class="slide-subtitle">
                    <p style="font-size:14px">Auto Glass Depot is the leading wholesaler of Automotive glass parts.
                        We are one of the largest independently owned companies in DMV Area
                        offering windshield repairs, replacement and calibration service.
                        Please choose a part for pickup or fast shipping or Get a free instant online
                        Quote for replacement and schedule a mobile or in shop service below :
                    </p>
                </div>


                <div class="main-div-buy-shop" style="margin-top:100px">
                    <div class="box my-first-box" onclick="window.location='{{ url("shop") }}'">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="content">
                            <h2 STYLE="color:white;font-size: 30px;padding-top:13px">Buy <br /> Parts </h2>

                        </div>




                    </div>

                    <div class="box my-second-box" onclick="window.location='{{ url("vehicle") }}'">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="content">
                            <h2 style="color:white;
    font-size: 30px;">Full Services <br /> Parts + Installation </h2>

                        </div>
                    </div>

                </div>
                <div class="hero-image-2">
                    <div class="swiper mySwiper about-section-slider">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide"> <img src="\assets\images\slider\WhatsApp Image 2023-06-17 at 11.29.29 (1).jpeg"></div>
                            <div class="swiper-slide"> <img src="\assets\images\slider\WhatsApp Image 2023-06-17 at 11.29.30 (1).jpeg"></div>
                            <div class="swiper-slide"> <img src="\assets\images\slider\istockphoto-1190854132-2048x2048-transformed.jpeg"></div>
                            <div class="swiper-slide"> <img src="\assets\images\slider\istockphoto-451617613-2048x2048-transformed.jpeg"></div>
                            <div class="swiper-slide"> <img src="\assets\images\slider\istockphoto-1190859781-2048x2048-transformed.jpeg"></div>
                            <div class="swiper-slide"> <img src="\assets\images\slider\WhatsApp Image 2023-06-17 at 11.29.31.jpeg"></div>
                            <div class="swiper-slide"> <img src="\assets\images\slider\WhatsApp Image 2023-06-17 at 11.29.33.jpeg"></div>

                            <div class="swiper-slide"> <img src="\assets\images\slider\windshield-inventory-1024x683 (1).jpg"></div>

                        </div>
                    </div>
                </div>
            </div>
</section>


<!-- start about-section -->
<section class="about-section-2">
    <div class="section-title-s2 text-center">
        <h2 class="border-bottom-none">Our Suppliers Are The largest Automotive</h2>
        <h2>Replacement Glass Manufactures</h2>
    </div>


    <!-- .hx-counter-area start -->
    <div class="fun-fact-section-s2 ">
        <div class="container our-suppliers-circle-img">

            <!-- Swiper -->
            <div class="swiper mySwiper our-supplier-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="grid supplier-bg">
                            <img style=" height: 66% !important;" src="assets/images/glass-manufacturer-logo/fy_logo-removebg-preview.png">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="grid supplier-bg">
                            <img style="width:100%;height:100%" src="assets/images/glass-manufacturer-logo/xyg-removebg-preview.png">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="grid supplier-bg">
                            <img style="width:76%;height:80%;" src="assets/images/glass-manufacturer-logo/Asahi_Glass_company_logo.svg-removebg-preview.png">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="grid supplier-bg">
                            <img style="width:100%;height:100%" src="assets/images/glass-manufacturer-logo/Logo-sekurit.svg-removebg-preview.png">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="grid supplier-bg">
                            <img style="max-width:79%;margin-top:10px" src="assets/images/glass-manufacturer-logo/nsg-group-vector-logo-removebg-preview.png">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="grid supplier-bg">
                            <img style="width:222px;height:173px" src="assets/images/glass-manufacturer-logo/pilkington-removebg-preview.png">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="grid supplier-bg">
                            <img style="width:140px;height:145px" src="assets/images/glass-manufacturer-logo/WhatsApp Image 2023-06-17 at 11.32.12 (1).jpeg">
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="grid supplier-bg">
                            <img style="width:140px;height:145px" src="assets/images/glass-manufacturer-logo/WhatsApp Image 2023-06-17 at 11.32.12.jpeg">
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>

</section>
<!-- end about-section -->



<!-- .hx-counter-area end -->

<div class="section-title-s2 text-center" style="margin-bottom:40px;margin-top:100px">
    <h2 class="border-bottom-none">We Service All make and models</h2>

</div>
</div>

<!-- Swiper -->
<div class="swiper mySwiper logo-slider">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="\assets\images\logo\Acura-Logo-1-1024x576.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\audi-logo-1-1.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\bentley-logo-1400x800-1-1024x585.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\ezgif.com-webp-to-png (4).png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\ezgif.com-webp-to-png (6).png"></div>

        <div class="swiper-slide"><img src="\assets\images\logo\Scion-logo-2003-1920x1080-1-1024x576.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\Volkswagen-emblem-2014-1920x1080-1-1024x576.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\Mercury-Logo-1-1-1024x576.webp"></div>
        <div class="swiper-slide"><img style="height:84%" src="\assets\images\logo\Mercedes-Logo.svg-1-1-1024x1024.png"></div>
        <div class="swiper-slide"><img style="height:84%" src="\assets\images\logo\BMW-Logo-PNG-Pic-1-1024x1024.png"></div>
        <div class="swiper-slide"><img style="height:84%" src="\assets\images\logo\toyota-logo-png-13-1-1024x888.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\Kia-logo-1-1024x576.png"></div>
        <div class="swiper-slide"><img style="height:84%" src="\assets\images\logo\Dodge-logo-1990-2100x2100-1-1024x1024.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\purepng.com-land-rover-logoland-roverfour-wheel-drive-vehiclesjaguar-land-roverland-rover-vehiclesland-rover-logo-17015275094713alrk-1-1024x576.png"></div>
        <div class="swiper-slide"><img style="height:84%" src="\assets\images\logo\tesla-logo-png-silver-10-1.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\Srt_chrysler_brand_logo-1.png"></div>
        <div class="swiper-slide"><img style="height:84%" src="\assets\images\logo\Rolls-Royce-logo-2048x2048-1-1024x1024.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\Mini-logo-2001-1920x1080-1-e1678226422288-1024x556.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\Jaguar-logo-2012-1920x1080-1-1-1024x576.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\GMC-logo-3800x1000-1-1024x269.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\Ford-Motor-Company-Logo-1-1024x391.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\ezgif.com-webp-to-png.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\ezgif.com-webp-to-png (5).png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\ezgif.com-webp-to-png (3).png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\download-1.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\Chevrolet-logo-2013-2560x1440-1-1024x576.png"></div>
        <div class="swiper-slide"><img style="height:84%" src="\assets\images\logo\cadillac-logo-2000-1-1024x853.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\infiniti-1-1024x576.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\WhatsApp-Image-2023-06-17-at-11.32.55.png"></div>
        <div class="swiper-slide"><img style="height:84%" src="\assets\images\logo\WhatsApp-Image-2023-06-17-at-11.32.55-_1_.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\WhatsApp-Image-2023-06-17-at-11.32.55-_2_.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\WhatsApp-Image-2023-06-17-at-11.32.56.png"></div>
        <div class="swiper-slide"><img src="\assets\images\logo\pngegg (2).png"></div>










    </div>
    <div class="swiper-pagination"></div>
</div>


</div>


<h1 class="special-left-h1">Why We Are Special </h1>
<h3 class="special-left-h3">We offer part selling & Installation</h3>


<section class="usa-number-div">
    <div class="usa-number-div-inner-content">
        <span>01</span>
        <h5>selling part at wholesale price and always availability</h5>
        <p>We carry the most current and highest quality auto glass available. You can choose from original dealer item, O.E.M certified, or After-market glass to fit any budget</p>

    </div>
    <div class="usa-number-div-inner-content">
        <span>02</span>
        <h5>
            professional installation of all parts</h5>
        <p>We are a preferred repair facility for AAA, Farmers, Geico, State Farm, and many other major insurance companies. We make sure we do it right the first time.</p>


    </div>

    <div class="usa-number-div-inner-content">
        <span>03</span>

        <h5>
            ADAS calibration</h5>
        <p>We provide each and every customer with a life time warranty on install. We guarantee against any air leaks, water leaks, wind noise or defects.</p>
    </div>
    <div class="usa-number-div-inner-content">
        <span>04</span>
        <h5>
            We Come To You</h5>
        <p>Why drive down to a repair facility and wait? We come to your home or office and replace your glass right on-site. Best of all, you can pay with cash, company check or credit card</p>

    </div>


</section>

<!-- <section class="special-div" >
    <div class="special-left">
        <h1>Why We Are Special </h1>

        <h3>We are offer part selling & Installation</h3>
        <div class="special-div-circle-div">
            <h6> selling part at wholesale price and always availability</h6>
            <div class="three-circle-div">
                <img src="assets/images/Vector (2).png">
                <div class="special-left-p">
                    <p>Lorem Ipsum is simply dummy text
                        of the printing and typesetting
                        industry
                    </p>
                </div>
            </div>

        </div>

        <div class="special-div-circle-div">
            <h6>professional installation of all parts</h6>
            <div class="three-circle-div">
                <img src="assets/images/Vector (2).png">
                <div class="special-left-p">
                    <p>Lorem Ipsum is simply dummy text
                        of the printing and typesetting
                        industryLorem Ipsum has been the
                        industry's standard dummy text
                    </p>
                </div>
            </div>

        </div>

        <div class="special-div-circle-div">
            <h6>ADAS calibration</h6>
            <div class="three-circle-div">
                <img src="assets/images/Vector (3).png">

                <div class="special-left-p">
                    <p>Lorem Ipsum is simply dummy text
                        of the printing and typesetting
                        industryLorem Ipsum has been the
                        industry's standard dummy text
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="special-img">

    </div>

</section> -->



<section class="end-new-section">
    <p>MOBILE WINDSHIELD REPAIR & REPLACEMENT SAME DAY, 24-7 SERVICE</p>

    <button className="second-btn-animation" onclick="window.location='{{ url("vehicle") }}'">GET QUOTE</button>
    <img src="\assets\images\bg5 1.png">
</section>
<!-- hx-testimonial-area start -->
<div class="hx-testimonial-area">
    <div class="container">
        <div class="hx-testimonial-active owl-carousel">
            <div class="hx-testimonial-wrap">
                <div class="hx-testimonial-item">
                    <div class="hx-testimonial-icon">
                        <i class="fi flaticon-writer"></i>
                    </div>
                    <div class="hx-testimonial-content">
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum.</p>
                    </div>
                    <div class="hx-testimonial-img">
                        <img src="assets/images/testimonial/2.jpg" alt="">
                    </div>
                    <div class="hx-testimonial-content">
                        <h4>Jimmy Alex</h4>
                        <span>SEO of Northy</span>
                    </div>
                </div>
            </div>
            <div class="hx-testimonial-wrap">
                <div class="hx-testimonial-item">
                    <div class="hx-testimonial-icon">
                        <i class="fi flaticon-writer"></i>
                    </div>
                    <div class="hx-testimonial-content">
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum.</p>
                    </div>
                    <div class="hx-testimonial-img">
                        <img src="assets/images/testimonial/2.jpg" alt="">
                    </div>
                    <div class="hx-testimonial-content">
                        <h4>Jimmy Alex</h4>
                        <span>SEO of Northy</span>
                    </div>
                </div>
            </div>
            <div class="hx-testimonial-wrap">
                <div class="hx-testimonial-item">
                    <div class="hx-testimonial-icon">
                        <i class="fi flaticon-writer"></i>
                    </div>
                    <div class="hx-testimonial-content">
                        <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum.</p>
                    </div>
                    <div class="hx-testimonial-img">
                        <img src="assets/images/testimonial/2.jpg" alt="">
                    </div>
                    <div class="hx-testimonial-content">
                        <h4>Jimmy Alex</h4>
                        <span>SEO of Northy</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hx-testimonial-area end -->
<div class="container" style="padding:20px 0px;width:90%">
    <div class="row">
        <div class="col col-xs-12">
            <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen style="width:100%;height:300px"></iframe>
            </div>
        </div>
    </div>
</div>


<div class="btns get-a-quote-btn">

    <a href="vehicle" class="theme-btn">
        <div class="get-a-quote-btn-icon-div"><img src="assets\images\banner\quoteicon.png"> </div>Get Quote
    </a>
</div>


@endsection

@push('scripts')

<script src="https://kit.fontawesome.com/2fd267da14.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2fd267da14.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".about-section-slider", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });



    var swiper = new Swiper(".our-supplier-slider", {
        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
        },
        loop: true,

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 30,


            },

            500: {
                slidesPerView: 2,
                spaceBetween: 30,


            },
            640: {
                slidesPerView: 3,
                spaceBetween: 30,


            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,


            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,


            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,


            },
            1201: {
                slidesPerView: 4,
                spaceBetween: 30,


            },
        },

    });


    var logoSlider = new Swiper(".logo-slider", {

        grid: {
            rows: 3,
        },

        // autoplay: {
        //     delay: 2000,
        //     disableOnInteraction: false,
        // },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 30,
                grid: {
                    rows: 2,
                },
            },
            500: {
                slidesPerView: 2,
                spaceBetween: 30,
                grid: {
                    rows: 2,
                },




            },
            640: {
                slidesPerView: 3,
                spaceBetween: 30,
                grid: {
                    rows: 2,
                },



            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
                grid: {
                    rows: 2,
                },


            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
                grid: {
                    rows: 3,
                },


            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
                grid: {
                    rows: 3,
                },


            },
            1201: {
                slidesPerView: 5,
                spaceBetween: 30,
                grid: {
                    rows: 3,
                },


            },
        },


    });
</script>


@endpush