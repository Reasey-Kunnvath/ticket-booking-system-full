@extends('frontend.layout.master')
@section('title', 'Conferences')
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
    <div id="conference">
        <div class="tickets-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Conferences</h2>
                        </div>
                    </div>
                    <div v-for="econfer in conferences" class="col-lg-4">
                        <div class="ticket-item">
                            <div class="thumb">
                                <img src={{ asset('frontend/assets/images/ticket-01.jpg') }} alt="" />
                                <div class="price">
                                    <span>1 ticket<br />from <em>$@{{ econfer.ticket_price }}</em></span>
                                </div>
                            </div>
                            <div class="down-content">
                                <span>There Are @{{ econfer.ticket_in_stock }} Tickets Left For This Show</span>
                                <h4>@{{ econfer.evt_name }}</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i> @{{ econfer.evt_start_date }}
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>@{{ econfer.evt_address }}
                                        Janeiro
                                    </li>
                                </ul>
                                <div class="main-dark-button">
                                   <a :href="'/event-detail/' + econfer.evt_id">PurchaseTickets</a>
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log(window.axios);
            new Vue({
                el: '#conference',

                data: {
                    conferences: []
                },
                methods: {
                    fetch() {
                        try {
                            axios.get('http://127.0.0.1:8000/api/conferences')
                                .then((response) => {
                                    this.conferences = response.data.data;
                                    console.log(this.conferences);
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
        });
    </script>
@endsection
