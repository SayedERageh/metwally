@extends('layouts.app')

@section('title', 'متجر متولي إلكتريك')

@section('content')

<div class="shop-page" dir="rtl">

    {{-- ================= HERO ================= --}}
    <section class="shop-hero">

        <div class="container">

            <div class="shop-hero-content">

                <span class="shop-eyebrow">
                    <i class="bi bi-lightning-charge-fill"></i>
                    متولي إلكتريك
                </span>

                <h1>
                    كل احتياجاتك الكهربائية
                    <span>في مكان واحد</span>
                </h1>

                <p>
                    اكتشف مجموعة واسعة من المنتجات الكهربائية
                    والأدوات والمستلزمات بأفضل الأسعار.
                </p>

                <div class="shop-search">

                    <i class="bi bi-search"></i>

                    <input
                        type="search"
                        id="productSearch"
                        placeholder="ابحث عن منتج..."
                    >

                </div>

            </div>

        </div>

    </section>


    {{-- ================= CATEGORIES ================= --}}
    <section class="categories-section">

        <div class="container">

            <div class="section-heading">

                <div>

                    <span>
                        تصفح المتجر
                    </span>

                    <h2>
                        الأقسام
                    </h2>

                </div>

            </div>


            <div class="categories-scroll">

                <button
                    class="category-pill active"
                    data-category="all">

                    <i class="bi bi-grid"></i>

                    كل المنتجات

                </button>


                @foreach($categories ?? [] as $category)

          <a
    href="{{ route('shop.category', $category->id) }}"
    class="category-pill text-decoration-none">

    <i class="bi bi-lightning-charge"></i>

    {{ $category->name }}

</a>


                @endforeach

            </div>

        </div>

    </section>


    {{-- ================= SHOP ================= --}}
    <section class="products-section">

        <div class="container">

            <div class="shop-toolbar">

                <div>

                    <h3>
                        المنتجات
                    </h3>

                    <span>
                        اكتشف منتجاتنا المميزة
                    </span>

                </div>


                <div class="sort-box">

                    <select id="productSort">

                        <option value="latest">
                            الأحدث
                        </option>

                        <option value="price_low">
                            السعر: الأقل
                        </option>

                        <option value="price_high">
                            السعر: الأعلى
                        </option>

                        <option value="name">
                            الاسم
                        </option>

                    </select>

                </div>

            </div>


            <div
                class="row g-4"
                id="productsGrid">

                @forelse($products as $product)

                    @include('shop.partials.product-card')

                @empty

                    <div class="col-12">

                        <div class="empty-products">

                            <i class="bi bi-box-seam"></i>

                            <h4>
                                لا توجد منتجات
                            </h4>

                            <p>
                                لم يتم إضافة منتجات إلى المتجر بعد.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>


            @if($products->hasPages())

                <div class="shop-pagination">

                    {{ $products->links() }}

                </div>

            @endif

        </div>

    </section>

</div>


<style>

/* =========================
   SHOP
========================= */

.shop-page {
    background: #f7f9fc;
    min-height: 100vh;
}


/* =========================
   HERO
========================= */

.shop-hero {

    position: relative;

    padding: 90px 0 100px;

    background:
        radial-gradient(
            circle at 85% 20%,
            rgba(13,110,253,.18),
            transparent 35%
        ),
        linear-gradient(
            135deg,
            #07111f,
            #0b1d35
        );

    overflow: hidden;

}

.shop-hero:before {

    content: "";

    position: absolute;

    width: 400px;
    height: 400px;

    background: rgba(13,110,253,.15);

    border-radius: 50%;

    left: -150px;
    bottom: -200px;

    filter: blur(10px);

}

.shop-hero-content {

    position: relative;

    max-width: 760px;

}

.shop-eyebrow {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 8px 15px;

    border-radius: 50px;

    background: rgba(255,255,255,.08);

    border: 1px solid rgba(255,255,255,.12);

    color: #7db4ff;

    font-size: 14px;

    font-weight: 700;

    margin-bottom: 20px;

}


.shop-hero h1 {

    color: #fff;

    font-size: clamp(38px, 5vw, 64px);

    font-weight: 900;

    line-height: 1.15;

    margin-bottom: 20px;

}

.shop-hero h1 span {

    color: #4d9aff;

}

.shop-hero p {

    color: rgba(255,255,255,.72);

    font-size: 18px;

    line-height: 1.9;

    max-width: 650px;

    margin-bottom: 30px;

}


/* =========================
   SEARCH
========================= */

.shop-search {

    position: relative;

    max-width: 650px;

}

.shop-search i {

    position: absolute;

    right: 20px;

    top: 50%;

    transform: translateY(-50%);

    color: #777;

    font-size: 20px;

}

.shop-search input {

    width: 100%;

    height: 64px;

    border: none;

    outline: none;

    border-radius: 18px;

    padding: 0 55px 0 20px;

    font-family: Cairo, sans-serif;

    font-size: 15px;

    box-shadow: 0 15px 40px rgba(0,0,0,.15);

}


/* =========================
   CATEGORIES
========================= */

.categories-section {

    padding: 50px 0 20px;

    background: #fff;

}

.section-heading {

    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 25px;

}

.section-heading span {

    color: #0d6efd;

    font-size: 14px;

    font-weight: 700;

}

.section-heading h2 {

    margin: 5px 0 0;

    font-size: 30px;

    font-weight: 900;

}

.categories-scroll {

    display: flex;

    gap: 10px;

    overflow-x: auto;

    padding-bottom: 10px;

    scrollbar-width: none;

}

.categories-scroll::-webkit-scrollbar {

    display: none;

}

.category-pill {

    border: 1px solid #e5e9f0;

    background: #fff;

    color: #333;

    padding: 12px 20px;

    border-radius: 50px;

    white-space: nowrap;

    font-family: Cairo, sans-serif;

    font-weight: 700;

    transition: .3s;

}

.category-pill i {

    margin-left: 6px;

}

.category-pill:hover {

    border-color: #0d6efd;

    color: #0d6efd;

}

.category-pill.active {

    background: #0d6efd;

    border-color: #0d6efd;

    color: #fff;

    box-shadow: 0 8px 20px rgba(13,110,253,.25);

}


/* =========================
   PRODUCTS
========================= */

.products-section {

    padding: 45px 0 80px;

}

.shop-toolbar {

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 30px;

}

.shop-toolbar h3 {

    font-weight: 900;

    margin: 0 0 5px;

}

.shop-toolbar span {

    color: #777;

    font-size: 14px;

}

.sort-box select {

    border: 1px solid #e2e7ef;

    background: #fff;

    border-radius: 12px;

    padding: 10px 35px 10px 15px;

    font-family: Cairo, sans-serif;

    outline: none;

}


/* =========================
   EMPTY
========================= */

.empty-products {

    text-align: center;

    background: #fff;

    padding: 70px 20px;

    border-radius: 25px;

}

.empty-products i {

    font-size: 60px;

    color: #b7c1d1;

}

.empty-products h4 {

    margin-top: 20px;

    font-weight: 800;

}

.empty-products p {

    color: #888;

}


/* =========================
   PAGINATION
========================= */

.shop-pagination {

    display: flex;

    justify-content: center;

    margin-top: 50px;

}


/* =========================
   MOBILE
========================= */

@media(max-width:768px) {

    .shop-hero {

        padding: 60px 0 70px;

    }

    .shop-hero h1 {

        font-size: 38px;

    }

    .shop-hero p {

        font-size: 15px;

    }

    .shop-toolbar {

        align-items: flex-start;

        gap: 15px;

        flex-direction: column;

    }

    .sort-box {

        width: 100%;

    }

    .sort-box select {

        width: 100%;

    }

}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const search = document.getElementById('productSearch');

    const products = document.querySelectorAll('#productsGrid .product-item');

    const categories = document.querySelectorAll('.category-pill');


    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    search?.addEventListener('input', function () {

        const value = this.value.toLowerCase().trim();

        products.forEach(product => {

            const name =
                product.dataset.name?.toLowerCase() || '';

            if(name.includes(value)) {

                product.style.display = '';

            } else {

                product.style.display = 'none';

            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    categories.forEach(button => {

        button.addEventListener('click', function () {

            categories.forEach(btn =>
                btn.classList.remove('active')
            );

            this.classList.add('active');

            const category = this.dataset.category;

            products.forEach(product => {

                if(
                    category === 'all' ||
                    product.dataset.category === category
                ) {

                    product.style.display = '';

                } else {

                    product.style.display = 'none';

                }

            });

        });

    });

});

</script>

@endsection