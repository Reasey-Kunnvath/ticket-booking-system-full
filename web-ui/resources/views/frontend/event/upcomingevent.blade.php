@extends('frontend.layout.master')
@section('title', 'Upcoming Event')
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

    <!-- Events List Start -->
    <div id="UpcomingApp">
        <div class="tickets-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h2>Events Upcoming</h2>
                        </div>
                    </div>
                    <div v-if="loading" class="col-lg-4">Loading...</div>
                    <div v-for="ticket in tickets" v-else :key="ticket.ticket_id" class="col-lg-4">
                        <div class="ticket-item">
                            <div class="thumb">
                                <img src={{ asset('frontend/assets/images/ticket-01.jpg') }} alt="" />
                                <div class="price">
                                    <span>1 ticket<br />from <em>$ @{{ ticket.ticket_price }} </em></span>
                                </div>
                            </div>
                            <div class="down-content">
                                <span>@{{ ticket.ticket_in_stock }} ticket left</span>
                                <h4>@{{ ticket.evt_name }}</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i> @{{ ticket.evt_start_date }}
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker"></i>@{{ ticket.evt_address }}
                                    </li>
                                </ul>
                                <div class="main-dark-button">
                                    <a :href="'/event-detail/' + ticket.evt_id">Purchase Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="pagination">
                        <ul v-if="pagination.total > 9">
                            <li>
                                <a v-if="pagination.current_page < pagination.from" href="#"
                                    @click.prevent="changePage(pagination.current_page - 1);scrollToTop()">Prev</a>
                                <a v-else class="disabled">Prev</a>
                            </li>
                            <li v-for="page in pagination.last_page" :key="page"
                                :class="page == pagination.current_page ? 'active' : ''">
                                <a v-if="page != pagination.current_page" href="#"
                                    @click.prevent="changePage(page);scrollToTop()">@{{ page }}</a>
                                <a v-else href="#"
                                    @click.prevent="changePage(page);scrollToTop()">@{{ page }}</a>
                            </li>
                            <li>
                                <a v-if="pagination.to < pagination.total" href="#"
                                    @click.prevent="changePage(pagination.current_page + 1);scrollToTop()">Next</a>
                                <a v-else class="disabled">Next</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->

    </div>
    <!-- End Events List -->

    <!-- JavaScript Libraries Vue2 -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Vue({
                el: '#UpcomingApp',
                data: {
                    tickets: [],
                    pagination: '',
                    loading: true
                },
                mounted() {
                    this.fetch();
                },
                methods: {
                    fetch(page) {
                        try {
                            axios.get(`http://127.0.0.1:8000/api/eventcoming?page=${page}`)
                                .then((response) => {
                                    this.tickets = response.data.data.data;
                                    this.pagination = response.data.data;
                                    this.loading = false;
                                })
                                .catch((error) => {
                                    console.log("Error", error);
                                    this.loading = false;
                                })

                        } catch (error) {
                            console.log(error);
                            this.loading = false;
                        }
                    },
                    changePage(page) {
                        this.pagination.current_page = page
                        if (page >= 1 && page <= this.pagination.last_page) {
                            this.fetch(page);
                        }
                    },
                    scrollToTop() {
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });
                    }
                },

            })
        });
    </script>
    <!-- End JavaScript Libraries Vue2 -->
@endsection
