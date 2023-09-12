<div class="modal-wrap row">
    <div class="col-lg-12">
        <div class="modal-img">
            <div class="swiper-container modal-slider main-slider-modal " style="    overflow: hidden;">
                <div class="swiper-wrapper">
                    @if($product->images->count() > 0)
                        @foreach($product->images as $singleImage)
                            <div class="swiper-slide">
                               
                                    <img class="img-full" src="{{ $singleImage->img_url }}" alt="Product Image">
                               
                            </div>
                            <div class="swiper-slide">
                                
                                    <img class="img-full" src="{{ $singleImage->img_url }}" alt="Product Image">
                                
                            </div>
                            <div class="swiper-slide">
                                
                                    <img class="img-full" src="{{ $singleImage->img_url }}" alt="Product Image">
                                
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            
                                <img class="img-full" src="/assets/images/product/large-size/glass-2.png" alt="Product Image">
                            
                        </div>
                    @endif
                </div>
            </div>
           
        </div>
    </div>
   
</div>