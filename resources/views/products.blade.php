
@extends('layout')
@section('title', 'Products')
@section('content')

<!-- end of banner_wrapper_outter -->
            
         <body class="main-layout">
  <!-- header section start -->
       
      
  <!-- header section end -->
  <!-- new collection section start -->
    <div class="layout_padding collection_section">
      <div class="container">
          <h1 class="new_text"><strong>New  Collection</strong></h1>
          <p class="consectetur_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
          <div class="collection_section_2">
            <div class="row">
              <div class="col-md-6">
                <div class="about-img">
                  <button class="new_bt">New</button>
                  <div class="shoes-img"><img src="{{ asset('imag/shoes-img1.png') }}"></div>
                  <p class="sport_text">Men Sports</p>
                  <div class="dolar_text">$<strong style="color: #f12a47;">90</strong> </div>
                  <div class="star_icon">
                    <ul>
                      <li><a href="#"><img src="{{asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{asset('imag/star-icon.png') }}"></a></li>
                    </ul>
                  </div>
                </div>
                <button class="seemore_bt">See More</button>
              </div>
              <div class="col-md-6">
                <div class="about-img2">
                  <div class="shoes-img2"><img src="{{asset('imag/shoes-img2.png') }}"></div>
                  <p class="sport_text">Men Sports</p>
                  <div class="dolar_text">$<strong style="color: #f12a47;">90</strong> </div>
                  <div class="star_icon">
                    <ul>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="collection_section">
      <div class="container">
        <h1 class="new_text"><strong>Racing Boots</strong></h1>
          <p class="consectetur_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
      </div>
    </div>
    <div class="collectipn_section_3 layuot_padding">
      <div class="container">
        <div class="racing_shoes">
          <div class="row">
            <div class="col-md-8">
              <div class="shoes-img3"><img src="{{ asset('imag/shoes-img3.png') }}"></div>
            </div>
            <div class="col-md-4">
              <div class="sale_text"><strong>Sale <br><span style="color: #0a0506;">JOGING</span> <br>SHOES</strong></div>
              <div class="number_text"><strong>$ <span style="color: #0a0506">100</span></strong></div>
              <button class="seemore">See More</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="collection_section layout_padding">
      <div class="container">
        <h1 class="new_text"><strong>New Arrivals Products</strong></h1>
          <p class="consectetur_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
      </div>
    </div>
  <!-- new collection section end -->
  <!-- New Arrivals section start -->
    <div class="layout_padding gallery_section">
      <div class="container">
       
          
          
         
        <div class="row">
         
         @foreach($products as $product)
          <div class="col-sm-4">
            <div class="best_shoes">
              <p class="best_text">Sports Shoes</p>
              <div class="shoes_icon"><img src="{{ URL::to('/') }}/images/{{$product->image}} "></div>
              <div class="caption">
                            <h4>{{ $product->first_name }}</h4>     
                           
                           
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
              <div class="star_text">
                <div class="left_part">
                  <ul>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                      <li><a href="#"><img src="{{ asset('imag/star-icon.png') }}"></a></li>
                    </ul>
                </div>
                <div class="right_part">
                  <div class="shoes_price">$ <span style="color: #ff4e5b;">{{ $product->price }}</div>
                </div>
              </div>
            </div>
          </div>
           @endforeach
        </div>
        <div class="buy_now_bt">
          <button class="buy_text">Buy Now</button>
        </div>
      </div>
    </div>
  
  <div class="copyright">2019 All Rights Reserved. <a href="https://html.design">Free html  Templates</a></div>


      @section('scripts')

 <script type="text/javascript">
     <script src="{{ asset('jss/jquery.min.js') }}"></script>
      <script src="{{ asset('jss/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('jss/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('jss/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('jss/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('jss/custom.js') }}"></script>
      <!-- javascript --> 
      <script src="{{ asset('jss/owl.carousel.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js">
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         
$('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event){

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event){

                var yMove = event.originalEvent.touches[0].pageY;
                if( Math.floor(yClick - yMove) > 1 ){
                    $(".carousel").carousel('next');
                }
                else if( Math.floor(yClick - yMove) < -1 ){
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                $(this).off("touchmove");
            });
        });
</script>
@endsection
@endsection