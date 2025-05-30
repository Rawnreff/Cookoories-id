@extends('frontend.layout')

@section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
      <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        @foreach($latest_recipes as $latest_recipe)
        <div
          class="single-hero-slide bg-img"
          style="background-image: url('{{ asset("storage/" . $latest_recipe->galleries()->first()->path) }}')"
        >
          <div class="container h-100">
            <div class="row h-100 align-items-center">
              <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div
                  class="hero-slides-content"   
                  data-animation="fadeInUp"
                  data-delay="100ms"
                >
                  <h2 data-animation="fadeInUp" data-delay="300ms">
                    {{ $latest_recipe->title }}
                  </h2>
                  <a
                    href="{{ route('recipe.show',    $latest_recipe->slug) }}"
                    class="btn mt-5 delicious-btn"
                    data-animation="fadeInUp"
                    data-delay="1000ms"
                    >See Receipe</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        <!-- Single Hero Slide -->
      </div>
</section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area mt-5">
      <div class="container">
        <div class="row mt-5">
          <div class="col-12">
            <div class="section-heading">
              <h3>The Best Recipes</h3>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- Single Best Receipe Area -->
          @foreach($recipes as $recipe)
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-best-receipe-area mb-30">
              <a href="{{ route('recipe.show', $recipe->slug) }}">
                <img src="{{  asset("storage/" . $recipe->galleries()->first()->path) }}" alt="" />
              </a>
              <div class="receipe-content">
                <a href="{{ route('recipe.show', $recipe->slug) }}">
                  <h5>{{ $recipe->title }}</h5>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <section
      class="cta-area bg-img bg-overlay"
      style="background-image: url({{ asset('frontend/img/bg-img/bg4.jpg') }})"
    >
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <!-- Cta Content -->
            <div class="cta-content text-center">
              <h2>Gluten Free Recipes</h2>
              <p>
                Fusce nec ante vitae lacus aliquet vulputate. Donec scelerisque
                accumsan molestie. Vestibulum ante ipsum primis in faucibus orci
                luctus et ultrices posuere cubilia Curae; Cras sed accumsan
                neque. Ut vulputate, lectus vel aliquam congue, risus leo
                elementum nibh
              </p>
              <a href="{{ route('recipe') }}" class="btn delicious-btn"
                >Discover all the recipes</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Small Receipe Area Start ##### -->
    <section class="small-receipe-area section-padding-80-0">
      <div class="container">
        <div class="row">
          <!-- Small Receipe Area -->
          @foreach ($posts as $post)
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-small-receipe-area d-flex">
              <!-- Receipe Thumb -->
              <div class="receipe-thumb">
                <a href="{{ route('blog.show', $post->slug) }}">
                  <img src="{{  asset("storage/" . $post->banner) }}" alt="" />
                </a>
              </div>
              <!-- Receipe Content -->
              <div class="receipe-content" style="margin-top: 0.75rem">
                <span>{{ date_format($post->created_at, 'M d, Y') }}</span>
                <a href="{{ route('blog.show', $post->slug) }}">
                  <h5>{{ $post->title }}</h5>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- ##### Small Receipe Area End ##### -->

    <!-- ##### Quote Subscribe Area Start ##### -->
    <section class="quote-subscribe-adds mt-5 mb-5">
      <div class="container">
        <div class="row align-items-center">
          <!-- Quote -->
          <div class="col-12 col-lg-6">
            <div class="quote-area text-center">
              <span>"</span>
              <h4>
                Nothing is better than going home to family and eating good food
                and relaxing
              </h4>
              <p>John Smith</p>
            </div>
          </div>

          <!-- Ads -->
          <div class="col-12 col-lg-6">
            <div class="delicious-add">
              <img src="{{ asset('frontend/img/bg-img/bibimbap ads.png') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ##### Quote Subscribe Area End ##### -->
@endsection