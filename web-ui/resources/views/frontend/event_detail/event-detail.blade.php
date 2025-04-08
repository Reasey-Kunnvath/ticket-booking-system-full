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
            <div class="container">
                <div class="row gx-3">
                    <div class="col">
                        <div class="section-heading">
                            <h2>Available Tickets</h2>
                        </div>
                        <div v-for="event in eventdetail" class="right-content2">
                            <div class="info-box">
                                <div class="row">
                                    <div class="col-sm-2 align-self-center" style="text-align: center">
                                        <h5>@{{ event.mmmdd }}</h5>
                                        <small style="color: #9a9a9a">@{{ event.dddyyyy }}</small>
                                        <small style="color: #9a9a9a">@{{ event.ticket_in_stock }} Tickets</small>
                                    </div>
                                    <div class="col-sm-8 align-self-center" style="text-align: left">
                                        <h5>@{{ event.evt_name }}</h5>
                                        <small>@{{ event.ticket_title }}</small>
                                    </div>
                                    <div class="col-sm-2 align-self-center">
                                        <div class="main-dark-button">
                                            <a id="showAlert" href="#">@{{ event.ticket_price }}$</a>
                                        </div>
                                        <input id="form1" min="1" name="quantity" value="1" type="number"
                                            class="form-control form-control-sm text-center" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="right-content">
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
    <script>
        document.getElementById('showAlert').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: "Item Added to Cart",
                html: 'Go to <a href="{{ url('/cart') }}" style="font-weight:bold; color: #3085d6; text-decoration: underline;">Cart</a> to Checkout',
                icon: "success"
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>\
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Vue({
                el: '#eventdetail1',
                mounted() {
                    this.fetch();
                },
                data: {
                    eventdetail: [],
                    eventData: []

                },
                methods: {
                    // requestevet() {
                    //     try {
                    //         localStorage.setItem('evt_id', event.evt_id);
                    //         axios.post('http://127.0.0.1:8000/api/eventdetail/' + $event_id)
                    //             .then((response) => {
                    //                 this.eventdetail = response.data.data;
                    //                 console.log(this.eventdetail);
                    //             })
                    //             .catch((error) => {
                    //                 console.log("Error", error);
                    //             })
                    //     } catch (error) {
                    //         console.log(error);
                    //     }
                    // }
                    fetch() {
                        try {
                            localStorage.setItem('evt_id', @json($event_id));
                            axios.get('/eventdetail/' + localStorage.getItem(
                                    'evt_id'))
                                .then((response) => {
                                    this.eventdetail = response.data.ticket_data;
                                    this.eventData = response.data.event_data;
                                    console.log(this.eventData);
                                })
                                .catch((error) => {
                                    console.log("Error", error);
                                })
                        } catch (error) {
                            console.log(error);
                        }
                    },
                    getevent(eventdetail) {

                    }

                },

            })
        });
    </script>

@endsection
