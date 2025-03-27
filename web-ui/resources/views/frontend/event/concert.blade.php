@extends('frontend.layout.master')
@section('title', 'Concerts')
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


    <!-- Property List Start -->
    <div id="app">
        <div class="tickets-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Concerts</h2>
                        </div>
                    </div>
                    <div v-for="concert in concerts" class="col-lg-4">
                        <div class="ticket-item">
                            <div class="thumb">
                                <img src={{ asset('frontend/assets/images/ticket-01.jpg') }} alt="" />
                                <div class="price">
                                    <span>1 ticket<br />from <em>$@{{ concert.ticket_price }}</em></span>
                                </div>
                            </div>
                            <div class="down-content">
                                <span>There Are @{{ concert.ticket_in_stock }} Tickets Left For This Show</span>
                                <h4>@{{ concert.evt_name }}</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i> @{{ concert.evt_start_date }} PM
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>@{{ concert.evt_address }} de
                                        Janeiro
                                    </li>
                                </ul>
                                <div class="main-dark-button">
                                    <a href="{{ url('event-detail') }}">Purchase Tickets</a>
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
    </div>
    <!-- Property List End -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',

            data: {
                concerts: []
            },
            methods: {
                fetch() {
                    try {
                        axios.get('http://127.0.0.1:8000/api/concert')
                            .then((response) => {
                                this.concerts = response.data.data;
                                console.log(this.concerts);
                            })
                            .catch((error) => {
                                console.log("Error", error);
                            })

                    } catch (error) {
                        console.log(error);
                    }
                }
            },
            mounted() {
                this.fetch();
            },
        })
    </script>
@endsection
