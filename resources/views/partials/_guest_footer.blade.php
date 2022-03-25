<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                @if (request()->route()->getName() != 'pages.contact')
                    <div class="col-md-12 ">
                        <div class="letter text_align_left">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                @endif

                <div class="col-md-5">
                    @if (request()->route()->getName() == 'pages.contact')
                        <div class="follow text_align_left">
                            <h3>About</h3>

                            <p>
                                Content here, content here', making it look like readable English. Many desktop publishing packagesContent here, content here', making it look like readable English.
                            </p>
                        </div>
                    @else
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
                                    <input class="cont_in" placeholder="Your Message" type="type" name="message_content" value={{ old('message_content') }}>
                                </div>
                                <div class="col-md-12">
                                    <button class="send_btnt">Send</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>

                <div class="col-md-4 ">
                    <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>Locations</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>+01 1234567890</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:demo@example.com"> demo@example.com</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <div class="follow text_align_left">
                        <h3>Follow Us</h3>
                        <ul class="social_icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="follow letter text_align_left">
                        <h3>Newsletter</h3>
                        @if ($errors->newsletter->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->newsletter->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('successMessage'))
                            <div class="alert alert-success">
                                {{ session('successMessage') }}
                            </div>
                        @endif

                        <form action="{{ route('pages.newsletterSubs.store') }}" method="POST" class="form_subscri">
                            @csrf

                            <input class="newsl" placeholder="Email" type="text" name="email" value={{ old('email') }}>
                            <button class="subsci_btn">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            &copy; {{ date('Y') }} All Rights Reserved. Design by <a href="https://html.design" target="_blank" rel="noopenner">Free html Templates</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
