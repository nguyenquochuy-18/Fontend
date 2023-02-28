@if(isset($sliders))
<div class="slider-area an-1 hm-1">
    <!-- slider -->
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            @foreach($sliders as $slider)
            <img src="{{pare_url_file($slider->avatar)}}" alt="" title="#slider-direction-1" />
            @endforeach
        </div>
    </div>
    <!-- slider end-->
</div>
@endif
