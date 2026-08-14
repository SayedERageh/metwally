@extends('layouts.app')

@section('title', $category->name . ' | متولي إلكتريك')

@section('content')

<div class="category-page" dir="rtl">

    {{-- Hero --}}

    <section class="category-hero">

        <div class="container">

            <div class="category-breadcrumb">

                <a href="{{ route('shop.index') }}">
                    المتجر
                </a>

                <i class="bi bi-chevron-left"></i>

                <span>
                    {{ $category->name }}
                </span>

            </div>


            <div class="category-hero-content">

                <div>

                    <span class="category-label">
                        قسم المنتجات
                    </span>

                    <h1>
                        {{ $category->name }}
                    </h1>

                    @if($category->description)

                        <p>
                            {{ $category->description }}
                        </p>

                    @endif

                </div>


                <div class="category-count">

                    <strong>
                        {{ $products->total() }}
                    </strong>

                    <span>
                        منتج
                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- Branches --}}

    <section class="branches-section">

        <div class="container">

            <div class="section-title">

                <span>
                    اختر الفرع
                </span>

                <h2>
                    فروع {{ $category->name }}
                </h2>

            </div>


            <div class="row g-4">

                @forelse($category->branches as $branch)

                    <div class="col-lg-4 col-md-6">

                        <a
                            href="{{ route(
                                'shop.branch',
                                [
                                    'category' => $category->id,
                                    'branch' => $branch->id
                                ]
                            ) }}"
                            class="branch-card"
                        >

                            <div class="branch-icon">

                                <i class="bi bi-shop"></i>

                            </div>


                            <div class="branch-content">

                                <h3>
                                    {{ $branch->name }}
                                </h3>

                                @if($branch->description)

                                    <p>
                                        {{ $branch->description }}
                                    </p>

                                @endif

                                <span class="branch-link">

                                    تصفح المنتجات

                                    <i class="bi bi-arrow-left"></i>

                                </span>

                            </div>


                            <i class="bi bi-arrow-up-left branch-arrow"></i>

                        </a>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="empty-box">

                            <i class="bi bi-shop"></i>

                            <h4>
                                لا توجد فروع
                            </h4>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- Products --}}

    <section class="category-products">

        <div class="container">

            <div class="products-heading">

                <div>

                    <span>
                        جميع المنتجات
                    </span>

                    <h2>
                        منتجات {{ $category->name }}
                    </h2>

                </div>

                <a
                    href="{{ route('shop.index') }}"
                    class="back-shop">

                    <i class="bi bi-arrow-right"></i>

                    كل المنتجات

                </a>

            </div>


            <div class="row g-4">

                @forelse($products as $product)

                    @include(
                        'shop.partials.product-card'
                    )

                @empty

                    <div class="col-12">

                        <div class="empty-box">

                            <i class="bi bi-box-seam"></i>

                            <h4>
                                لا توجد منتجات في هذا القسم
                            </h4>

                        </div>

                    </div>

                @endforelse

            </div>


            <div class="category-pagination">

                {{ $products->links() }}

            </div>

        </div>

    </section>

</div>


<style>

.category-page {
    background:#f7f9fc;
}


/* Hero */

.category-hero {

    padding:55px 0 65px;

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

    color:#fff;

}

.category-breadcrumb {

    display:flex;

    align-items:center;

    gap:10px;

    margin-bottom:35px;

    font-size:14px;

}

.category-breadcrumb a {

    color:#7db4ff;

    text-decoration:none;

}

.category-breadcrumb i {

    color:#8c9bad;

}

.category-breadcrumb span {

    color:#fff;

}

.category-hero-content {

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:30px;

}

.category-label {

    color:#66a7ff;

    font-weight:700;

    font-size:14px;

}

.category-hero h1 {

    font-size:52px;

    font-weight:900;

    margin:10px 0;

}

.category-hero p {

    color:rgba(255,255,255,.7);

    max-width:650px;

    line-height:1.9;

}

.category-count {

    width:130px;

    height:130px;

    border-radius:30px;

    background:rgba(255,255,255,.08);

    border:1px solid rgba(255,255,255,.12);

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

}

.category-count strong {

    font-size:35px;

}

.category-count span {

    color:#9eacbd;

}


/* Branches */

.branches-section {

    padding:65px 0;

    background:#fff;

}

.section-title {

    margin-bottom:30px;

}

.section-title span {

    color:#0d6efd;

    font-size:14px;

    font-weight:700;

}

.section-title h2 {

    font-weight:900;

    margin-top:7px;

}


.branch-card {

    position:relative;

    display:flex;

    align-items:center;

    gap:20px;

    padding:25px;

    min-height:170px;

    background:#fff;

    border:1px solid #e8edf4;

    border-radius:24px;

    text-decoration:none;

    color:#172033;

    overflow:hidden;

    transition:.35s;

}

.branch-card:hover {

    transform:translateY(-7px);

    border-color:#0d6efd;

    box-shadow:0 20px 45px rgba(20,40,80,.1);

    color:#172033;

}

.branch-icon {

    min-width:65px;

    height:65px;

    border-radius:18px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:#eef5ff;

    color:#0d6efd;

    font-size:28px;

}

.branch-content {

    flex:1;

}

.branch-content h3 {

    font-size:19px;

    font-weight:900;

    margin-bottom:7px;

}

.branch-content p {

    color:#777;

    font-size:13px;

    margin-bottom:12px;

}

.branch-link {

    color:#0d6efd;

    font-size:13px;

    font-weight:800;

}

.branch-link i {

    margin-right:5px;

}

.branch-arrow {

    position:absolute;

    left:20px;

    top:20px;

    color:#d8e0eb;

    font-size:20px;

}


/* Products */

.category-products {

    padding:70px 0;

}

.products-heading {

    display:flex;

    justify-content:space-between;

    align-items:end;

    margin-bottom:30px;

}

.products-heading span {

    color:#0d6efd;

    font-size:14px;

    font-weight:700;

}

.products-heading h2 {

    font-weight:900;

    margin-top:5px;

}

.back-shop {

    color:#0d6efd;

    font-weight:700;

    text-decoration:none;

}


/* Empty */

.empty-box {

    text-align:center;

    padding:60px;

    background:#fff;

    border-radius:25px;

}

.empty-box i {

    font-size:50px;

    color:#b8c3d3;

}

.empty-box h4 {

    margin-top:15px;

    font-weight:800;

}


/* Pagination */

.category-pagination {

    display:flex;

    justify-content:center;

    margin-top:45px;

}


@media(max-width:768px) {

    .category-hero h1 {

        font-size:38px;

    }

    .category-hero-content {

        flex-direction:column;

        align-items:flex-start;

    }

    .category-count {

        width:100px;

        height:100px;

    }

    .products-heading {

        align-items:flex-start;

        flex-direction:column;

        gap:15px;

    }

}

</style>

@endsection