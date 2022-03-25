@extends('partials._main')

@section('content')
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="titlepage text_align_center">
                    <h2>Contact Us</h2>
                </div>
            </div>

            <div class="col-md-8 offset-md-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('successMessageContact'))
                    <div class="alert alert-success">
                        {{ session('successMessageContact') }}
                    </div>
                @endif

                <form action="{{ route('pages.contact.store') }}" method="POST" id="request" class="main_form">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="cont_in" placeholder="Full Name" type="type" name="full_name" value="{{ old('full_name') }}">
                        </div>
                        <div class="col-md-12">
                            <input class="cont_in" placeholder="Your Email" type="type" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-12">
                            <input class="cont_in" placeholder="Phone Number" type="type" name="contact_number" value="{{ old('contact_number') }}">
                        </div>
                        <div class="col-md-12">
                            <textarea class="textarea2" style="color:#676767;" placeholder="Message" name="message_content">{{ old('message_content') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="send_btnt">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
