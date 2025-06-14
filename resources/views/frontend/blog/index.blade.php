@extends('frontend.layout')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div
      class="breadcumb-area bg-img bg-overlay"
      style="background-image: url({{ asset('frontend/img/bg-img/breadcumb2.jpg') }})"
    >
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12">
            <div class="breadcumb-text text-center">
              <h2>{{ isset($category) ? $category->title : "Blog" }}</h2>
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
          @foreach($posts as $post)
          <div class="single-blog-area">
            <!-- Thumbnail -->
            <div class="blog-thumbnail">
              <img src="{{ asset('storage/' . $post->banner) }}" alt="{{ $post->title }}" />
              @if($post->category)
              <div class="post-category-badge" style="background-color: {{ $post->category->color ?? '#ffff' }}">
                {{ $post->category->title }}
              </div>
              @endif
            </div>
            <!-- Content -->
            <div class="blog-content">
              <div class="post-meta">
                <span class="post-date">{{ $post->created_at->format('M d, Y') }}</span>
                <span class="post-read-time">5 min read</span>
              </div>
              <a href="single-blog.html" class="post-title">
                {{ $post->title }}
              </a>
              <p class="post-excerpt">
                {{ $post->excerpt }}
              </p>
              <div class="post-footer">
                <a href="{{ route('blog.show', $post->slug) }}" class="read-more-btn">
                  Read More
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                  </svg>
                </a>
                <div class="post-reactions">
                  <span class="reaction-icon">❤️ 24</span>
                  <span class="reaction-icon">💬 8</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <nav aria-label="Page navigation">
          <ul class="pagination">
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link next" href="#" aria-label="Next">
                <span aria-hidden="true">»</span>
              </a>
            </li>
          </ul>
        </nav>
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