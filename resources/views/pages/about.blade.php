@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<!-- About Section -->
<section id="about" class="about section" dir="rtl">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>من نحن؟</h2>
    <p>
      في <strong>متولي الكتريك</strong> نوفر لعملائنا أفضل الخلاطات والغسالات وقطع الغيار الأصلية،
      مع الالتزام بالجودة والأسعار المناسبة وخدمة عملاء متميزة تضمن تجربة شراء موثوقة.
    </p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up">

    <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

      <div class="col-lg-5">
        <div class="about-img">
          <img src="assets/img/aqar.png" class="img-fluid" alt="متولي الكتريك">
        </div>
      </div>

      <div class="col-lg-7">
        <h3 class="pt-0 pt-lg-5">
          متولي الكتريك وجهتك الموثوقة للأجهزة الكهربائية وقطع الغيار الأصلية بأعلى جودة وأفضل الأسعار.
        </h3>

        <!-- Tabs -->
        <ul class="nav nav-pills mb-3">
          <li><a class="nav-link active" data-bs-toggle="pill" href="#about-tab1">عن المتجر</a></li>
          <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab2">رؤيتنا</a></li>
          <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab3">لماذا نحن؟</a></li>
        </ul><!-- End Tabs -->

        <!-- Tab Content -->
        <div class="tab-content">

          <!-- Tab 1 -->
          <div class="tab-pane fade show active" id="about-tab1">

            <p class="fst-italic">
              نقدم مجموعة متنوعة من الخلاطات والغسالات وقطع الغيار الأصلية، مع الحرص على توفير منتجات عالية الجودة تلبي احتياجات جميع العملاء.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>خلاطات منزلية عالية الجودة</h4>
            </div>
            <p>
              نوفر أحدث موديلات الخلاطات التي تجمع بين الأداء القوي والتصميم العصري لتناسب جميع الاستخدامات.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>غسالات من أفضل الماركات</h4>
            </div>
            <p>
              تشكيلة واسعة من الغسالات بمواصفات مختلفة تناسب جميع الاحتياجات والميزانيات.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>قطع غيار أصلية</h4>
            </div>
            <p>
              نوفر قطع غيار أصلية لضمان الحفاظ على كفاءة الأجهزة وإطالة عمرها الافتراضي.
            </p>

          </div><!-- End Tab 1 -->

          <!-- Tab 2 -->
          <div class="tab-pane fade" id="about-tab2">

            <p class="fst-italic">
              نسعى لأن يكون متولي الكتريك الخيار الأول لكل من يبحث عن الجودة والثقة في عالم الأجهزة الكهربائية.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>تقديم أفضل جودة</h4>
            </div>
            <p>
              نختار منتجاتنا بعناية لضمان أعلى مستويات الجودة والأداء.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>رضا العميل أولويتنا</h4>
            </div>
            <p>
              نلتزم بتقديم خدمة متميزة ومساعدة العملاء في اختيار المنتج المناسب.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>تطوير مستمر</h4>
            </div>
            <p>
              نحرص على توفير أحدث المنتجات وقطع الغيار لتلبية احتياجات السوق باستمرار.
            </p>

          </div><!-- End Tab 2 -->

          <!-- Tab 3 -->
          <div class="tab-pane fade" id="about-tab3">

            <p class="fst-italic">
              ثقة عملائنا هي أكبر دليل على جودة منتجاتنا وخدماتنا.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>منتجات أصلية 100%</h4>
            </div>
            <p>
              جميع المنتجات وقطع الغيار لدينا أصلية ومضمونة الجودة.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>أسعار تنافسية</h4>
            </div>
            <p>
              نقدم أفضل الأسعار مع عروض وخصومات مستمرة على العديد من المنتجات.
            </p>

            <div class="d-flex align-items-center mt-4">
              <i class="bi bi-check2"></i>
              <h4>خدمة عملاء متميزة</h4>
            </div>
            <p>
              فريقنا جاهز دائمًا للإجابة على استفساراتك ومساعدتك في اختيار المنتج المناسب.
            </p>

          </div><!-- End Tab 3 -->

        </div>

      </div>

    </div>

  </div>

</section>

<section class="section bg-light text-center">

  <div class="container">
    <div class="row g-5 justify-content-center">

      <!-- منتجاتنا -->
      <div class="col-lg-6 col-md-6">
        <div class="circle-wrap">
          <div class="dot"></div>
          <div class="circle-card">
            <div class="icon"><i class="bi bi-shop"></i></div>
            <h4>أجهزة كهربائية</h4>
            <p>
              نوفر مجموعة متنوعة من الخلاطات والغسالات والأجهزة المنزلية من أفضل العلامات التجارية بجودة مضمونة.
            </p>
          </div>
        </div>
      </div>

      <!-- قطع الغيار -->
      <div class="col-lg-6 col-md-6">
        <div class="circle-wrap">
          <div class="dot"></div>
          <div class="circle-card">
            <div class="icon"><i class="bi bi-gear-fill"></i></div>
            <h4>قطع غيار أصلية</h4>
            <p>
              جميع قطع الغيار لدينا أصلية ومتوافقة مع مختلف الموديلات لضمان أفضل أداء وعمر أطول للجهاز.
            </p>
          </div>
        </div>
      </div>

      <!-- لماذا نحن -->
      <div class="col-lg-6 col-md-6">
        <div class="circle-wrap">
          <div class="dot"></div>
          <div class="circle-card">
            <div class="icon"><i class="bi bi-patch-check-fill"></i></div>
            <h4>لماذا متولي الكتريك؟</h4>
            <p>
              جودة مضمونة، أسعار تنافسية، خدمة عملاء مميزة، وتوفير أحدث المنتجات وقطع الغيار في مكان واحد.
            </p>
          </div>
        </div>
      </div>

      <!-- تواصل معنا -->
      <div class="col-lg-6 col-md-6">
        <div class="circle-wrap">
          <div class="dot"></div>
          <div class="circle-card">
            <div class="icon"><i class="bi bi-headset"></i></div>
            <h4>خدمة العملاء</h4>
            <p>
              فريقنا جاهز دائمًا لمساعدتك في اختيار المنتج المناسب والإجابة على جميع استفساراتك.
            </p>

            <a href="tel:+201022558536" class="btn btn-primary btn-sm mt-2">
              اتصل بنا الآن
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

</section>
<style>
    
    /* Wrapper (الدائرة الخارجية) */
.circle-wrap {
  position: relative;
  width: 350px;
  height: 350px;
  margin: auto;
  border-radius: 50%;
  padding: 10px;
  background: linear-gradient(135deg, #0d6efd, #4dabf7);
}


/* AI Rotating Half Circle */
.circle-wrap::after {
  content: "";
  position: absolute;
  width: 120%;
  height: 120%;
  border-radius: 50%;
  top: -10%;
  left: -10%;

  border: 3px solid transparent;
  border-top: 3px solid #0d6efd;
  border-right: 3px solid #4dabf7;

  animation: rotateCircle 6s linear infinite;
}

/* نقطة صغيرة */
.circle-wrap .dot {
  position: absolute;
  width: 10px;
  height: 10px;
  background: #0d6efd;
  border-radius: 50%;
  top: 10%;
  right: 10%;
  box-shadow: 0 0 10px #0d6efd;
}

/* Animation */
@keyframes rotateCircle {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/* Glow خفيف */
.circle-wrap::before {
  content: "";
  position: absolute;
  inset: -10px;
  border-radius: 50%;
  background: linear-gradient(135deg, #0d6efd, #4dabf7);
  filter: blur(25px);
  opacity: 0.3;
}

/* الدائرة الداخلية */
.circle-card {
  position: relative;
  z-index: 2;
  width: 100%;
  height: 100%;
  background: #fff;
  border-radius: 50%;
  padding: 40px 30px;
  text-align: center;

  display: flex;
  flex-direction: column;
  justify-content: center;

  box-shadow: inset 0 0 0 2px rgba(13,110,253,0.1);
}

/* أيقونة */
.circle-card .icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #0d6efd, #4dabf7);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 28px;
  margin: -70px auto 10px;
  box-shadow: 0 10px 20px rgba(13,110,253,0.4);
}

/.circle-card h4 {
  color: #0d6efd;
  margin-bottom: 12px;
  font-weight: 700;
  font-size: 20px; /* كبرناه */
}

.circle-card p {
  font-size: 15px; /* كان صغير */
  color: #444;
  line-height: 1.8;
  font-weight: 500;
}

/* Hover Animation */
.circle-wrap:hover {
  transform: scale(1.05);
  transition: 0.4s;
}

/* Responsive */
@media (max-width: 768px) {
  .circle-wrap {
    width: 280px;
    height: 280px;
  }
}
</style>

 

@endsection