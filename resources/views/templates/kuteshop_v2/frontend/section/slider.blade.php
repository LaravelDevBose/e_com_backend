@if(!empty($sliders) && count($sliders) > 0)
    <div class="block-slide-main slide-opt-2" style=" min-height: 40rem;">

        <!-- slide -->
        <div class="owl-carousel "
             data-nav="true"
             data-dots="false"
             data-margin="0"
             data-items='1'
             data-autoplayTimeout="700"
             data-autoplay="true"
             data-loop="true">
            @foreach($sliders as $slider)
                <div class="item item2" >
                    <a href="{{ $slider->btn_url }}" title="{{ $slider->slider_title }}" class="img-slide">
                        <img src="{{ $slider->attachment->image_path }}" alt="{{ $slider->slider_title }}" style="width: 100%; height: 40rem;">
                        <h3></h3>
                    </a>
                </div>
            @endforeach
        </div> <!-- slide -->

    </div>
@endif
