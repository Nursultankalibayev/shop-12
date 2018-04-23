@if(count($carousels))
<div class="container">
    <div class="carousel">
        <div class="owl-carousel owl-theme">
            @foreach($carousels as $carousel)
              <div class="item">
                  <img src="/uploads/{{$carousel->image}}" alt="">
                  <div class="carousel_text">
                      <a href="{{$carousel->link}}">{!! $carousel->title !!}</a>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endif