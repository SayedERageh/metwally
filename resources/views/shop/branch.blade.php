@extends('layouts.app')

@section('title', $branch->name . ' | ' . $category->name)

@section('content')

<div class="branch-page" dir="rtl">

    <section class="branch-header">

        <div class="container">

            <div class="breadcrumb">

                <a href="{{ route('shop.index') }}">
                    المتجر
                </a>

                <i class="bi bi-chevron-left"></i>

                <a href="{{ route('shop.category',$category->id) }}">
                    {{ $category->name }}
                </a>

                <i class="bi bi-chevron-left"></i>

                <span>
                    {{ $branch->name }}
                </span>

            </div>


            <div class="branch-title">

                <div>

                    <span>
                        {{ $category->name }}
                    </span>

                    <h1>
                        {{ $branch->name }}
                    </h1>

                    @if($branch->description)

                        <p>
                            {{ $branch->description }}
                        </p>

                    @endif

                </div>


                <div class="branch-total">

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


    <section class="branch-products">

        <div class="container">

            <div class="branch-toolbar">

                <div>

                    <h2>
                        منتجات الفرع
                    </h2>

                    <span>
                        اختر المنتج المناسب لك
                    </span>

                </div>

                <a
                    href="{{ route(
                        'shop.category',
                        $category->id
                    ) }}"
                    class="btn btn-outline-primary rounded-pill px-4">

                    <i class="bi bi-arrow-right"></i>

                    كل فروع القسم

                </a>

            </div>


            <div class="row g-4">

                @forelse($products as $product)

                    @include(
                        'shop.partials.product-card'
                    )

                @empty

                    <div class="col-12">

                        <div class="empty-branch">

                            <i class="bi bi-box-seam"></i>

                            <h4>
                                لا توجد منتجات في هذا الفرع حاليًا
                            </h4>

                            <a
                                href="{{ route(
                                    'shop.category',
                                    $category->id
                                ) }}"
                                class="btn btn-primary rounded-pill">

                                العودة إلى القسم

                            </a>

                        </div>

                    </div>

                @endforelse

            </div>


            <div class="branch-pagination">

                {{ $products->links() }}

            </div>

        </div>

    </section>

</div>


<style>

.branch-page {

    background:#f7f9fc;

    min-height:100vh;

}

.branch-header {

    padding:50px 0 65px;

    background:
        radial-gradient(
            circle at 80% 20%,
            rgba(13,110,253,.17),
            transparent 35%
        ),
        #07111f;

    color:#fff;

}

.breadcrumb {

    display:flex;

    align-items:center;

    gap:10px;

    font-size:13px;

    margin-bottom:35px;

}

.breadcrumb a {

    color:#74adff;

    text-decoration:none;

}

.breadcrumb i {

    color:#8795a8;

}

.branch-title {

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:30px;

}

.branch-title > div:first-child > span {

    color:#70aaff;

    font-size:14px;

    font-weight:700;

}

.branch-title h1 {

    font-size:50px;

    font-weight:900;

    margin:10px 0;

}

.branch-title p {

    color:rgba(255,255,255,.7);

    max-width:650px;

}

.branch-total {

    width:130px;

    height:130px;

    border-radius:30px;

    background:rgba(255,255,255,.08);

    border:1px solid rgba(255,255,255,.1);

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

}

.branch-total strong {

    font-size:35px;

}

.branch-total span {

    color:#aab5c5;

}

.branch-products {

    padding:65px 0 90px;

}

.branch-toolbar {

    display:flex;

    align-items:center;

    justify-content:space-between;

    margin-bottom:30px;

}

.branch-toolbar h2 {

    font-weight:900;

    margin-bottom:5px;

}

.branch-toolbar span {

    color:#777;

    font-size:14px;

}

.empty-branch {

    text-align:center;

    background:#fff;

    border-radius:25px;

    padding:80px 20px;

}

.empty-branch i {

    font-size:60px;

    color:#bcc6d4;

}

.empty-branch h4 {

    font-weight:800;

    margin:20px 0;

}

.branch-pagination {

    display:flex;

    justify-content:center;

    margin-top:45px;

}

@media(max-width:768px) {

    .branch-title {

        flex-direction:column;

        align-items:flex-start;

    }

    .branch-title h1 {

        font-size:38px;

    }

    .branch-total {

        width:100px;

        height:100px;

    }

    .branch-toolbar {

        flex-direction:column;

        align-items:flex-start;

        gap:20px;

    }

}

</style>

@endsection