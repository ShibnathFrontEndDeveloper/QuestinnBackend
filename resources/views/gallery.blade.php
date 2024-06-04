@include('inc.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css"/>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css"/>-->



<section class="galler_box">
    <!--<a href="{{asset('public/images/sand-coconut-sunrise-hotel-swimming.jpg')}}" data-fancybox="gallery"> <img src="{{asset('public/images/sand-coconut-sunrise-hotel-swimming.jpg')}}" class="img-fluid"></a>-->
    <img src="{{asset('public/images/sand-coconut-sunrise-hotel-swimming.jpg')}}" class="img-fluid">
    
    <div class="food_bg_text">
		<h1>our gallery</h1>
    </div>
</section>
<div class="container">
    <div class="mt-4">
        <h5 class="mt-4 text-center fw-bold">Photo Gallery</h5>
        @if(count($images) > 0)
        <div class="gallery_imgSection">
            @foreach($images as $keys => $image)
            <!--<div class="galImage_box gallery" data-bs-toggle="modal" data-bs-target="#exampleModal{{$keys}}">-->
                <!--<img src="{{asset($image)}}">-->
            <!--    <a href="{{asset($image)}}" ><img src="{{asset($image)}}"></a>-->
            <!--</div>-->
            <!-- <div class="galImage_box gallery">-->
                <!--<img src="{{asset($image)}}">-->
            <!--    <a href="{{asset($image)}}" data-fancybox="gallery"><img src="{{asset($image)}}"></a>-->
                <!--<a href="{{asset($image)}}" ><img src="{{asset($image)}}"></a>-->
            <!--</div>-->
            <div class="galImage_box gallery">
                <a href="{{ asset($image) }}" data-fancybox="gallery" data-caption="Image Caption">
                    <img src="{{ asset($image) }}" alt="Image">
                </a>
            </div>
            
            <!--<div class="modal fade" id="exampleModal{{$keys}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
            <!--  <div class="modal-dialog modal-xl">-->
            <!--    <div class="modal-content responsive_contect">-->
            <!--      <div class="modal-header">-->
            <!--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
            <!--      </div>-->
            <!--      <div class="modal-body">-->
            <!--          <a href="{{asset($image)}}" data-fancybox="gallery"><img src="{{asset($image)}}" class="img-fluid" width="100%"></a>-->
                      <!--<img src="{{asset($image)}}" data-fancybox="gallery" class="img-fluid" width="100%">-->
            <!--      </div>-->
                  
            <!--    </div>-->
            <!--  </div>-->
            <!--</div>-->
             @endforeach
            <!--<div class="galImage_box">-->
            <!--    <img src="">-->
            <!--</div>-->
            <!--<div class="galImage_box">-->
            <!--    <img src="{{asset('public/images/rooms/3.webp')}}">-->
            <!--</div>-->
            <!--<div class="galImage_box">-->
            <!--    <img src="{{asset('public/images/rooms/1.webp')}}">-->
            <!--</div>-->
            <!--<div class="galImage_box">-->
            <!--    <img src="{{asset('public/images/rooms/2.webp')}}">-->
            <!--</div>-->
            <!--<div class="galImage_box">-->
            <!--    <img src="{{asset('public/images/rooms/3.webp')}}">-->
            <!--</div>-->
            <!--<div class="galImage_box">-->
            <!--    <img src="{{asset('public/images/rooms/1.webp')}}">-->
            <!--</div>-->
            <!--<div class="galImage_box">-->
            <!--    <img src="{{asset('public/images/rooms/2.webp')}}">-->
            <!--</div>-->
            <!--<div class="galImage_box">-->
            <!--    <img src="{{asset('public/images/rooms/3.webp')}}">-->
            <!--</div>-->
        </div>
        @endif
    </div>
    <div class="mt-3 mb-5">
        <h5 class="mt-4 text-center fw-bold mb-4">Video Gallery</h5>
        @if(count($videos) > 0)
        <div class="row">
            @foreach($videos as $keys => $video)
                @if($video != null)
                <div class="col-lg-4">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="{{$video}}" allowfullscreen></iframe>
                    </div>
                </div>
                @endif
            @endforeach
            <!--<div class="col-lg-4">-->
            <!--    <div class="embed-responsive embed-responsive-16by9">-->
            <!--      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-lg-4">-->
            <!--    <div class="embed-responsive embed-responsive-16by9">-->
            <!--      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        @endif
    </div>
</div>


<script>
   
    $(document).ready(function() {
        // Initialize Fancybox
        $("[data-fancybox]").fancybox({
            // Options here
        });
    });

</script>







































@include('inc.footer')