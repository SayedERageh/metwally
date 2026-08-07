@extends('layouts.app')

@section('content')

<div class="container py-5 text-center">

    <h2 class="text-success">
        ✅ تم إرسال طلبك بنجاح
    </h2>

    <p class="mt-3">
        رقم الطلب:
        <strong>{{ $order->order_number }}</strong>
    </p>

    <a href="{{ url('/') }}" class="btn btn-primary mt-3">
        العودة للرئيسية
    </a>

</div>

@endsection