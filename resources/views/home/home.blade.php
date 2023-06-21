@extends('layouts.main')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/home-design.css') }}" />
@endpush

@section('content')
    <div class="main">
        <div class="main-container">
            <!-- Carousel -->
            <div class="carousel">
                @foreach ($pinned as $pin)
                    <div class="carousel-slides">
                        @if ($pin->type_id == 1)
                            <img src="{{ asset('storage/' . $pin->thumbnail) }}" alt="" />
                            <div class="carousel-info">
                                <div class="tag-wrapper">
                                    @foreach ($pin->categories as $category)
                                        <a class="tag"
                                            href="/categories?category={{ $category->category_name }}">{{ $category->category_name }}</a>
                                    @endforeach
                                </div>
                                <a class="carousel-title" href="/{{ $pin->slug }}">{{ $pin->title }}</a>
                                <small>{{ $pin->created_at->format('j/F/Y') }}</small>
                            </div>
                        @else
                            <iframe src="{{ 'https://www.youtube.com/embed/' . $pin->video_link }}"
                                frameborder="0"></iframe>
                        @endif


                        <div class="carousel-button">
                            <i class="bx bx-chevron-left carousel-nav-left"></i>
                            <i class="bx bx-chevron-right carousel-nav-right"></i>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- End of Carousel -->

            <!-- Featured Card -->
            <div class="card-wrapper">
                @if ($views->isEmpty())
                    <h1>Data Not Found</h1>
                @else
                    @foreach ($views as $view)
                        <div class="card">
                            <div class="detail-wrapper">
                                <div class="card-image">
                                    @if ($view->type_id == 1)
                                        <a href="/{{ $view->slug }}">
                                            <img src="{{ asset('storage/' . $view->thumbnail) }}" alt="" />
                                        </a>
                                        <div class="card-view"><small>&#128065; {{ $view->counts }}</small></div>
                                    @else
                                        <iframe src="{{ 'https://www.youtube.com/embed/' . $view->video_link }}"
                                            frameborder="0"></iframe>
                                        <div class="card-view"><small>&#128065; {{ $view->counts }}</small></div>
                                    @endif
                                </div>
                                <div class="card-info">
                                    <div class="tag-wrapper">
                                        @foreach ($view->categories as $category)
                                            <a class="tag"
                                                href="/categories?category={{ $category->category_name }}">{{ $category->category_name }}</a>
                                        @endforeach
                                    </div>
                                    <div class="card-title">
                                        <a href="/{{ $view->slug }}">{{ $view->title }}</a>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/{{ $view->slug }}">Read More &#8594;</a>
                                        <small>{{ $view->created_at->format('j/F/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
            <!-- End of Featured Card -->

            <div class="break-point-horizontal">
                <hr />
            </div>

            <div class="header header-latest">
                <h1>Latest Articles</h1>
                <a href="/categories?date=Latest">View All Articles &#8594;</a>
            </div>

            <!-- Latest Articles Card -->
            <div class="card-wrapper">
                @if ($latest->isEmpty())
                    <h1>Data Not Found</h1>
                @else
                    @foreach ($latest as $late)
                        <div class="card">
                            <div class="detail-wrapper">
                                <div class="card-image">
                                    @if ($late->type_id == 1)
                                        <a href="/{{ $late->slug }}">
                                            <img src="{{ asset('storage/' . $late->thumbnail) }}" alt="" />
                                        </a>
                                        <div class="card-view"><small>&#128065; {{ $late->counts }}</small></div>
                                    @else
                                        <iframe src="{{ 'https://www.youtube.com/embed/' . $late->video_link }}"
                                            frameborder="0"></iframe>
                                        <div class="card-view"><small>&#128065; {{ $late->counts }}</small></div>
                                    @endif
                                </div>
                                <div class="card-info">
                                    <div class="tag-wrapper">
                                        @foreach ($late->categories as $category)
                                            <a
                                                href="/categories?category={{ $category->category_name }}">{{ $category->category_name }}</a>
                                        @endforeach
                                    </div>
                                    <div class="card-title">
                                        <a href="/{{ $late->slug }}">{{ $late->title }}</a>
                                    </div>
                                    <div class="card-desc">
                                        <p>{{ $late->excerpt }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/{{ $late->slug }}">Read More &#8594;</a>
                                        <small>{{ $late->created_at->format('j/F/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <!-- End of Latest Articles Card -->

            <div class="break-point-horizontal">
                <hr />
            </div>
        </div>

        <!-- Hero -->
        <div class="hero-image">
            <div class="hero-wrapper">
                <img src="img/hero.jpg" alt="" />
                <div class="hero-info">
                    <div class="hero-desc">
                        <p>
                            <i><b style="font-weight: 500">Gerakan KangPisMan</b></i> merupakan kependekan dari kata
                            Kurangi, Pisahkan dan Manfaatkan Sampah. Kurangi sampah berarti setiap warga memiliki kesadaran
                            untuk menggunakan kembali barang-barang yang masih bisa digunakan. Seperti kertas bekas, botol
                            bekas.
                        </p>
                        <a href="/about">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Hero -->

        <div class="main-container">
            <div class="break-point-horizontal">
                <hr />
            </div>

            <div class="header">
                <h1> Articles</h1>
                <a href="/categories?type=1">View All Articles&#8594;</a>
            </div>

            <!-- Articles Card -->
            <div class="card-wrapper">
                @if ($articles->isEmpty())
                    <h1>Data Not Found</h1>
                @else
                    @foreach ($articles as $article)
                        <div class="card">
                            <div class="detail-wrapper">
                                <div class="card-image">
                                    <a href="/{{ $article->slug }}"> <img
                                            src={{ asset('storage/' . $article->thumbnail) }} alt="" /> </a>
                                    <div class="card-view"><small>&#128065; {{ $article->counts }}</small></div>
                                </div>
                                <div class="card-info">
                                    <div class="tag-wrapper">
                                        @foreach ($article->categories as $category)
                                            <a
                                                href="/categories?category={{ $category->category_name }}">{{ $category->category_name }}</a>
                                        @endforeach
                                    </div>
                                    <div class="card-title">
                                        <a href="/{{ $article->slug }}" class="card-home-title">{{ $article->title }}</a>
                                    </div>
                                    <div class="card-desc">
                                        <p>{{ $article->excerpt }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/{{ $article->slug }}">Read More &#8594;</a>
                                        <small>{{ $article->created_at->format('j/F/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <!-- End of Articles Card -->

            <div class="break-point-horizontal">
                <hr />
            </div>

            <div class="header">
                <h1>Videos</h1>
                <a href="/categories?type=2">View All Videos &#8594;</a>
            </div>

            <!-- Videos Card -->
            <div class="card-wrapper">
                @if ($videos->isEmpty())
                    <h1>Data Not Found</h1>
                @else
                    @foreach ($videos as $article)
                        <div class="card">
                            <div class="detail-wrapper">
                                <div class="card-image">
                                    <iframe src="{{ 'https://www.youtube.com/embed/' . $article->video_link }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                    <div class="card-view"><small>&#128065; {{ $article->counts }}</small></div>
                                </div>
                                <div class="card-info">
                                    <div class="tag-wrapper">
                                        @foreach ($article->categories as $category)
                                            <a
                                                href="/categories?category={{ $category->category_name }}">{{ $category->category_name }}</a>
                                        @endforeach
                                    </div>
                                    <div class="card-title">
                                        <a href="/{{ $article->slug }}">{{ $article->title }}
                                        </a>
                                    </div>
                                    <div class="card-desc">
                                        <p>{{ $article->excerpt }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="/{{ $article->slug }}">Read More &#8594;</a>
                                        <small>{{ $article->created_at->format('j/F/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <!-- End of Videos Card -->

            <div class="break-point-horizontal">
                <hr />
            </div>

            {{-- <div class="header">
                <h1>Photos</h1>
                <a href="/categories">View All Photos &#8594;</a>
            </div>

            <!-- Image Gallery -->
            <div class="image-gallery-wrapper">
                @foreach ($random_articles as $random)
                    <div class="image-{{ $loop->iteration }}"><img src="{{ asset('storage/' . $random->thumbnail) }}"
                            alt="" /></div>
                @endforeach
            </div>
            <!-- End of Image Gallery --> --}}

            <!-- Map -->
            <div class="header">
                <h1>Location</h1>
                <a href="https://www.google.com/maps?output=search&q=tps+karanganyar+astana+anyar&entry=mc&sa=X&ved=2ahUKEwix9Je8udP_AhVRb2wGHQa8BdsQ0pQJegQICRAB"
                    target="_blank">View All
                    Locations &#8594;</a>
            </div>

            <div class="map-wrapper">
                <div id='map' class="map"></div>
            </div>
            <!-- End of Map -->
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/home-script.js') }}"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYXNlbmExMiIsImEiOiJjbGo0ZDBqaDYwMHlkM3JsdzZjbHJsdzlpIn0.1NB6CTrTqpuZz1x_x-NiTg';
        var map = new mapboxgl.Map({
            container: 'map',
            center: [107.601312, -6.922819],
            zoom: 13,
            style: 'mapbox://styles/mapbox/streets-v11'
        });
        var places = [{
                name: 'TPS Panjunan',
                coordinates: [107.60004692287535, -6.9306364523001385],
                description: 'Jl. Bojongloa No.53/93, Panjunan, Kec. Astanaanyar, Kota Bandung, Jawa Barat 40242'

            },
            {
                name: 'TPS Pasar Ancol',
                coordinates: [107.61583937116522, -6.932223977269878],
                description: 'Jl. Pungkur No.236, Ancol, Kec. Regol, Kota Bandung, Jawa Barat 40254'
            },
            {
                name: 'TPS-SPA Tegallega',
                coordinates: [107.60638167970275, -6.9327424492639],
                description: 'Jl. Moch. Toha No.58, Ciateul, Kec. Regol, Kota Bandung, Jawa Barat 40252'
            },
            {
                name: 'TPS 3R Kebon Jeruk Beriman',
                coordinates: [107.60161292279886, -6.916406668038759],
                description: 'Jl. Babatan No.5, Kb. Jeruk, Kec. Andir, Kota Bandung, Jawa Barat 40181'
            }
            // Add more places as needed
        ];

        // Add markers for each place
        places.forEach(function(place) {
            var popup = new mapboxgl.Popup().setHTML('<h3>' + place.name + '</h3><p>' + place.description + '</p>');

            var marker = new mapboxgl.Marker({
                    color: '#ff0000'
                })
                .setLngLat(place.coordinates)
                .addTo(map);

            marker.setPopup(popup);
            marker.on('click', function() {
                marker.togglePopup();
            });
        });
    </script>
@endpush
