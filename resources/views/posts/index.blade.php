@extends('layouts.app')

@section('title', 'المقالات')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">المقــالات</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('contact') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">posts</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
<main class="main">

<section id="posts" class="services section" dir="rtl">

  <!-- TITLE -->
  <div class="container section-title" data-aos="fade-up">
    <h2>المقالات</h2>
    <p>تابع أحدث المقالات والنصائح من خلال تصنيفات مختلفة</p>
  </div>

  <!-- FILTER -->
  <div class="container mb-5 text-center" data-aos="fade-up">

    <a href="{{ route('posts.index') }}"
       class="btn m-1 {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }}">
      الكل
    </a>

    @foreach($categories as $category)
      <a href="{{ route('posts.index', ['category' => $category->id]) }}"
         class="btn m-1 {{ request('category') == $category->id ? 'btn-primary' : 'btn-outline-primary' }}">
        {{ $category->name }}
      </a>
    @endforeach

  </div>

  <!-- POSTS -->
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

      @forelse($posts as $post)

        <div class="col-xl-4 col-md-6" data-aos="zoom-in">

          <div class="service-item shadow-sm h-100">

            <!-- IMAGE -->
            <div class="img position-relative">
              <img src="{{ asset('uploads/' . $post->image) }}"
                   class="img-fluid"
                   style="height:320px; width:100%; object-fit:cover; border-radius:10px 10px 0 0;"
                   alt="{{ $post->title }}">
            </div>

            <!-- DETAILS -->
            <div class="details p-3 position-relative">

              <div class="icon mb-2">
                <i class="bi bi-journal-text"></i>
              </div>

              <a href="{{ route('posts.show', $post->slug) }}" class="text-dark text-decoration-none">
                <h4 class="fw-bold">{{ $post->title }}</h4>
              </a>

              <p class="text-muted">
                {{ \Illuminate\Support\Str::limit($post->short_description, 120) }}
              </p>

              <a href="{{ route('posts.show', $post->slug) }}"
                 class="btn btn-sm btn-primary mt-2">
                قراءة المقال
              </a>

            </div>

          </div>

        </div>

      @empty

        <div class="col-12 text-center">
          <h4 class="text-muted">لا توجد مقالات حالياً</h4>
        </div>

      @endforelse

    </div>

  </div>

</section>

</main>

@endsection