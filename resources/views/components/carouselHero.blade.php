<!-- Hero Slider -->
<div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">

    <div class="carousel-inner">

        @foreach($sliders as $slider)

            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                <img
                    class="d-block w-100 slider-image"
                    src="{{ asset('uploads/' . $slider->image) }}"
                    alt="{{ $slider->title }}"
                >

            </div>

        @endforeach

    </div>

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>

<!-- Categories -->
<div class="container mb-5">

    <div class="text-center mb-4">
        <span class="section-title-neon">
            ⚡ أقسامنا ⚡
        </span>
    </div>

    <div class="categories-grid">

        @foreach($categories as $category)

            <a href="#" class="category-card text-decoration-none">

                <img
                    src="{{ asset('uploads/' . $category->image) }}"
                    alt="{{ $category->name }}"
                >

                <span>{{ $category->name }}</span>

            </a>

        @endforeach

    </div>

</div>

<style>

.slider-image{
    height:450px;
    object-fit:cover;
    border-radius:15px;
}

.section-title-neon{
    background:var(--accent-color);
;
    color:#fff;
    padding:12px 30px;
    border-radius:12px;
    font-size:24px;
    font-weight:700;
    box-shadow:0 0 20px rgba(7, 143, 255, 0.8);
}

.categories-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:15px;
}

.category-card{
    text-align:center;
    color:#222;
    transition:.3s;
}

.category-card img{
    width:90px;
    height:90px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid #eee;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.category-card span{
    display:block;
    margin-top:8px;
    font-size:13px;
    font-weight:600;
}

.category-card:hover{
    transform:translateY(-4px);
}

.category-card:hover img{
    border-color:#1c07ff;
}

@media (min-width:992px){
    .categories-grid{
        grid-template-columns:repeat(8,1fr);
    }
}

@media (max-width:768px){

    .slider-image{
        height:220px;
    }

    .category-card img{
        width:70px;
        height:70px;
    }

    .category-card span{
        font-size:11px;
    }
}

</style>