@extends('frontend.layout')

@section('content')
<div class="receipe-post-area section-padding-80">
      <!-- Receipe Slider -->
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="receipe-slider owl-carousel">
            @foreach($recipe->galleries as $gallery)
              <img src="{{  asset("storage/" . $gallery->path) }}" alt="" />
            @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- Receipe Content Area -->
      <div class="receipe-content-area">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-8">
              <div class="receipe-headline my-5">
                <h2>{{ $recipe->title }}</h2>
                <div class="receipe-duration">
                  <h6>Prep: {{ $recipe->prep }} mins</h6>
                  <h6>Cook: {{ $recipe->cook }} mins</h6>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-4">
              <div class="receipe-ratings text-right my-5">
                <h3 class="btn delicious-btn">{{ $recipe->level }}</h3>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-lg-8">
              <!-- Single Preparation Step -->
              @foreach($recipe->todos as $todo)
              <div class="single-preparation-step d-flex">
                <h4>{{ $loop->iteration }}</h4>
                <p>
                  {{ $todo->todo }}
                </p>
              </div>
              @endforeach
            </div>

            <!-- Ingredients -->
            <div class="col-12 col-lg-4">
              <div class="ingredients">
                <h4>Ingredients</h4>

                <!-- Custom Checkbox -->
                @foreach($recipe->ingredients as $ingredient)
                <div class="custom-control custom-checkbox">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="customCheck{{ $loop->index }}"
                  />
                  <label class="custom-control-label" for="customCheck{{ $loop->index }}">
                    {{ $ingredient->title }}
                  </label>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection