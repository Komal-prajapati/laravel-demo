<div class="packages">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage text_align_center ">
                    <h2>World Place Packages</h2>
                </div>
            </div>
        </div>

        @if (request()->routeIs('pages.packages'))
            <div class="button-group filter-button-group mb-4 text-center">
                <button class="btn btn-sm btn-success" data-filter="*">Show all</button>
                @foreach (\App\Models\Category::all() as $category)
                    <button class="btn btn-sm btn-success" data-filter=".{{ Str::slug($category->name) }}">{{ $category->name }}</button>
                @endforeach
            </div>
        @endif

        <div class="row grid">
            @foreach ($packages as $package)
                <div class="col-md-6 grid-item {{ $package->categories->pluck('name')->map(function($category) {return Str::slug($category); })->implode(' ') }}">
                    <div id="ho_img" class="packages_box" @if (! request()->routeIs('pages.packages')) @if ($loop->index % 2 == 0) data-aos="fade-right" @else data-aos="fade-left"@endif @endif>
                        <figure>
                            <img src="{{ asset('storage' . $package->image) }}" alt="{{ $package->slug }}" />
                        </figure>

                        <div class="tuscany">
                            <div class="tusc text_align_left">
                                <div class="italy">
                                    <h3>{{ $package->city }}</h3>
                                    <span>
                                        <img src="{{ asset('/images/loca.png') }}" alt="#"/>
                                        {{ $package->country }}
                                    </span>
                                </div>

                                <div class="italy_right">
                                    @if (auth()->check() && auth()->id() > 1)
                                        <h3>Price</h3>
                                        <span>${{ number_format($package->price, 2) }}</span>
                                    @else
                                        <a href="{{ route('login') }}">Login to View Price</a>
                                    @endif
                                </div>
                            </div>

                            <p>{{ \Illuminate\Support\Str::limit($package->description, 150, '...') }}</p>
                            <div class="tusc">
                                <a class="read_more" href="{{ route('pages.packages.show', $package->slug) }}">Read More</a>
                                <a class="read_more" href="#">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if (! request()->routeIs('pages.packages'))
                <div class="col-md-12">
                    <a class="read_more" href="{{ route('pages.packages') }}">See More</a>
                </div>
            @endif
        </div>
    </div>
</div>
