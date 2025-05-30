@extends('frontend.layout')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div
      class="breadcumb-area bg-img bg-overlay"
      style="background-image: url({{  asset("storage/" . $post->banner) }})"
    >
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="breadcumb-text text-center">
              <h2>{{ $post->title }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-80">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="blog-posts-area">
              <!-- Single Blog Area -->
              <div class="single-blog-area mb-80">
                <!-- Thumbnail -->
                <div class="blog-thumbnail">
                  <img src="{{  asset("storage/" . $post->banner) }}" alt="" />
                </div>
                <!-- Content -->
                <div class="blog-content">
                  <h1 class="post-title my-3">
                    {{ $post->title }}
                  </h1>
                  <p>
                    {{ $post->description }}
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-4">
        <div class="blog-sidebar-area">
          <!-- Widget -->
          <div class="single-widget categories-widget">
            <h6>Categories</h6>
            <ul class="categories-list">
              @foreach ($categories as $category)
                <li>
                  <a href="{{ route('blog.category', $category->slug) }}" 
                    class="{{ isset($currentCategory) && $currentCategory->slug === $category->slug ? 'active' : '' }}">
                    {{ $category->title }}
                    <span class="category-count">({{ $category->posts_count }})</span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
          
          <!-- Popular Posts Widget -->
          <div class="single-widget popular-posts">
            <h6>Popular Posts</h6>
            <div class="popular-post">
              <img src="https://via.placeholder.com/80" alt="Popular post">
              <div class="post-content">
                <a href="#" class="post-title">Top 10 Recipes for Summer</a>
                <span class="post-date">June 15, 2023</span>
              </div>
            </div>
            <div class="popular-post">
              <img src="https://via.placeholder.com/80" alt="Popular post">
              <div class="post-content">
                <a href="#" class="post-title">Healthy Breakfast Ideas</a>
                <span class="post-date">May 28, 2023</span>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection