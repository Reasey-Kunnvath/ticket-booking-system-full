@extends('frontend.layout.master')
@section('title', 'Home')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-4 animated fadeIn mb-4">Find Your <span class="text-primary">One-Stop Shop</span> For Event
                    Tickets</h1>
                <p class="animated fadeIn mb-4 pb-2">Fast, Secure, and Convenient. Find Your Next Adventure!</p>
                <a href="{{ route('All-Events') }}" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">See Available
                    Tickets</a>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-750" src={{ asset('frontend/assets/images/ticket-details.jpg') }} alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-750" src={{ asset('frontend/assets/images/about-image.jpg') }} alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-750" src={{ asset('frontend/assets/images/venue-03.jpg') }} alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Search Start -->
    <div class="container-fluid bg-secondary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-3 align-items-center">
                <div class="col-lg-5">
                    <h4 class="text-white mb-0">Sort The Upcoming Shows & Events By:</h4>
                </div>
                <div class="col-lg-7">
                    <div class="row g-2">
                        <div class="col-lg-3">
                            <select class="form-select">
                                <option value="month" selected>Month</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select">
                                <option value="location" selected>Location</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Europe">Europe</option>
                                <option value="US">US</option>
                                <option value="Asia">Asia</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-select">
                                <option value="price" selected>Price</option>
                                <option value="min">$0 - $50</option>
                                <option value="standard">$50 - $100</option>
                                <option value="high">$100 - $200</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <button id="form-submit" type="submit" class="btn btn-dark w-100">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <!-- Category Start -->
    {{-- <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Property Types</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                        sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-apartment.png') }}
                                        alt="Icon">
                                </div>
                                <h6>Apartment</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-villa.png') }} alt="Icon">
                                </div>
                                <h6>Villa</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-house.png') }} alt="Icon">
                                </div>
                                <h6>Home</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-housing.png') }}
                                        alt="Icon">
                                </div>
                                <h6>Office</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-building.png') }}
                                        alt="Icon">
                                </div>
                                <h6>Building</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-neighborhood.png') }}
                                        alt="Icon">
                                </div>
                                <h6>Townhouse</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-condominium.png') }}
                                        alt="Icon">
                                </div>
                                <h6>Shop</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{ asset('frontend/assets/img/icon-luxury.png') }}
                                        alt="Icon">
                                </div>
                                <h6>Garage</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Category End -->

    <!-- Events -->
    <div id="homepage">
        <!-- Pupular Events -->
        <div class="tickets-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h1 class="p-3 text-center">Most Popular Events</h1>
                        </div>
                    </div>
                    <div v-for="event in eventpopular" class="col-lg-4">
                        <div class="ticket-item">
                            <div class="thumb">
                                <img src={{ asset('frontend/assets/images/ticket-02.jpg') }} alt="" />
                                <div class="category">
                                    <span> <b>@{{ event.cate_name }}</b> </span>
                                </div>
                                <div class="price">
                                    <span>1 ticket<br />from <em>$ @{{ event.ticket_price }}</em></span>
                                </div>

                            </div>
                            <div class="down-content">
                                <span>@{{ event.total_tickets_sold }} Tickets Sold</span>
                                <h4>@{{ event.evt_name }}</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i>@{{ event.evt_start_date }}
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>@{{ event.evt_address }}
                                    </li>
                                </ul>
                                <div class="main-dark-button">
                                    <a :href="'/event-detail/' + event.evt_id">Purchase Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="pagination">
                            <ul>
                                <li><a href="{{ route('Most-Popular-Events') }}">Browse Popular Events</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Pupular Events -->
        <!-- Upcoming Events -->
        <div class="tickets-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h1 class="p-3 text-center">Upcoming Events</h1>
                        </div>
                    </div>
                    <div v-for="comingE in coming" class="col-lg-4">
                        <div class="ticket-item">
                            <div class="thumb">
                                <img src={{ asset('frontend/assets/images/ticket-02.jpg') }} alt="" />
                                <div class="category">
                                    <span> <b>@{{ comingE.cate_name }}</b> </span>
                                </div>
                                <div class="price">
                                    <span>1 ticket<br />from <em>$ @{{ comingE.ticket_price }}</em></span>
                                </div>

                            </div>
                            <div class="down-content">
                                <span>@{{ comingE.total_tickets_sold }} Tickets Sold</span>
                                <h4>@{{ comingE.evt_name }}</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i>@{{ comingE.evt_start_date }}
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>@{{ comingE.evt_address }}
                                    </li>
                                </ul>
                                <div class="main-dark-button">
                                    <a :href="'/event-detail/' + comingE.evt_id">Purchase Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="pagination">
                            <ul>
                                <li><a href="{{ route('Upcoming-Events') }}">Browse Upcoming Events</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Upcoming Events -->
        <!-- Reuseble Component -->
        {{-- <div class="tickets-page">
            <div class="container">
                <x-event-listing :events="$events" title="Upcoming Events" />
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li><a href="{{ route('Upcoming-Events') }}">Browse Upcoming Events</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Reuseble Component -->
    </div>
    <!-- End Events -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Our Clients Say!</h1>
                <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                    sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded"
                                src={{ asset('frontend/assets/img/testimonial-1.jpg') }}
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded"
                                src={{ asset('frontend/assets/img/testimonial-2.jpg') }}
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-3">
                    <div class="bg-white border rounded p-4">
                        <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam
                            stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded"
                                src={{ asset('frontend/assets/img/testimonial-3.jpg') }}
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Client Name</h6>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- JavaScript Libraries Vue2 -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Vue({
                el: '#homepage',

                data: {
                    eventpopular: [],
                    coming: [],
                },
                mounted() {
                    this.mostpopular();
                    this.comingevent();
                },
                methods: {
                    mostpopular() {
                        try {
                            axios.get('http://127.0.0.1:8000/api/popularEvents')
                                .then((response) => {
                                    this.eventpopular = response.data.data.data;
                                    // console.log("aaa", response.data.data.data);
                                })
                                .catch((error) => {
                                    console.log("Error", error);
                                })

                        } catch (error) {
                            console.log(error);
                        }
                    },
                    comingevent() {
                        try {
                            axios.get('http://127.0.0.1:8000/api/comingEvents')
                                .then((response) => {
                                    this.coming = response.data.data.data;
                                    // console.log(response.data);
                                })
                                .catch((error) => {
                                    console.log("Error", error);
                                })

                        } catch (error) {
                            console.log(error);
                        }
                    },
                },
            })
        });
    </script>
    <!-- End JavaScript Libraries Vue2 -->
@endsection
