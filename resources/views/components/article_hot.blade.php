@if(isset($articleHot))
    @foreach($articleHot as $arHot)
<div class="atticle_hot_item">
    <div class="article_img">
        <a href="{{route('get.detail.article',[$arHot->a_slug,$arHot->id])}}">
            <img src="{{pare_url_file($arHot->a_avatar)}}" alt="" style="max-height: 200px">
        </a>
    </div>
    <div class="article_info" >
        <h5 style="margin-top: 10px;margin-bottom: 10px">{{$arHot->a_name}}</h5>
        <p>{{$arHot->a_description}}</p>
    </div>
</div>
    @endforeach
@endif
