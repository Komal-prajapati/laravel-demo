<div class="customers">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="titlepage text_align_center">
                    <h2>Customers Says </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide customers_banne" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        @foreach ($testimonials as $testimonial)
                        <div class="carousel-item @if ($loop->index == 0) active @endif">
                            <div class="container-fluid">
                                <div class="carousel-caption relative">
                                    <div class="test_box text_align_center">
                                        <p>{{ $testimonial->content }}</p>

                                        @if ($testimonial->person_avatar)
                                            <i><img src="{{ asset('storage'. $testimonial->person_avatar) }}" alt="{{ $testimonial->person_name }}" style="width: 160px;" /></i>
                                        @else
                                            <i><img src="{{ asset('images/default-not-available-avatar.png') }}" alt="{{ $testimonial->person_name }}"/></i>
                                        @endif

                                        <h4>{{ $testimonial->person_name }}</h4>

                                        @if ($testimonial->company_name)
                                            <span>{{ $testimonial->company_name }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                  {{-- <div class="carousel-item">
                     <div class="container-fluid">
                        <div class="carousel-caption relative">
                           <div class="test_box text_align_center">
                              <p>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typetext of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
                              <i><img src="{{ asset('/images/test2.png') }}" alt="#"/></i>
                              <h4>Fitter Found</h4>
                              <span>Industry's standard </span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container-fluid">
                        <div class="carousel-caption relative">
                           <div class="test_box text_align_center">
                              <p>text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typetext of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
                              <i><img src="{{ asset('/images/test2.png') }}" alt="#"/></i>
                              <h4>Fitter Found</h4>
                              <span>Industry's standard </span>
                           </div>
                        </div>
                     </div>
                  </div> --}}
                    </div>

                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
