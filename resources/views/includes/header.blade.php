<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm" dir="rtl">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-primary fs-3" href="{{ route('home') }}">
            <i class="bi bi-lightning-charge-fill ms-2"></i>
            متولي الكتريك
        </a>

        <!-- Mobile -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav mx-auto align-items-lg-center gap-lg-2">

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
                       href="#"
                       data-bs-toggle="dropdown">

                        الخدمات

                    </a>

                    <ul class="dropdown-menu text-end">

                        @foreach($services ?? [] as $service)

                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('services.show',$service->slug) }}">

                                    {{ $service->title }}

                                </a>

                            </li>

                        @endforeach

                    </ul>

                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}"
                       href="{{ route('shop.index') }}">
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

            <button class="btn cart-btn position-relative"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#cartOffcanvas">

                <i class="bi bi-cart3"></i>

              <span id="cart-badge"
      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger {{ $cartCount ? '' : 'd-none' }}">

    {{ $cartCount }}

</span>

            </button>

        </div>

    </div>
</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas">

    <div class="offcanvas-header">

        <h5 class="offcanvas-title">

            <i class="bi bi-cart3 ms-2"></i>

            سلة المشتريات

        </h5>

        <button class="btn-close"
                data-bs-dismiss="offcanvas">
        </button>

    </div>

  <div class="offcanvas-body">

    <div id="cart-items">

        @include('shop.partials.mini-cart')

    </div>

</div>

    <div class="border-top p-3">

        <div class="d-flex justify-content-between mb-3">

            <strong>الإجمالي</strong>

            <strong id="cart-total">
{{ number_format($cartTotal,2) }} ج.م
            </strong>

        </div>

        <a href="{{ route('checkout.index') }}"
class="btn btn-primary w-100 rounded-pill py-2">
            متابعة الدفع

        </a>

    </div>

</div>
<style>
    .navbar{
    background:#fff!important;
    padding:12px 0;
    box-shadow:0 5px 20px rgba(0,0,0,.06);
}
/* =========================
   Cart Item
========================= */

.cart-item{
    display:flex;
    align-items:center;
    gap:15px;
    padding:15px;
    border-bottom:1px solid #eee;
}

.cart-item:last-child{
    border-bottom:none;
}

.cart-item img{
    width:80px;
    height:80px;
    min-width:80px;
    object-fit:cover;
    border-radius:12px;
    border:1px solid #eee;
    background:#fff;
}

.cart-item-info{
    flex:1;
}

.cart-item-title{
    font-size:15px;
    font-weight:700;
    margin-bottom:6px;
    color:#222;
    line-height:1.5;
}

.cart-price{
    color:#0d6efd;
    font-size:17px;
    font-weight:700;
    margin-bottom:4px;
}
.navbar-brand{
    font-weight:800;
}

.navbar-nav{
    gap:8px;
}

.nav-link{
    color:#444!important;
    font-weight:600;
    padding:10px 18px!important;
    border-radius:8px;
    transition:.3s;
}

.nav-link:hover,
.nav-link.active{
    background:#0d6efd;
    color:#fff!important;
}

.dropdown-menu{
    border:none;
    border-radius:15px;
    padding:8px;
    box-shadow:0 15px 40px rgba(0,0,0,.12);
}

.dropdown-item{
    padding:10px 15px;
    border-radius:8px;
}

.dropdown-item:hover{
    background:#0d6efd;
    color:#fff;
}

.cart-btn{
    width:50px;
    height:50px;
    border:none;
    border-radius:12px;
    background:#0d6efd;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
}

.cart-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(13,110,253,.35);
}

.offcanvas{
    width:380px;
}

@media(max-width:991px){

    .navbar-nav{

        padding:20px 0;

    }

    .cart-btn{

        margin-top:15px;
        width:100%;

    }

}

</style>