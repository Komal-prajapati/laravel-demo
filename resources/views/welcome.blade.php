@extends('partials._main')

@section('content')
      <div class="full_bg">
         <div class="slider_main">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <!-- carousel code -->
                     <div id="carouselExampleIndicators" class="carousel slide">
                        <ol class="carousel-indicators">
                           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <!-- first slide -->
                           <div class="carousel-item active">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div  class="col-md-10 offset-md-1">
                                       <div class="board">
                                          <h1>Now start <br>Your traveling </h1>
                                          <p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed towhen looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to</p>
                                          <a class="read_more" href="Javascript:void(0)">Read More</a>
                                          <a class="read_more" href="Javascript:void(0)">Contact us</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- second slide -->
                           <div class="carousel-item">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div  class="col-md-10 offset-md-1">
                                       <div class="board">
                                          <h1>Now start <br>Your traveling </h1>
                                          <p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed towhen looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to</p>
                                          <a class="read_more" href="Javascript:void(0)">Read More</a>
                                          <a class="read_more" href="Javascript:void(0)">Contact us</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- third slide-->
                           <div class="carousel-item">
                              <div class="carousel-caption relative">
                                 <div class="row">
                                    <div  class="col-md-10 offset-md-1">
                                       <div class="board">
                                          <h1>Now start <br>Your traveling </h1>
                                          <p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed towhen looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to</p>
                                          <a class="read_more" href="Javascript:void(0)">Read More</a>
                                          <a class="read_more" href="Javascript:void(0)">Contact us</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- controls -->
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      @include('partials._packages')

      <div class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>About Our Company</h2>
                  </div>
               </div>
               <div class="col-md-10 offset-md-1">
                  <div class="about_text text_align_center">
                     <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentiallyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                     </p>
                     <a class="read_more" href="about.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>

      @include('partials._testimonials')
@endsection
