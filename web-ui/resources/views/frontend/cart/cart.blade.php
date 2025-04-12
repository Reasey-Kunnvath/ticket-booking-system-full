@extends('frontend.layout.master')
@section('title', 'Cart - Checkout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

    <div class="container-3xl p-5 m-5 align-items-center justify-content-center">
        <div id="appcart">
            <div class="row shadow-lg">
                <div class="col-12 col-sm-8  p-4">
                    <div class="d-flex justify-content-between border-bottom pb-3 mb-3">
                        <h1 class="font-weight-bold h3">Shopping Cart</h1>
                        <h2 class="font-weight-bold h3">2 Items</h2>
                    </div>
                    {{-- Shop Item --}}
                    <div v-for="(item, index) in items" :key="index">
                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="{{ asset('frontend/assets/images/ticket-details.jpg') }}"
                                    class="img-fluid rounded-3" style="object-fit: cover; width: 100%; height: 100px;"
                                    alt="EVENT ABC">

                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <h6 class="mb-0">@{{ item.evt_name }}</h6>
                                <h6 class="text-muted">@{{ item.ticket_title }}</h6>
                            </div>
                            Quantity
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex align-self-center">

                                <input id="form1" min="1" name="quantity" :value="item.QTY" type="number"
                                    class="form-control form-control-sm" />

                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">@{{ formatCash(item.total_price) }}</h6>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="#!" class="text-danger"><i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <a href="{{ url('/all-event') }}" class="fs-5 font-weight-bold text-primary text-sm mt-5"><i
                                class="fa-solid fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Browse More Events</a>
                    </div>
                </div>

                <div id="summary" class="col-12 col-sm-4 p-4">
                    <h1 class="font-weight-bold h3 border-bottom pb-4">Order Summary</h1>
                    <form action="{{ url('/paymentForm') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-between mt-4 fw-bold">
                            <span class="text-muted small">Items @{{ items.length }}</span>
                            {{-- <span v-model="formatCash(totalTicketPrice)"
                                class="text-muted small">@{{ formatCash(oldPrice) }}</span> --}}
                        </div>
                        <div>
                            <label class="font-weight-medium d-block mb-2 text-muted text-sm">Shipping</label>
                            <select class="form-control form-control-sm mb-4">
                                <option>E-Ticket Delivery - Free</option>
                                <option>Door-to-Door Delivery - Free</option>
                            </select>
                        </div>
                        <div class="py-4">
                            <label for="promo" class="font-weight-bold d-block mb-2 text-muted text-sm">Promo
                                Code</label>
                            <input id="promo" v-model="enteredPromocode" type="text" placeholder="Enter your code"
                                class="form-control form-control-sm" />
                            {{-- <p v-if="promoError" class="text-danger mt-1">@{{ promoError }}</p>
                            <p v-if="appliedPromocode" class="text-success mt-1">
                                @{{ appliedPromocode.code }} applied! You saved @{{ appliedPromocode.discount }}%
                            </p> --}}
                        </div>
                        <div class="border-top mt-4 pt-4">
                            {{-- <div v-if="appliedPromocode" class="d-flex justify-content-between py-3 text-muted small">
                                <p class="h5 font-weight-bold mb-0">Discount @{{ appliedPromocode.discount }}%</p>
                                <p class="h5 font-weight-bold mb-0">- @{{ formatCash(oldPrice * (appliedPromocode.discount / 100)) }}</p>
                            </div> --}}
                            <div class="d-flex font-weight-bold justify-content-between py-3 text-muted small">
                                <p class="h5 font-weight-bold mb-0">Grand Total</p>
                                <p class="h5 font-weight-bold mb-0">@{{ formatCash(totalItemValue) }}</p>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100">Checkout</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <script type="module">
        var appcart = new Vue({
            el: '#appcart',
            data: {
                user_id: "{{ $userId }}",
                items: {},
                totalItemValue: '',
                enteredPromocode: ''

            },
            mounted() {
                this.fetchCartData();
            },
            methods: {
                fetchCartData() {
                    axios.get('v1/user/cart', {
                            params: {
                                user_id: this.user_id
                            }
                        })
                        .then(response => {
                            this.items = response.data.data;
                            this.totalItemValue = response.data.cartValue
                            // console.log(this.items);
                        })
                        .catch(error => {
                            console.error('Error fetching cart data:', error);
                        });
                },
                formatCash(value) {
                    return new Intl.NumberFormat("en-US", {
                        style: "currency",
                        currency: "USD",
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    }).format(value);
                },
            },
        })
    </script>


@endsection
