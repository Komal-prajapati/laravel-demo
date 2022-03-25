@extends('partials._main')

@section('content')
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage text_align_center">
                    <h2>Package Details</h2>
                </div>
            </div>

            <div class="col-md-12 text_align_center">
                <img src="{{ asset('storage' . $package->image) }}" alt="{{ $package->slug }}" />
            </div>

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

                <div class="my-4 lead">{{ $package->description }}</div>

                <div class="tusc mt-2">
                    <button class="read_more" type="button" id="btnEnquireNow">Enquire Now</button>
                </div>
            </div>

            <div class="col-md-12 enquiryNowForm @guest d-none @endguest">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('successMessagePackage'))
                    <div class="alert alert-success">
                        {{ session('successMessagePackage') }}
                    </div>
                @endif

                <form action="{{ route('pages.packages.enquire') }}" method="POST" id="request" class="main_form">
                    @csrf

                    <input type="hidden" name="package_id" value="{{ $package->id }}" />

                    <textarea class="textarea2" style="color:#676767;" placeholder="Message" name="message_content">{{ old('message_content') }}</textarea>

                    <button class="send_btnt">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
