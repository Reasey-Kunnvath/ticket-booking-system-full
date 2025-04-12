@extends('frontend.layout.master')
@section('title', 'Ticket Detail')
@section('content')
    <style>
        .ticket-details-page {
            padding: 0px;
        }

        .ticket-details-page .left-image img {
            width: 100%;
            border-radius: 10px;
        }

        .ticket-details-page .right-content {
            background: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .ticket-details-page .right-content2 {
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .ticket-details-page .right-content h4 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .ticket-details-page .right-content span {
            display: block;
            margin-bottom: 15px;
            color: #777;
        }

        .ticket-details-page .right-content ul {
            list-style: none;
            padding: 0;
        }

        .ticket-details-page .right-content ul li {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .ticket-details-page .right-content ul li i {
            margin-right: 10px;
            color: #007bff;
        }

        .ticket-details-page .warn {
            margin-top: 20px;
        }

        .ticket-details-page .warn h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .ticket-details-page .warn p {
            font-size: 16px;
            color: #555;
        }

        .shows-events-schedule {
            padding: 40px 0;
        }

        .shows-events-schedule .section-heading h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .shows-events-schedule ul {
            list-style: none;
            padding: 0;
        }

        .shows-events-schedule ul li {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .shows-events-schedule ul li .title h4 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .shows-events-schedule ul li .title span {
            color: #777;
        }

        .shows-events-schedule ul li .time,
        .shows-events-schedule ul li .place {
            font-size: 16px;
            color: #555;
        }

        .shows-events-schedule ul li .time i,
        .shows-events-schedule ul li .place i {
            margin-right: 10px;
            color: #007bff;
        }

        .shows-events-schedule ul li .main-dark-button a {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .shows-events-schedule ul li .main-dark-button a:hover {
            background: #0056b3;
        }
    </style>

    <div id="eventdetail1">
        <div class="ticket-details-page">
            <div class="container-4xl p-6 m-5 align-items-center justify-content-center">
                <div class="row gx-3">
                    <div class="col">
                        <div class="section-heading">
                            <h2>Available Tickets</h2>
                        </div>
                        <div v-for="event in eventdetail" class="right-content2" style="background: #fff;">
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-sm-2 align-items-center justify-content-center"
                                        style="text-align: center">
                                        <h5>@{{ event.mmmdd }}</h5>
                                        <small style="color: #9a9a9a">@{{ event.dddyyyy }}</small><br>
                                        <small style="color: #9a9a9a">@{{ event.ticket_in_stock }} Tickets</small>
                                    </div>
                                    <div class="col-sm-8 align-self-center" style="text-align: left">
                                        <h5>@{{ event.evt_name }}</h5>
                                        <small>@{{ event.ticket_title }}</small>
                                    </div>
                                    <div class="col-sm-2 d-flex align-items-center justify-content-center">
                                        <div class="d-flex flex-column gap-2 w-100" style="max-width: 120px;">
                                            <!-- Disabled Ticket Price Button -->
                                            <a id="showAlert" href="javascript:void(0);"
                                                class="btn btn-primary text-white text-center d-block w-100 disabled"
                                                aria-disabled="true">
                                                @{{ event.ticket_price }}$
                                            </a>
                                            <!-- Add to Cart Button -->
                                            <button type="button"
                                                class="btn btn-primary text-white text-center d-block w-100"
                                                @click="addToCart(event.ticket_id, event.ticket_price)">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="right-content" style="background: #fff;">
                            <div class="left-image">
                                <img src="{{ asset('frontend/assets/images/ticket-details.jpg') }}" alt="" />
                            </div><br>
                            <h4>@{{ eventData.evt_name }}</h4>
                            <span>@{{ eventData.ticket_in_stock }} Tickets still available</span>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> @{{ eventData.full_date }}</li>
                                <li>
                                    <a :href="eventData.evt_address_link" target="_blank">
                                        <i class="fa fa-map-marker"></i>@{{ eventData.evt_address }}
                                    </a>
                                </li>
                            </ul>

                            <div class="warn">
                                <h3>Event Detail</h3>
                                <p>ABC Extra Stout</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        document.getElementById('showAlert').addEventListener('click', function(event) {

        });
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>\
    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            new Vue({
                el: '#eventdetail1',
                created() {
                    this.fetch();
                },
                data: {
                    eventdetail: [],
                    eventData: [],
                    payload: {
                        user_id: localStorage.getItem('uid?'),
                        token: localStorage.getItem('token')
                    }
                },
                methods: {
                    fetch() {
                        try {
                            localStorage.setItem('evt_id', @json($event_id));
                            axios.get('/eventdetail/' + localStorage.getItem(
                                    'evt_id'))
                                .then((response) => {
                                    this.eventdetail = response.data.ticket_data;
                                    this.eventData = response.data.event_data;
                                    // console.log(this.eventData);
                                })
                                .catch((error) => {
                                    console.log("Error", error);
                                })
                        } catch (error) {
                            console.log(error);
                        }
                    },
                    addToCart(ticket_id, ticket_price) {
                        event.preventDefault();
                        // console.log(this.payload.token);
                        if (!this.payload.token) {
                            Swal.fire({
                                title: "Login or Signup Required",
                                html: 'Please <a href="/login" style="font-weight:bold; color: #3085d6; text-decoration: underline;">Login or Signup</a> to purchase the tickets',
                                icon: "warning",
                            }).then((result) => {
                                window.location.href = '/login'
                            });
                            return
                        }
                        // console.log(ticket_id, ticket_price);

                        axios.post('v1/user/cart', {
                                user_id: this.payload.user_id,
                                token: this.payload.token,
                                evt_id: localStorage.getItem('evt_id'),
                                ticket_id: ticket_id,
                                ticket_price: ticket_price
                            })
                            .then((response) => {
                                Swal.fire({
                                    title: "Item Added to Cart",
                                    html: `Go to <a href="/cart?uid=${this.payload.user_id}&token=${this.payload.token}" style="font-weight:bold; color: #3085d6; text-decoration: underline;">Cart</a> to Checkout`,
                                    icon: "success"
                                });
                            })
                            .catch((error) => {
                                Swal.fire({
                                    title: "Oops...",
                                    html: 'Something Went Wrong',
                                    icon: "error",
                                });
                            });





                    }

                },

            })
        });
    </script>

@endsection
