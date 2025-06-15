@extends('frontend.layout')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div
      class="breadcumb-area bg-img bg-overlay"
      style="background-image: url({{ asset('frontend/img/bg-img/breadcumb1.jpg') }})"
    >
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="breadcumb-text text-center">
              <h2>About us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-area section-padding-80">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-heading">
              <h3>Who we are and what we do?</h3>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h6 class="sub-heading pb-5">
            Cookoories is a place for food lovers to discover, share and try delicious recipes from around the world. We provide step-by-step guides to help you create the best dishes in your kitchen.
            </h6>

            <p class="text-center">
            We believe that cooking is not just about food, but also about the experience and togetherness. With a growing collection of recipes, Cookoories is here to inspire everyone, both beginners and experts. Explore various categories, from healthy food to mouth-watering desserts!
            </p>
          </div>
        </div>

        <div class="row align-items-center mt-70">
          <!-- Single Cool Fact -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-cool-fact">
              <h3><span class="counter">1287</span></h3>
              <h6>Amazing recipes</h6>
            </div>
          </div>

          <!-- Single Cool Fact -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-cool-fact">
              <h3><span class="counter">25</span></h3>
              <h6>Burger recipes</h6>
            </div>
          </div>

          <!-- Single Cool Fact -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-cool-fact">
              <h3><span class="counter">471</span></h3>
              <h6>Meat recipes</h6>
            </div>
          </div>

          <!-- Single Cool Fact -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="single-cool-fact">
              <h3><span class="counter">326</span></h3>
              <h6>Desert recipes</h6>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <p class="text-center">
            With a variety of recipes that can be accessed for free, Cookoories is the right place for anyone who wants to explore the culinary world. From traditional dishes to modern creations, we provide inspiration for every special moment in your kitchen. Happy cooking and sharing happiness with Cookoories!
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- ##### About Area End ##### -->
@endsection