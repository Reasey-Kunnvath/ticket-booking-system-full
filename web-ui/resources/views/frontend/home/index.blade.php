@extends('frontend.layout.master')
@section('title','Home')
@section('content')
        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-4 animated fadeIn mb-4">Find Your <span class="text-primary">One-Stop Shop</span> For Event Tickets</h1>
                    <p class="animated fadeIn mb-4 pb-2">Fast, Secure, and Convenient. Find Your Next Adventure!</p>
                    <a href="{{route('All-Events')}}" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">See Available Tickets</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-750" src={{asset("frontend/assets/images/ticket-details.jpg")}} alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-750" src={{asset("frontend/assets/images/about-image.jpg")}} alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-750" src={{asset("frontend/assets/images/venue-03.jpg")}} alt="">
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
                      <button type="submit" id="form-submit" class="btn btn-dark w-100">
                        Submit
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Search End -->


        {{-- <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Property Types</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src={{asset("frontend/assets/img/icon-apartment.png")}} alt="Icon">
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
                                    <img class="img-fluid" src={{asset("frontend/assets/img/icon-villa.png")}} alt="Icon">
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
                                    <img class="img-fluid" src={{asset("frontend/assets/img/icon-house.png")}} alt="Icon">
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
                                    <img class="img-fluid" src={{asset("frontend/assets/img/icon-housing.png")}} alt="Icon">
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
                                    <img class="img-fluid" src={{asset("frontend/assets/img/icon-building.png")}} alt="Icon">
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
                                    <img class="img-fluid" src={{asset("frontend/assets/img/icon-neighborhood.png")}} alt="Icon">
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
                                    <img class="img-fluid" src={{asset("frontend/assets/img/icon-condominium.png")}} alt="Icon">
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
                                    <img class="img-fluid" src={{asset("frontend/assets/img/icon-luxury.png")}} alt="Icon">
                                </div>
                                <h6>Garage</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End --> --}}

        <!-- Property List Start (Upcoming Events) -->
        <div class="tickets-page">
            <div class="container">
              <div class="row">
                <div class="col-lg-14">
                  <div class="heading">
                    <h2>Upcoming Events</h2>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-01.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$25</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 150 Tickets Left For This Show</span>
                      <h4>Wonderful Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Thursday: 05:00 PM to 10:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>908 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-02.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$45</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 200 Tickets Left For This Show</span>
                      <h4>Golden Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Sunday: 06:00 PM to 09:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>789 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-03.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$65</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 260 Tickets Left For This Show</span>
                      <h4>Water Splash Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Tuesday: 07:00 PM to 11:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>456 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-04.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$20</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 340 Tickets Left For This Show</span>
                      <h4>Tiger Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Thursday: 06:40 PM to 11:40 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>123 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-05.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$30</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 420 Tickets Left For This Show</span>
                      <h4>Woodland Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Wednesday: 06:00 PM to 09:00
                          PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>1122 Copacabana Beach, Rio
                          de Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-06.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$40</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 520 Tickets Left For This Show</span>
                      <h4>Winter Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Saturday: 06:00 PM to 09:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>220 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="pagination">
                    <ul>
                      <li><a href="#">Browse More Upcoming Events</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Property List End -->

        <!-- Property List Start (Most Popular Events) -->
        <div class="tickets-page">
            <div class="container">
              <div class="row">
                <div class="col-lg-14">
                  <div class="heading">
                    <h2>Most Popular Events</h2>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-01.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$25</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 150 Tickets Left For This Show</span>
                      <h4>Wonderful Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Thursday: 05:00 PM to 10:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>908 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-02.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$45</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 200 Tickets Left For This Show</span>
                      <h4>Golden Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Sunday: 06:00 PM to 09:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>789 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-03.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$65</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 260 Tickets Left For This Show</span>
                      <h4>Water Splash Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Tuesday: 07:00 PM to 11:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>456 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-04.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$20</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 340 Tickets Left For This Show</span>
                      <h4>Tiger Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Thursday: 06:40 PM to 11:40 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>123 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-05.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$30</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 420 Tickets Left For This Show</span>
                      <h4>Woodland Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Wednesday: 06:00 PM to 09:00
                          PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>1122 Copacabana Beach, Rio
                          de Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-06.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$40</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 520 Tickets Left For This Show</span>
                      <h4>Winter Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Saturday: 06:00 PM to 09:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>220 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="pagination">
                    <ul>
                      <li><a href="#">Browse Most Popular Events</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Property List End -->

        <!-- Property List Start (All Events) -->
        <div class="tickets-page">
            <div class="container">
              <div class="row">
                <div class="col-lg-14">
                  <div class="heading">
                    <h2>Most Popular Events</h2>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-01.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$25</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 150 Tickets Left For This Show</span>
                      <h4>Wonderful Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Thursday: 05:00 PM to 10:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>908 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-02.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$45</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 200 Tickets Left For This Show</span>
                      <h4>Golden Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Sunday: 06:00 PM to 09:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>789 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-03.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$65</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 260 Tickets Left For This Show</span>
                      <h4>Water Splash Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Tuesday: 07:00 PM to 11:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>456 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-04.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$20</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 340 Tickets Left For This Show</span>
                      <h4>Tiger Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Thursday: 06:40 PM to 11:40 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>123 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-05.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$30</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 420 Tickets Left For This Show</span>
                      <h4>Woodland Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Wednesday: 06:00 PM to 09:00
                          PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>1122 Copacabana Beach, Rio
                          de Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="ticket-item">
                    <div class="thumb">
                      <img src={{asset("frontend/assets/images/ticket-06.jpg")}} alt="" />
                      <div class="price">
                        <span>1 ticket<br />from <em>$40</em></span>
                      </div>
                    </div>
                    <div class="down-content">
                      <span>There Are 520 Tickets Left For This Show</span>
                      <h4>Winter Festival</h4>
                      <ul>
                        <li>
                          <i class="fa fa-clock-o"></i> Saturday: 06:00 PM to 09:00 PM
                        </li>
                        <li>
                          <i class="fa fa-map-marker"></i>220 Copacabana Beach, Rio de
                          Janeiro
                        </li>
                      </ul>
                      <div class="main-dark-button">
                        <a href="ticket-details.html">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="pagination">
                    <ul>
                      <li><a href="{{url('/all-event')}}">Browse All Events</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Property List End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Say!</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src={{asset("frontend/assets/img/testimonial-1.jpg")}} style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src={{asset("frontend/assets/img/testimonial-2.jpg")}} style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src={{asset("frontend/assets/img/testimonial-3.jpg")}} style="width: 45px; height: 45px;">
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
@endsection
