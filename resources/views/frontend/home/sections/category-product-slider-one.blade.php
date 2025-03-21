@php
$pincode = session('pincode');
    $products = \App\Models\Product::withAvg('reviews', 'rating')
        ->withCount('reviews')
        ->with(['variants', 'category', 'productImageGalleries'])
        ->when($pincode, function ($query) use ($pincode) {
            return $query->where('pincode', $pincode);
        })
        ->orderBy('id', 'DESC')
        ->get();
@endphp

<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>Daily Special</h3>
                    {{-- <a class="see_btn" href="{{ route('products.index') }}">See More <i class="fas fa-caret-right"></i></a> --}}
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>
