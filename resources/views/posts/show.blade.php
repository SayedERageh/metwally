@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title)

@section('meta')
<meta name="description" content="{{ $post->meta_description }}">
<meta name="keywords" content="{{ $post->meta_keywords }}">
@endsection

@section('content')
 <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">المقــالات</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">posts</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
<main class="main" dir="rtl">

<!-- PAGE HEADER -->
<div class="page-title py-4 bg-light border-bottom">
  <div class="container d-lg-flex justify-content-between align-items-center">

    <div>
      <h1 class="fw-bold">{{ $post->title }}</h1>

      <div class="text-muted mt-2">
        <i class="bi bi-calendar"></i>
        {{ $post->created_at->format('Y-m-d') }}

        &nbsp; | &nbsp;

        <i class="bi bi-folder"></i>
        {{ $post->category->name ?? 'بدون تصنيف' }}
      </div>
    </div>

    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{ route('home') }}">الرئيسية</a></li>
        <li><a href="{{ route('posts.index') }}">المقالات</a></li>
        <li class="current">{{ $post->title }}</li>
      </ol>
    </nav>

  </div>
</div>

<!-- CONTENT -->
<div class="container my-5">
  <div class="row g-4">

    <!-- MAIN ARTICLE -->
    <div class="col-lg-8">

      <article class="bg-white p-3 p-md-4 shadow-sm rounded">

        <!-- IMAGE -->
        <div class="post-img mb-4">
          <img src="{{ asset('uploads/' . $post->image) }}"
               class="img-fluid rounded"
               style="width:100%; max-height:450px; object-fit:cover;">
        </div>

        <!-- SHORT DESCRIPTION -->
        @if($post->short_description)
        <div class="alert alert-secondary">
          {{ $post->short_description }}
        </div>
        @endif

        <!-- PARAGRAPHS (CMS STYLE) -->
        <div class="post-content">

          @foreach($post->paragraphs as $paragraph)

            <div class="mb-5">

              @if($paragraph->image)
                <img src="{{ asset('uploads/' . $paragraph->image) }}"
                     class="img-fluid rounded mb-3"
                     style="width:100%; max-height:400px; object-fit:cover;">
              @endif

         

            </div>

          @endforeach
    <div class="article-content p-2 p-md-3">
    {!! $post->content !!}
</div>

        </div>

        <!-- SHARE SECTION -->
        <div class="border-top pt-3 mt-4">

          <strong>شارك المقال:</strong>

          <div class="mt-2 d-flex gap-2">

            <a href="#" class="btn btn-sm btn-primary">
              Facebook
            </a>

            <a href="#" class="btn btn-sm btn-info text-white">
              Twitter
            </a>

            <a href="#" class="btn btn-sm btn-success">
              WhatsApp
            </a>

          </div>

        </div>

      </article>

    </div>

    <!-- SIDEBAR -->
    <div class="col-lg-4">

      <!-- Categories -->
      <div class="bg-white p-3 shadow-sm rounded mb-4">

        <h5 class="border-bottom pb-2">التصنيفات</h5>

        <ul class="list-unstyled mt-3">

          @foreach($categories as $category)
            <li class="mb-2 d-flex justify-content-between">
              <a href="#" class="text-dark text-decoration-none">
                {{ $category->name }}
              </a>

              <span class="badge bg-secondary">
                {{ $category->posts_count }}
              </span>
            </li>
          @endforeach

        </ul>

      </div>

      <!-- RECENT POSTS -->
      <div class="bg-white p-3 shadow-sm rounded">

        <h5 class="border-bottom pb-2">آخر المقالات</h5>

        @foreach($recentPosts as $item)

          <div class="d-flex mb-3">

            <img src="{{ asset('uploads/' . $item->image) }}"
                 style="width:70px;height:70px;object-fit:cover;border-radius:8px;">

            <div class="ms-2">

              <a href="{{ route('posts.show', $item->slug) }}"
                 class="text-dark fw-bold text-decoration-none small">

                {{ $item->title }}

              </a>

              <div class="text-muted small">
                {{ $item->created_at->format('Y-m-d') }}
              </div>

            </div>

          </div>

        @endforeach

      </div>

    </div>

  </div>
</div>

<!-- RELATED POSTS -->
<div class="container my-5">

  <h4 class="mb-4">مقالات مشابهة</h4>

  <div class="row">

    @foreach($relatedPosts ?? [] as $item)

      <div class="col-md-4 mb-3">

        <div class="card shadow-sm">

          <img src="{{ asset('uploads/' . $item->image) }}"
               class="card-img-top"
               style="height:200px;object-fit:cover;">

          <div class="card-body">

            <h6>
              <a href="{{ route('posts.show', $item->slug) }}"
                 class="text-dark text-decoration-none">
                {{ $item->title }}
              </a>
            </h6>

          </div>

        </div>

      </div>

    @endforeach

  </div>

</div>

</main>

@endsection