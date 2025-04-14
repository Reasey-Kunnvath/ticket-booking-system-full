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
                        <h2 class="font-weight-bold h3">
                            <button :disabled="!hasChanges" @click="updateCart" type="button" class="btn btn-primary">
                                Update Cart
                            </button>
                        </h2>
                    </div>
                    {{-- Shop Item --}}
                    <div v-if="items.length == 0" class="text-center">
                        <img src="{{ asset('frontend/assets/img/image.png') }}" alt=""
                            style="max-width: 50%; height: auto;" />
                        <br>
                        You have no ticket in your cart yet
                    </div>
                    <div v-else>
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
                                    <div class="row">
                                        <div class="input-group input-group-sm">
                                            <button class="btn btn-secondary" type="button"
                                                @click="changeQuantity(index,-1)">-</button>
                                            <input id="form1" min="1" name="quantity" :value="item.QTY"
                                                class="form-control text-center" readonly />
                                            <button class="btn btn-success" type="button"
                                                @click="changeQuantity(index,1)">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h6 class="mb-0">@{{ formatCash(item.ticket_price * item.QTY) }}</h6>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="javascript:void(0);" @click="deleteFromCart(item.cart_id)"
                                        class="text-danger"><i class="fas fa-trash"></i></a>
                                </div>
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
                        <button :disabled="hasChanges || items.length == 0" type="button"
                            class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                            data-bs-target="#exampleModalCenter">
                            Checkout
                        </button>
                        <span v-if="hasChanges" class="text-danger small mt-2">Please update your cart
                            in order to proceed</span>
                        <span v-if="items.length == 0" class="text-danger small mt-2">You have no tickets in your
                            cart</span>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-bs-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module">
        var appcart = new Vue({
            el: '#appcart',
            data: {
                user_id: "{{ $userId }}",
                items: [],
                totalItemValue: '',
                enteredPromocode: '',
                hasChanges: false,
                initialItems: [],
            },
            mounted() {
                this.fetchCartData();
            },
            watch: {
                items: {
                    deep: true,
                    handler(newItems) {
                        if (this.initialItems.length === 0) {
                            this.hasChanges = false;
                            return;
                        }
                        this.hasChanges = newItems.some((item, index) => {
                            return (
                                !this.initialItems[index] || item.QTY !== this.initialItems[index].QTY
                            );
                        });
                    },
                },
            },
            methods: {
                fetchCartData() {
                    axios
                        .get('v1/user/cart', {
                            params: {
                                user_id: this.user_id,
                            },
                        })
                        .then(response => {
                            this.items = response.data.data;
                            this.totalItemValue = response.data.cartValue;
                            console.log(this.items)

                            this.initialItems = JSON.parse(JSON.stringify(this.items));
                            this.hasChanges = false;
                        })
                        .catch(error => {
                            console.error('Error fetching cart data:', error);
                        });
                },
                formatCash(value) {
                    return new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    }).format(value);
                },
                changeQuantity(index, value) {
                    const newQuantity = this.items[index].QTY + value;
                    if (newQuantity >= 1 && newQuantity <= 10) {
                        this.$set(this.items[index], 'QTY', newQuantity);
                    } else if (newQuantity < 1) {
                        this.$set(this.items[index], 'QTY', 1);
                    } else if (newQuantity > 10) {
                        this.$set(this.items[index], 'QTY', 10);
                    }
                },
                updateCart() {
                    axios.put(`v1/user/cart/${this.user_id}`, {
                            user_id: this.user_id,
                            items: this.items,
                        })
                        .then(response => {
                            // console.log(response)
                            this.initialItems = JSON.parse(JSON.stringify(this.items));
                            this.totalItemValue = response.data.cartValue || this.totalItemValue;
                            this.hasChanges = false;
                            Swal.fire({
                                title: "You updated your cart!",
                                html: 'Your cart has been updated successfully.',
                                icon: "success",
                            }).then((result) => {
                                // window.location.reload()
                                this.fetchCartData();
                            })

                        })
                        .catch(error => {
                            console.error('Error updating cart:', error);
                        });
                },
                deleteFromCart(value) {
                    // console.log(value)
                    swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete(`v1/user/cart/${value}`)
                                .then(response => {
                                    // console.log(response)
                                    this.fetchCartData();
                                    Swal.fire({
                                        title: "You deleted your cart!",
                                        html: 'Your cart has been deleted successfully.',
                                        icon: "success",
                                    })
                                })
                                .catch(error => {
                                    console.error('Error deleting cart:', error);
                                });
                        }
                    })
                }
            },
        });
    </script>


@endsection
