@extends('frontend.layout.master')
@section('title','All Event')
@section('content')
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



        <div class="tickets-page">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="heading">
                    <h1 class="p-3">All Events</h1>
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
                        <a href="{{url('/event-detail')}}">Purchase Tickets</a>
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
                        <a href="{{url('/event-detail')}}">Purchase Tickets</a>
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
                        <a href="{{url('/event-detail')}}">Purchase Tickets</a>
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
                        <a href="{{url('/event-detail')}}">Purchase Tickets</a>
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
                        <a href="{{url('/event-detail')}}">Purchase Tickets</a>
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
                        <a href="{{url('/event-detail')}}">Purchase Tickets</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="pagination">
                    <ul>
                      <li><a href="#">Prev</a></li>
                      <li><a href="#">1</a></li>
                      <li class="active"><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">Next</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
@endsection
