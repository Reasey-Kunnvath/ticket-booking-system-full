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


    <!-- Events List -->
    <div id="concert">
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
                                <img v-if="concert.image" :src="'http://localhost:8000/storage/' + concert.image"
                                    alt="" style="width: 415.983px; height: 303.25px" />
                                <img v-else src="{{ asset('frontend/assets/images/noimage.jpg') }}" alt="No Image"
                                    style="width: 415.983px; height: 303.25px">
                                <div class="category">
                                    <span> <b>@{{ concert.cate_name }}</b> </span>
                                </div>
                                <div class="price">
                                    <span>1 ticket<br />from <em>$@{{ concert.ticket_price }}</em></span>
                                </div>
                            </div>
                            <div class="down-content">
                                <span>@{{ concert.total_tickets_sold }} Tickets Sold</span>
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
                                    <a :href="'/event-detail/' + concert.evt_id">Purchase Tickets</a>
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
        </div>
    </div>
    <!-- End Events List -->

    <!-- JavaScript Libraries Vue2 -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Vue({
                el: '#concert',
                mounted() {
                    this.fetch();
                },
                data: {
                    concerts: [],
                    pagination: '',
                },
                methods: {
                    fetch(page) {
                        try {
                            axios.get(`http://127.0.0.1:8000/api/concert?page=${page}`)
                                .then((response) => {
                                    this.concerts = response.data.data.data;
                                    this.pagination = response.data.data;
                                })
                                .catch((error) => {
                                    console.log("Error", error);
                                })

                        } catch (error) {
                            console.log(error);
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
                        }); // Smooth scroll to top
                    }
                }

            })
        });
    </script>
    <!-- End JavaScript Libraries Vue2 -->
@endsection
