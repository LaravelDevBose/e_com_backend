@if(!empty($sliders) && count($sliders) > 0)
<!-- block slide top -->
<div class="block-slide-main slide-opt-12">

    <!-- slide -->
    <div class="owl-carousel " data-nav="true" data-dots="true" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="true" data-loop="true">

        @foreach($sliders as $slider)
        <div class="item item1">
            <img src="{{ $slider->attachment->image_path }}" alt="{{ $slider->slider_title }}" class="img-slide">
            <div class="description">
                <span class="subtitle ">HOT discount of the week</span>
                <span class="title">fashion 2015 </span>
                <span class="des">summer</span>
                <a href="" class="btn view-opt12">SHOP NOW </a>
            </div>
        </div>
        @endforeach
    </div> <!-- slide -->

</div><!-- block slide top -->
@endif



<!--banner  -->
<div class="col-right">
    <div class="banner-slide">
        <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/banner-slide.jpg')}}" alt="img"></a>
    </div>

    <div class="block-logo-brand">
        <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                    "0":{"items":1},
                                    "480":{"items":1},
                                    "768":{"items":1},
                                    "992":{"items":1},
                                    "1200":{"items":1}
                                    }'>
            <div class="item">
                <img src="{{ asset('/kuteshop_v1/images/media/index12/logo-brand.jpg') }}" alt="img">
            </div>
            <div class="item">
                <img src="{{ asset('/kuteshop_v1/images/media/index12/logo-brand.jpg') }}" alt="img">
            </div>
            <div class="item">
                <img src="{{ asset('/kuteshop_v1/images/media/index12/logo-brand.jpg') }}" alt="img">
            </div>
        </div>
    </div>

</div>
<!--banner  -->
