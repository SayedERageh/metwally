<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3" dir="rtl">

    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3 text-primary " href="/">
            <i class="fas fa-bolt me-2"></i>
            متولي الكتريك
        </a>

        <!-- Mobile -->
        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav mx-auto align-items-lg-center">

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
           href="{{ route('home') }}">
            الرئيسية
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
           href="{{ route('about') }}">
            من نحن
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ request()->routeIs('services.*') ? 'active' : '' }}"
           href="{{ route('services.index') }}"
           data-bs-toggle="dropdown">
            الخدمات
        </a>

        <ul class="dropdown-menu text-end">

            @foreach($services ?? [] as $service)
                <li>
                    <a class="dropdown-item"
                       href="{{ route('services.show', $service->slug) }}">
                        {{ $service->title }}
                    </a>
                </li>
            @endforeach

        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}"
           href="{{ route('products') }}">
            المنتجات
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
           href="{{ route('posts.index') }}">
            المقالات
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
           href="{{ route('contact') }}">
            تواصل معنا
        </a>
    </li>

</ul>

            <!-- Cart -->
            <div class="d-flex align-items-center">

                <button
                    class="btn cart-btn position-relative"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#cartOffcanvas">

                    <i class="fas fa-shopping-cart"></i>

                    <span id="cart-badge"
                          class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                          style="display:none;">
                        0
                    </span>

                </button>

            </div>

        </div>

    </div>

</nav>
<style>
    .navbar{
    backdrop-filter: blur(10px);
}

.navbar-brand{
    letter-spacing:.5px;
}

.nav-link{
    color:#333 !important;
    font-weight:600;
    padding:.7rem 1rem !important;
    border-radius:10px;
    transition:.3s;
}

.nav-link:hover,
.nav-link.active{
    color:#ffffff !important;
    background:#1e7bd8;
}

.cart-btn{
    width:50px;
    height:50px;
    border:none;
    border-radius:14px;
    background:#078bff;
    color:#222;
    font-size:20px;
    transition:.3s;
}

.cart-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(7, 181, 255, 0.35);
}

.offcanvas{
    width:380px !important;
}

.offcanvas-header{
    background:#fff;
}

.offcanvas-title{
    font-weight:700;
}
</style>