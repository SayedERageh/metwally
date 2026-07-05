<!-- Contact Section -->
<section id="contact" class="contact section" dir="rtl">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>تواصل معنا</h2>
    <p>
      يسعدنا الرد على جميع استفساراتكم الخاصة بالخلاطات والغسالات وقطع الغيار.
      تواصل معنا الآن وسنساعدك في اختيار المنتج المناسب.
    </p>
  </div>

  <!-- Google Map -->
  <div class="mb-5">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d213.64594278783184!2d30.8541550144265!3d31.044769976231596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1783247422211!5m2!1sar!2seg"
      style="width:100%; height:400px; border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="strict-origin-when-cross-origin">
    </iframe>
  </div>

  <div class="container" data-aos="fade">

    <div class="row gy-5 gx-lg-5">

      <!-- معلومات المتجر -->
      <div class="col-lg-4">

        <div class="info">
          <h3>متولي الكتريك</h3>

          <p>
            متخصصون في بيع الخلاطات والغسالات وقطع الغيار الأصلية،
            ونوفر أفضل المنتجات بأسعار تنافسية مع خدمة عملاء مميزة.
          </p>

          <div class="info-item d-flex">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h4>العنوان</h4>
              <p>يمكنك زيارة متجرنا من خلال الموقع الموجود على الخريطة.</p>
            </div>
          </div>

          <div class="info-item d-flex">
            <i class="bi bi-phone flex-shrink-0"></i>
            <div>
              <h4>رقم الهاتف</h4>
              <p dir="ltr">01044946388</p>
            </div>
          </div>

          <div class="info-item d-flex">
            <i class="bi bi-facebook flex-shrink-0"></i>
            <div>
              <h4>صفحة فيسبوك</h4>
              <p>
                <a href="https://www.facebook.com/profile.php?id=61591562046753" target="_blank">
                  متابعة الصفحة
                </a>
              </p>
            </div>
          </div>

        </div>

      </div>

      <!-- نموذج التواصل -->
      <div class="col-lg-8">

        <form action="{{ route('contact.store') }}" method="POST">

          @csrf

          <div class="row">

            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" placeholder="الاسم" required>
            </div>

            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف" required>
            </div>

          </div>

          <div class="form-group mt-3">
            <textarea name="message" class="form-control" rows="5" placeholder="اكتب استفسارك أو اسم قطعة الغيار التي تبحث عنها..." required></textarea>
          </div>

          <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary">
              إرسال الطلب
            </button>
          </div>

        </form>

      </div>

    </div>

  </div>

</section>