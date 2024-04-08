@extends("layouts.base")
@section('content')

<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Wishlist</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section Start -->
<section class="wish-list-section section-b-space">
    <div class="container">
        @if($items->count() > 0)
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table cart-table wishlist-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
    <tr>
        <td>
            @if ($item->model)
                <a href="{{ route('shop.product.details', ['slug' => $item->model->slug]) }}">
                    <img src="{{ asset('assets/images/fashion/product/front') . '/' . $item->model->image }}" class="blur-up lazyload" alt="">
                </a>
            @endif
        </td>
        <td>
            @if ($item->model)
                <a href="{{ route('shop.product.details', ['slug' => $item->model->slug]) }}" class="font-light">{{ $item->model->name }}</a>
            @endif
            <div class="mobile-cart-content row">
                @if ($item->model)
                    <div class="col">
                        <p>In Stock</p>
                    </div>
                    <div class="col">
                        <p class="fw-bold">${{ $item->model->regular_price }}</p>
                    </div>
                @endif
            </div>
        </td>
    </tr>
@endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="javascript:void(0)">Clear All Items</a>
            </div>
        </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Your wishlist is empty ! </h2>
                    <h5 class="mt-3">Add items to it now.</h5>
                    <a href="{{route('shop.index')}}" class="btn btn-warning mt-5">Shop Now</a>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- Cart Section End -->  

@endsection
