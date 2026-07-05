<section class="features section" dir="rtl" id="services">

  <div class="container">

    <div class="text-center mb-5">
      <h2>منتجاتنا</h2>
      <p class="text-muted">
        نوفر تشكيلة كبيرة من الأدوات والمستلزمات الكهربائية وقطع الغيار الأصلية
      </p>
    </div>

    <div class="row g-4">

      @foreach($services as $service)

        <div class="col-md-4 col-sm-6">

          <div class="service-card text-center p-4 shadow-sm rounded h-100">

            <img src="{{ asset('uploads/' . $service->image) }}"
                 class="img-fluid mb-3"
                 style="height:120px; object-fit:contain;">

            <h4 class="mb-2">{{ $service->title }}</h4>

            <p class="text-muted">
              {{ Str::limit($service->description, 90) }}
            </p>

            <a href="{{ route('services.show', $service->slug) }}"
               class="btn btn-warning btn-sm mt-2">
              عرض التفاصيل
            </a>

          </div>

        </div>

      @endforeach

    </div>

  </div>

</section>