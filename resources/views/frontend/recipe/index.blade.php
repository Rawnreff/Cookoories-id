@extends('frontend.layout')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div
      class="breadcumb-area bg-img bg-overlay mb-5"
      style="background-image: url({{ asset('frontend/img/bg-img/breadcumb3.jpg') }})"
    >
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="breadcumb-text text-center">
              <h2>The Best Recipes</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <section class="best-receipe-area" style="margin-top: 120px">
      <div class="container">
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
@endsection