{{-- =========================================================
     HERO - متولي إلكتريك
========================================================= --}}

<section class="electric-hero" dir="rtl">

    {{-- Background Effects --}}
    <div class="hero-glow hero-glow-1"></div>
    <div class="hero-glow hero-glow-2"></div>
    <div class="hero-grid"></div>

    <div class="container">

        <div class="row align-items-center hero-row">

            {{-- =========================
                 TEXT
            ========================== --}}
            <div class="col-lg-6 order-2 order-lg-1">

                <div class="hero-content">

                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        قطع غيار أصلية وموثوقة
                    </div>

                    <h1>
                        <span>متولي</span>
                        إلكتريك
                    </h1>

                    <h2>
                        كل قطع الغيار اللي بتدور عليها
                        <strong>في مكان واحد</strong>
                    </h2>

                    <p>
                        يوجد جميع أنواع قطع غيار
                        <b>التلاجات والغسالات والخلاطات</b>
                        وغيرها من الأجهزة الكهربائية.
                    </p>

                    <div class="hero-buttons">

                        <a
                            href="{{ route('shop.category', $categories->first()->id ?? 1) }}"
                            class="hero-btn hero-btn-primary"
                        >
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                            تصفح الأقسام
                        </a>

                        <a
                            href="#productsGrid"
                            class="hero-btn hero-btn-secondary"
                        >
                            <i class="bi bi-box-seam"></i>
                            اكتشف المنتجات
                        </a>

                    </div>

                    <div class="hero-features">

                        <div class="hero-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>جودة مضمونة</span>
                        </div>

                        <div class="hero-feature">
                            <i class="bi bi-lightning-charge-fill"></i>
                            <span>أسعار مناسبة</span>
                        </div>

                        <div class="hero-feature">
                            <i class="bi bi-headset"></i>
                            <span>خدمة مميزة</span>
                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================
                 ANIMATED SCENE
            ========================== --}}
            <div class="col-lg-6 order-1 order-lg-2">

                <div class="hero-visual">

                    {{-- Big Glow --}}
                    <div class="visual-glow"></div>

                    {{-- Orbit --}}
                    <div class="orbit orbit-1"></div>
                    <div class="orbit orbit-2"></div>


                    {{-- =========================
                         FAN
                    ========================== --}}
                    <div class="fan-wrapper">

                        <div class="fan-outer">

                            <div class="fan-center">

                                <div class="fan-logo">
                                    M
                                </div>

                            </div>


                            <div class="fan-blades">

                                <div class="blade blade-1"></div>
                                <div class="blade blade-2"></div>
                                <div class="blade blade-3"></div>
                                <div class="blade blade-4"></div>

                            </div>

                        </div>

                    </div>


                    {{-- =========================
                         MOVING PARTS
                    ========================== --}}

                    <div class="spare-part part-1">
                        <i class="bi bi-gear-wide-connected"></i>
                    </div>

                    <div class="spare-part part-2">
                        <i class="bi bi-gear-fill"></i>
                    </div>

                    <div class="spare-part part-3">
                        <i class="bi bi-nut"></i>
                    </div>

                    <div class="spare-part part-4">
                        <i class="bi bi-circle-square"></i>
                    </div>

                    <div class="spare-part part-5">
                        <i class="bi bi-cpu"></i>
                    </div>


                    {{-- Floating labels --}}

                    <div class="floating-label label-1">
                        <i class="bi bi-snow"></i>
                        تلاجات
                    </div>

                    <div class="floating-label label-2">
                        <i class="bi bi-droplet-fill"></i>
                        غسالات
                    </div>

                    <div class="floating-label label-3">
                        <i class="bi bi-lightning-charge-fill"></i>
                        خلاطات
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     HERO CSS
========================================================= --}}

<style>

.electric-hero {

    position: relative;

    min-height: 650px;

    display: flex;

    align-items: center;

    overflow: hidden;

    background:
        radial-gradient(
            circle at 75% 50%,
            rgba(13,110,253,.18),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #050b14 0%,
            #081a31 50%,
            #06101e 100%
        );

}


/* =========================
   Background
========================= */

.hero-grid {

    position: absolute;

    inset: 0;

    opacity: .12;

    background-image:
        linear-gradient(
            rgba(255,255,255,.08) 1px,
            transparent 1px
        ),
        linear-gradient(
            90deg,
            rgba(255,255,255,.08) 1px,
            transparent 1px
        );

    background-size: 45px 45px;

    mask-image:
        radial-gradient(
            circle at center,
            black,
            transparent 75%
        );

}


.hero-glow {

    position: absolute;

    border-radius: 50%;

    filter: blur(20px);

    pointer-events: none;

}


.hero-glow-1 {

    width: 400px;
    height: 400px;

    right: -150px;
    top: -150px;

    background: rgba(13,110,253,.18);

}


.hero-glow-2 {

    width: 350px;
    height: 350px;

    left: -150px;
    bottom: -150px;

    background: rgba(0,180,255,.12);

}


/* =========================
   Row
========================= */

.hero-row {

    min-height: 650px;

    padding: 70px 0;

}


/* =========================
   CONTENT
========================= */

.hero-content {

    position: relative;

    z-index: 10;

    color: white;

}


.hero-badge {

    display: inline-flex;

    align-items: center;

    gap: 9px;

    padding: 9px 16px;

    margin-bottom: 22px;

    border-radius: 50px;

    background: rgba(255,255,255,.07);

    border: 1px solid rgba(255,255,255,.12);

    color: #72b4ff;

    font-size: 13px;

    font-weight: 800;

    backdrop-filter: blur(10px);

}


.badge-dot {

    width: 8px;
    height: 8px;

    border-radius: 50%;

    background: #22c55e;

    box-shadow:
        0 0 0 5px rgba(34,197,94,.12);

    animation: pulseDot 1.8s infinite;

}


@keyframes pulseDot {

    0%,100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.35);
    }

}


.hero-content h1 {

    margin: 0;

    font-size: clamp(48px, 6vw, 82px);

    line-height: 1;

    font-weight: 950;

    letter-spacing: -3px;

}


.hero-content h1 span {

    color: #4da3ff;

}


.hero-content h2 {

    margin: 25px 0 18px;

    max-width: 650px;

    font-size: clamp(25px, 3vw, 38px);

    line-height: 1.45;

    font-weight: 800;

}


.hero-content h2 strong {

    display: block;

    color: #ffc107;

}


.hero-content p {

    max-width: 620px;

    color: rgba(255,255,255,.68);

    font-size: 17px;

    line-height: 2;

    margin-bottom: 30px;

}


.hero-content p b {

    color: white;

}


/* =========================
   Buttons
========================= */

.hero-buttons {

    display: flex;

    flex-wrap: wrap;

    gap: 12px;

}


.hero-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    padding: 14px 23px;

    border-radius: 15px;

    text-decoration: none;

    font-family: Cairo, sans-serif;

    font-size: 14px;

    font-weight: 800;

    transition: .3s;

}


.hero-btn-primary {

    color: white;

    background: #0d6efd;

    box-shadow:
        0 10px 30px rgba(13,110,253,.28);

}


.hero-btn-primary:hover {

    color: white;

    transform: translateY(-4px);

    background: #0b5ed7;

}


.hero-btn-secondary {

    color: white;

    background: rgba(255,255,255,.07);

    border: 1px solid rgba(255,255,255,.15);

}


.hero-btn-secondary:hover {

    color: white;

    background: rgba(255,255,255,.13);

    transform: translateY(-4px);

}


/* =========================
   Features
========================= */

.hero-features {

    display: flex;

    flex-wrap: wrap;

    gap: 22px;

    margin-top: 35px;

}


.hero-feature {

    display: flex;

    align-items: center;

    gap: 7px;

    color: rgba(255,255,255,.65);

    font-size: 12px;

    font-weight: 700;

}


.hero-feature i {

    color: #4da3ff;

    font-size: 15px;

}


/* =====================================================
   VISUAL
===================================================== */

.hero-visual {

    position: relative;

    height: 560px;

    display: flex;

    align-items: center;

    justify-content: center;

}


/* =========================
   Glow
========================= */

.visual-glow {

    position: absolute;

    width: 390px;
    height: 390px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(13,110,253,.25),
            transparent 65%
        );

    filter: blur(5px);

}


/* =========================
   Orbit
========================= */

.orbit {

    position: absolute;

    border: 1px solid rgba(77,163,255,.13);

    border-radius: 50%;

}


.orbit-1 {

    width: 430px;
    height: 430px;

    animation: orbitRotate 18s linear infinite;

}


.orbit-2 {

    width: 510px;
    height: 510px;

    border-style: dashed;

    opacity: .5;

    animation:
        orbitRotateReverse
        25s linear infinite;

}


@keyframes orbitRotate {

    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }

}


@keyframes orbitRotateReverse {

    from {
        transform: rotate(360deg);
    }

    to {
        transform: rotate(0deg);
    }

}


/* =====================================================
   FAN
===================================================== */

.fan-wrapper {

    position: relative;

    z-index: 5;

    width: 310px;

    height: 310px;

}


.fan-outer {

    position: absolute;

    inset: 0;

    border-radius: 50%;

    background:
        radial-gradient(
            circle at 50% 45%,
            #26384e,
            #0b1727 68%
        );

    border: 10px solid #1c3047;

    box-shadow:
        0 30px 70px rgba(0,0,0,.45),
        inset 0 0 35px rgba(0,0,0,.6);

    overflow: hidden;

}


/* Fan grille */

.fan-outer::before {

    content: "";

    position: absolute;

    inset: 15px;

    border-radius: 50%;

    border: 2px solid rgba(255,255,255,.08);

    background:
        repeating-radial-gradient(
            circle,
            transparent 0,
            transparent 20px,
            rgba(255,255,255,.04) 21px,
            transparent 22px
        );

}


/* Blades */

.fan-blades {

    position: absolute;

    inset: 45px;

    animation:
        fanSpin
        1.2s
        linear
        infinite;

}


@keyframes fanSpin {

    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }

}


.blade {

    position: absolute;

    width: 85px;

    height: 135px;

    left: 50%;

    top: 50%;

    transform-origin: 50% 0;

    margin-left: -42px;

    margin-top: -10px;

    background:
        linear-gradient(
            135deg,
            #4da3ff,
            #0d6efd
        );

    border-radius:
        70% 30% 70% 25%;

    opacity: .9;

    box-shadow:
        0 0 15px rgba(13,110,253,.2);

}


/* Different rotations */

.blade-1 {
    transform: rotate(0deg);
}

.blade-2 {
    transform: rotate(90deg);
}

.blade-3 {
    transform: rotate(180deg);
}

.blade-4 {
    transform: rotate(270deg);
}


/* Center */

.fan-center {

    position: absolute;

    z-index: 10;

    left: 50%;
    top: 50%;

    width: 65px;
    height: 65px;

    transform:
        translate(-50%, -50%);

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;

    background:
        linear-gradient(
            145deg,
            #f8fafc,
            #aebdce
        );

    box-shadow:
        0 7px 20px rgba(0,0,0,.35);

}


.fan-logo {

    width: 40px;
    height: 40px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    background: #0d6efd;

    color: white;

    font-size: 19px;

    font-weight: 900;

}


/* =====================================================
   SPARE PARTS
===================================================== */

.spare-part {

    position: absolute;

    z-index: 8;

    display: flex;

    align-items: center;

    justify-content: center;

    width: 55px;
    height: 55px;

    border-radius: 17px;

    color: #63adff;

    background:
        rgba(12,29,49,.9);

    border: 1px solid rgba(77,163,255,.3);

    box-shadow:
        0 12px 25px rgba(0,0,0,.25);

    backdrop-filter: blur(8px);

}


.spare-part i {

    font-size: 25px;

}


.part-1 {

    top: 70px;
    right: 30px;

    animation:
        floating1
        4s
        ease-in-out
        infinite;

}


.part-2 {

    bottom: 85px;
    right: 20px;

    animation:
        floating2
        5s
        ease-in-out
        infinite;

}


.part-3 {

    top: 100px;
    left: 35px;

    animation:
        floating3
        4.5s
        ease-in-out
        infinite;

}


.part-4 {

    bottom: 70px;
    left: 45px;

    animation:
        floating1
        5.5s
        ease-in-out
        infinite;

}


.part-5 {

    top: 35px;
    left: 50%;

    animation:
        floating2
        4s
        ease-in-out
        infinite;

}


@keyframes floating1 {

    0%,100% {
        transform:
            translateY(0)
            rotate(0deg);
    }

    50% {
        transform:
            translateY(-18px)
            rotate(10deg);
    }

}


@keyframes floating2 {

    0%,100% {
        transform:
            translateY(0)
            rotate(0deg);
    }

    50% {
        transform:
            translateY(15px)
            rotate(-12deg);
    }

}


@keyframes floating3 {

    0%,100% {
        transform:
            translate(0,0)
            rotate(0deg);
    }

    50% {
        transform:
            translate(12px,-15px)
            rotate(15deg);
    }

}


/* =====================================================
   LABELS
===================================================== */

.floating-label {

    position: absolute;

    z-index: 12;

    display: flex;

    align-items: center;

    gap: 7px;

    padding: 9px 14px;

    border-radius: 50px;

    color: white;

    background: rgba(8,24,42,.8);

    border: 1px solid rgba(255,255,255,.1);

    backdrop-filter: blur(10px);

    font-size: 11px;

    font-weight: 800;

}


.floating-label i {

    color: #4da3ff;

}


.label-1 {

    top: 15px;
    right: 10%;

    animation:
        floating2
        4s
        ease-in-out
        infinite;

}


.label-2 {

    bottom: 20px;
    right: 12%;

    animation:
        floating1
        4.5s
        ease-in-out
        infinite;

}


.label-3 {

    top: 50%;
    left: 0;

    animation:
        floating3
        5s
        ease-in-out
        infinite;

}


/* =====================================================
   MOBILE
===================================================== */

@media(max-width:991px) {

    .electric-hero {

        min-height: auto;

    }


    .hero-row {

        padding: 50px 0 65px;

    }


    .hero-content {

        text-align: center;

    }


    .hero-content h1 {

        font-size: 55px;

    }


    .hero-content p {

        margin-left: auto;
        margin-right: auto;

    }


    .hero-buttons {

        justify-content: center;

    }


    .hero-features {

        justify-content: center;

    }


    .hero-visual {

        height: 450px;

        margin-bottom: 20px;

    }


    .fan-wrapper {

        transform: scale(.8);

    }


    .orbit-1 {

        width: 350px;
        height: 350px;

    }


    .orbit-2 {

        width: 410px;
        height: 410px;

    }

}


@media(max-width:576px) {

    .hero-row {

        padding-top: 30px;

    }


    .hero-visual {

        height: 370px;

    }


    .fan-wrapper {

        transform: scale(.62);

    }


    .orbit-1 {

        width: 290px;
        height: 290px;

    }


    .orbit-2 {

        width: 340px;
        height: 340px;

    }


    .spare-part {

        width: 43px;
        height: 43px;

        border-radius: 13px;

    }


    .spare-part i {

        font-size: 19px;

    }


    .label-1 {

        right: 0;

    }


    .label-2 {

        right: 0;

    }


    .label-3 {

        left: 0;

    }


    .hero-content h1 {

        font-size: 45px;

    }


    .hero-content h2 {

        font-size: 24px;

    }


    .hero-content p {

        font-size: 14px;

    }


    .hero-btn {

        width: 100%;

    }


    .hero-features {

        gap: 12px;

    }

}

</style>
<!-- PREMIUM CATEGORIES CAROUSEL -->
<section class="categories-premium" dir="rtl"><div class="container"><div class="categories-premium-head"><div><div class="categories-eyebrow"><i class="bi bi-stars"></i> اكتشف تشكيلتنا</div><h2>أقسام <span>متولي إلكتريك</span></h2><p>اختار القسم وشوف كل قطع الغيار المتاحة</p></div><div class="categories-controls"><button type="button" id="catPrev"><i class="bi bi-chevron-right"></i></button><div class="categories-count"><b id="catCurrent">01</b><span>/</span><span>{{ str_pad($categories->count(),2,'0',STR_PAD_LEFT) }}</span></div><button type="button" id="catNext"><i class="bi bi-chevron-left"></i></button></div></div><div class="categories-track-wrap"><div class="categories-track" id="categoriesTrack">@foreach($categories as $index=>$category)<a href="{{ route('shop.category',$category->id) }}" class="premium-cat-card"><div class="premium-cat-number">{{ str_pad($index+1,2,'0',STR_PAD_LEFT) }}</div><div class="premium-cat-image">@if($category->image)<img src="{{ asset('uploads/'.$category->image) }}" alt="{{ $category->name }}" loading="lazy">@else<i class="bi bi-box-seam"></i>@endif<div class="premium-cat-circle"></div><div class="premium-cat-open"><i class="bi bi-arrow-left"></i></div></div><div class="premium-cat-body"><h3>{{ $category->name }}</h3><div><span><i class="bi bi-grid-fill"></i> اكتشف المنتجات</span><i class="bi bi-chevron-left"></i></div></div></a>@endforeach</div></div></div></section>

<style>.categories-premium{position:relative;padding:75px 0;background:linear-gradient(180deg,#fff,#f7faff,#fff);overflow:hidden}.categories-premium:before{content:"";position:absolute;width:450px;height:450px;right:-250px;top:20px;background:rgba(13,110,253,.07);filter:blur(80px);border-radius:50%}.categories-premium-head{position:relative;display:flex;align-items:end;justify-content:space-between;margin-bottom:32px}.categories-eyebrow{display:inline-flex;align-items:center;gap:7px;color:#0d6efd;background:#edf5ff;border:1px solid #dceaff;padding:7px 14px;border-radius:50px;font-size:12px;font-weight:800;margin-bottom:10px}.categories-premium-head h2{font-size:34px;font-weight:950;color:#111827;margin:0}.categories-premium-head h2 span{color:#0d6efd}.categories-premium-head p{color:#8a94a6;font-size:13px;margin:8px 0 0}.categories-controls{display:flex;align-items:center;gap:10px}.categories-controls button{width:46px;height:46px;border:1px solid #e4eaf2;background:#fff;color:#0d6efd;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:17px;cursor:pointer;transition:.3s;box-shadow:0 7px 20px rgba(15,23,42,.06)}.categories-controls button:hover{background:#0d6efd;color:#fff;transform:translateY(-3px);box-shadow:0 12px 25px rgba(13,110,253,.22)}.categories-count{display:flex;gap:4px;align-items:center;color:#a0a8b5;font-size:12px;min-width:55px;justify-content:center}.categories-count b{color:#0d6efd;font-size:17px}.categories-track-wrap{position:relative}.categories-track{display:flex;gap:18px;overflow-x:auto;scroll-behavior:smooth;scrollbar-width:none;padding:8px 5px 25px;cursor:grab}.categories-track::-webkit-scrollbar{display:none}.categories-track:active{cursor:grabbing}.premium-cat-card{position:relative;flex:0 0 220px;overflow:hidden;background:#fff;border:1px solid #e7edf4;border-radius:24px;text-decoration:none!important;color:#172033;box-shadow:0 8px 28px rgba(15,23,42,.055);transition:.35s cubic-bezier(.2,.8,.2,1)}.premium-cat-card:hover{color:#172033;transform:translateY(-8px);border-color:#cfe2ff;box-shadow:0 22px 50px rgba(13,110,253,.15)}.premium-cat-number{position:absolute;z-index:5;top:12px;right:12px;background:rgba(255,255,255,.9);backdrop-filter:blur(8px);color:#0d6efd;border:1px solid #e3edff;border-radius:50px;padding:5px 10px;font-size:10px;font-weight:900}.premium-cat-image{height:190px;position:relative;display:flex;align-items:center;justify-content:center;overflow:hidden;background:linear-gradient(145deg,#f8fbff,#e9f2ff)}.premium-cat-image:before{content:"";position:absolute;width:170px;height:170px;border-radius:50%;background:radial-gradient(circle,#fff 0%,#e5efff 100%);box-shadow:0 15px 40px rgba(13,110,253,.08);transition:.5s}.premium-cat-card:hover .premium-cat-image:before{transform:scale(1.12)}.premium-cat-image img{position:relative;z-index:2;width:135px;height:135px;object-fit:cover;border-radius:22px;box-shadow:0 12px 30px rgba(15,23,42,.1);transition:.5s}.premium-cat-card:hover .premium-cat-image img{transform:scale(1.08) rotate(-2deg)}.premium-cat-image>i{position:relative;z-index:2;font-size:50px;color:#0d6efd}.premium-cat-open{position:absolute;z-index:4;left:12px;bottom:12px;width:35px;height:35px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:#fff;color:#0d6efd;box-shadow:0 6px 18px rgba(0,0,0,.12);opacity:0;transform:translateX(-10px);transition:.3s}.premium-cat-card:hover .premium-cat-open{opacity:1;transform:translateX(0)}.premium-cat-body{padding:16px 17px 17px}.premium-cat-body h3{font-size:16px;font-weight:900;margin:0 0 9px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.premium-cat-body>div{display:flex;align-items:center;justify-content:space-between;color:#9aa4b2;font-size:10px;font-weight:700}.premium-cat-body>div i:first-child{color:#0d6efd;margin-left:4px}.premium-cat-body>div>i{color:#0d6efd;font-size:11px}.premium-cat-card:after{content:"";position:absolute;bottom:0;right:0;width:0;height:3px;background:linear-gradient(90deg,#0d6efd,#00b7ff);transition:.4s}.premium-cat-card:hover:after{width:100%}@media(max-width:991px){.categories-premium{padding:55px 0}.categories-premium-head h2{font-size:29px}.premium-cat-card{flex-basis:200px}.premium-cat-image{height:175px}.premium-cat-image img{width:120px;height:120px}.premium-cat-image:before{width:155px;height:155px}}@media(max-width:576px){.categories-premium{padding:45px 0}.categories-premium-head{display:block;text-align:center}.categories-premium-head h2{font-size:25px}.categories-premium-head p{font-size:11px}.categories-controls{justify-content:center;margin-top:18px}.categories-controls button{width:40px;height:40px}.premium-cat-card{flex-basis:170px;border-radius:19px}.premium-cat-image{height:150px}.premium-cat-image img{width:105px;height:105px;border-radius:18px}.premium-cat-image:before{width:135px;height:135px}.premium-cat-body{padding:13px}.premium-cat-body h3{font-size:13px}.premium-cat-body>div{font-size:9px}.premium-cat-number{top:9px;right:9px;font-size:9px}.premium-cat-open{display:none}}</style>

<script>document.addEventListener('DOMContentLoaded',()=>{const t=document.getElementById('categoriesTrack'),n=document.getElementById('catNext'),p=document.getElementById('catPrev'),c=document.getElementById('catCurrent');if(!t)return;const cards=t.querySelectorAll('.premium-cat-card');const step=()=>cards[0]?cards[0].offsetWidth+18:240;n?.addEventListener('click',()=>t.scrollBy({left:-step()*2,behavior:'smooth'}));p?.addEventListener('click',()=>t.scrollBy({left:step()*2,behavior:'smooth'}));t.addEventListener('scroll',()=>{let x=Math.round(Math.abs(t.scrollLeft)/step())+1;if(c)c.textContent=String(Math.min(x,cards.length)).padStart(2,'0')},{passive:true});let down=false,start=0,scroll=0;t.addEventListener('mousedown',e=>{down=true;start=e.pageX;scroll=t.scrollLeft});window.addEventListener('mouseup',()=>down=false);t.addEventListener('mousemove',e=>{if(!down)return;e.preventDefault();t.scrollLeft=scroll-(e.pageX-start)*1.4})});</script>