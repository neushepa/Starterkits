@extends('layouts.frontend.page')

@section('content')
<section class="portfolio">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <ul id="portfolio-flters">
            @foreach ($albums as $album)
                {{-- <li data-filter=".filter-app {{ $album->album_name }}" class="">{{ $album->album_name }}</li> --}}
            @endforeach
          </ul>
        </div>
      </div>

      <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500" style="position: relative; height: 3753px; wow zoomIn">
        @foreach($galleries as $gallery)
            <div class="col-lg-4 col-md-6 portfolio-wrap {{ $album->album_name }}" style="position: absolute; left: 0px; top: 0px;">
                <div class="portfolio-item">
                    <a class="popup-image" href="{{ asset('assets/gallery/'.$gallery->picture) }} ">
                        <img src="{{ asset('assets/gallery/'.$gallery->picture) }}" title="{{ $gallery->description }}" class="w-100">
                    </a>
                    <div class="portfolio-info">
                        <h4>{{ $gallery->album->album_name }}</h4>
                        <p>{{ $gallery->description }}</p>
                        <div class="portfolio-links">
                            <a class="popup-image" href="{{ asset('assets/gallery/'.$gallery->picture) }} "><i class="bx bx-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        {{-- <div class="col-lg-4 col-md-6 portfolio-wrap filter-app" style="position: absolute; left: 0px; top: 0px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>App 1</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div> --}}

        {{-- <div class="col-lg-4 col-md-6 portfolio-wrap filter-web" style="position: absolute; left: 0px; top: 417px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Web 3</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-app" style="position: absolute; left: 0px; top: 834px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>App 2</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-card" style="position: absolute; left: 0px; top: 1251px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Card 2</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-web" style="position: absolute; left: 0px; top: 1668px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Web 2</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-app" style="position: absolute; left: 0px; top: 2085px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>App 3</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-card" style="position: absolute; left: 0px; top: 2502px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Card 1</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-card" style="position: absolute; left: 0px; top: 2919px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Card 3</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-wrap filter-web" style="position: absolute; left: 0px; top: 3336px;">
          <div class="portfolio-item">
            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h3>Web 1</h3>
              <div>
                <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 1"><i class="bx bx-plus"></i></a>
                <a href="portfolio-details.html" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      {{ $galleries->links() }}
    </div>
  </section>
  @endsection
