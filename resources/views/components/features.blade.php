{{-- =========================================================
    الأقسام والفروع
========================================================= --}}

<section class="shop-directory py-5" dir="rtl">

    <div class="container">

        {{-- العنوان --}}
        <div class="directory-heading text-center mb-5">

            <span class="directory-badge">
                <i class="bi bi-grid-3x3-gap"></i>
                أقسام المتجر
            </span>

            <h2>
                اختر القسم المناسب لك
            </h2>

            <p>
                تصفح أقسام المتجر والفروع المختلفة واكتشف المنتجات بسهولة
            </p>

        </div>


        {{-- الأقسام --}}
        <div class="row g-4">

            @forelse($categories as $category)

                <div class="col-xl-4 col-lg-6">

                    <div class="directory-card">

                        {{-- Header القسم --}}
                        <div class="directory-card-header">

                            <div class="directory-title">

                                <div class="directory-icon">
                                    <i class="bi bi-lightning-charge"></i>
                                </div>

                                <div>

                                    <h3>
                                        {{ $category->name }}
                                    </h3>

                                    <span>
                                        {{ $category->products_count ?? 0 }}
                                        منتج
                                    </span>

                                </div>

                            </div>


                            {{-- فتح القسم --}}
                            <a
                                href="{{ route('shop.category', $category->id) }}"
                                class="directory-arrow"
                                title="عرض القسم">

                                <i class="bi bi-arrow-left"></i>

                            </a>

                        </div>


                        {{-- الفروع --}}
                        @if($category->branches->count())

                            <div class="directory-branches">

                                <div class="branches-title">

                                    <span>
                                        الفروع
                                    </span>

                                    <span class="branches-count">
                                        {{ $category->branches->count() }}
                                    </span>

                                </div>


                                <div class="branches-list">

                                    @foreach($category->branches as $branch)

                                        <a
                                            href="{{ route(
                                                'shop.branch',
                                                [
                                                    'category' => $category->id,
                                                    'branch' => $branch->id
                                                ]
                                            ) }}"
                                            class="branch-item">

                                            <span class="branch-name">

                                                <i class="bi bi-chevron-left"></i>

                                                {{ $branch->name }}

                                            </span>

                                            <i class="bi bi-arrow-left branch-arrow"></i>

                                        </a>

                                    @endforeach

                                </div>

                            </div>

                        @else

                            <div class="no-branches">

                                <i class="bi bi-info-circle"></i>

                                لا توجد فروع لهذا القسم حالياً

                            </div>

                        @endif


                        {{-- زر القسم --}}
                        <div class="directory-footer">

                            <a
                                href="{{ route('shop.category', $category->id) }}"
                                class="view-category">

                                عرض جميع منتجات القسم

                                <i class="bi bi-arrow-left"></i>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="directory-empty text-center">

                        <i class="bi bi-grid"></i>

                        <h4>
                            لا توجد أقسام حالياً
                        </h4>

                        <p>
                            سيتم إضافة الأقسام قريباً.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

<style>
    /* =========================================================
   Shop Directory
========================================================= */

.shop-directory{
    background:#f8fafc;
}

.directory-heading{
    max-width:700px;
    margin-left:auto;
    margin-right:auto;
}

.directory-badge{
    display:inline-flex;
    align-items:center;
    gap:7px;

    padding:8px 18px;

    border-radius:50px;

    background:rgba(13,110,253,.08);
    color:#0d6efd;

    font-size:14px;
    font-weight:800;
}

.directory-heading h2{
    margin-top:15px;
    margin-bottom:10px;

    color:#172033;

    font-size:34px;
    font-weight:900;
}

.directory-heading p{
    margin:0;

    color:#7b8494;

    font-size:15px;
}


/* Card */

.directory-card{
    height:100%;

    background:#fff;

    border:1px solid #edf0f5;

    border-radius:22px;

    overflow:hidden;

    box-shadow:0 8px 30px rgba(15,23,42,.05);

    transition:.35s ease;
}

.directory-card:hover{
    transform:translateY(-6px);

    box-shadow:0 20px 45px rgba(15,23,42,.11);
}


/* Header */

.directory-card-header{
    display:flex;

    align-items:center;
    justify-content:space-between;

    gap:15px;

    padding:22px;

    border-bottom:1px solid #f0f2f5;
}

.directory-title{
    display:flex;

    align-items:center;

    gap:14px;
}

.directory-icon{
    width:52px;
    height:52px;

    flex-shrink:0;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:15px;

    background:#eef4ff;

    color:#0d6efd;

    font-size:24px;
}

.directory-title h3{
    margin:0 0 5px;

    color:#172033;

    font-size:19px;
    font-weight:900;
}

.directory-title span{
    color:#8a94a6;

    font-size:12px;
    font-weight:600;
}


/* Arrow */

.directory-arrow{
    width:42px;
    height:42px;

    flex-shrink:0;

    display:flex;

    align-items:center;
    justify-content:center;

    border-radius:50%;

    background:#f0f5ff;

    color:#0d6efd;

    text-decoration:none;

    transition:.3s ease;
}

.directory-arrow:hover{
    background:#0d6efd;

    color:#fff;

    transform:translateX(-4px);
}


/* Branches */

.directory-branches{
    padding:18px 22px;
}

.branches-title{
    display:flex;

    align-items:center;

    gap:8px;

    margin-bottom:12px;

    color:#172033;

    font-size:13px;
    font-weight:800;
}

.branches-count{
    min-width:24px;
    height:24px;

    display:flex;

    align-items:center;
    justify-content:center;

    padding:0 6px;

    border-radius:7px;

    background:#f1f5f9;

    color:#64748b;

    font-size:11px;
}


/* Branch item */

.branches-list{
    display:flex;

    flex-direction:column;

    gap:8px;
}

.branch-item{
    display:flex;

    align-items:center;
    justify-content:space-between;

    padding:12px 13px;

    border-radius:11px;

    background:#f8fafc;

    color:#4b5563;

    text-decoration:none;

    border:1px solid transparent;

    transition:.3s ease;
}

.branch-name{
    display:flex;

    align-items:center;

    gap:8px;

    font-size:13px;
    font-weight:700;
}

.branch-name i{
    color:#0d6efd;

    font-size:10px;
}

.branch-arrow{
    color:#9aa4b2;

    font-size:12px;

    transition:.3s ease;
}

.branch-item:hover{
    background:#eef4ff;

    color:#0d6efd;

    border-color:#dbe7ff;
}

.branch-item:hover .branch-arrow{
    color:#0d6efd;

    transform:translateX(-4px);
}


/* No branches */

.no-branches{
    margin:18px 22px;

    padding:15px;

    border-radius:12px;

    background:#f8fafc;

    color:#8a94a6;

    font-size:13px;
    font-weight:600;

    text-align:center;
}

.no-branches i{
    margin-left:5px;
}


/* Footer */

.directory-footer{
    padding:0 22px 22px;
}

.view-category{
    display:flex;

    align-items:center;
    justify-content:center;

    gap:8px;

    width:100%;

    padding:13px;

    border-radius:12px;

    background:#0d6efd;

    color:#fff;

    text-decoration:none;

    font-size:13px;
    font-weight:800;

    transition:.3s ease;
}

.view-category:hover{
    background:#0b5ed7;

    color:#fff;

    transform:translateY(-2px);
}

.view-category i{
    transition:.3s ease;
}

.view-category:hover i{
    transform:translateX(-4px);
}


/* Empty */

.directory-empty{
    padding:70px 20px;

    background:#fff;

    border-radius:20px;

    border:1px solid #edf0f5;
}

.directory-empty > i{
    font-size:55px;

    color:#cbd5e1;
}

.directory-empty h4{
    margin-top:20px;

    color:#172033;

    font-weight:800;
}

.directory-empty p{
    color:#8a94a6;
}


/* Mobile */

@media(max-width:767px){

    .directory-heading h2{
        font-size:27px;
    }

    .directory-card-header{
        padding:18px;
    }

    .directory-branches{
        padding:15px 18px;
    }

    .directory-footer{
        padding:0 18px 18px;
    }

}
</style>