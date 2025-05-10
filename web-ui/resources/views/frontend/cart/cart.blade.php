@extends('frontend.layout.master')
@section('title', 'Cart - Checkout')
@section('content')
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2"></script> --}}
    <style>
        /* Modal Styling */
        .khqr-modal .modal-content {
            align-content: center;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .khqr-header {
            background-color: #dc3545;
            /* KHQR red */
            color: white;
            text-align: center;
            align-items: center;
            align-content: center;
            padding: 12px;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: none;
        }

        .khqr-ticket {
            background: white;
            /* border-radius: 8px;
                                                                                                                                                                                                        padding: 20px;
                                                                                                                                                                                                        margin: 20px auto; */
            /* max-width: 300px; */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .khqr-ticket img {
            align-items: center;
            align-content: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            /* margin-bottom: 12px; */
        }

        .khqr-ticket h6 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .khqr-ticket p {
            font-size: 1rem;
            color: #555;
            margin: 4px 0;
        }

        .khqr-ticket .amount {
            font-size: 1.2rem;
            font-weight: bold;
            color: #dc3545;
        }

        .modal-footer {
            justify-content: center;
            border-top: none;
        }

        .modal-footer .btn {
            border-radius: 20px;
            padding: 8px 24px;
            font-weight: 500;
        }

        /* Fade-in animation */
        .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateY(-20px);
        }

        .modal.show .modal-dialog {
            transform: translateY(0);
        }

        /* Loading spinner */
        .loading {
            font-size: 1rem;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .spinner-border {
            width: 1.5rem;
            height: 1.5rem;
        }
    </style>

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
                        <div class="row">
                            <div class="col-9">
                                <input :disabled="items.length == 0" id="promo" v-model="enteredPromocode"
                                    type="text" placeholder="Enter your code"
                                    class="form-control form-control-sm w-100" />
                            </div>
                            <div class="col-3">
                                <button :disabled="hasChanges || items.length == 0" type="button" @click="applyPromoCode"
                                    class="btn btn-primary btn-sm w-100">
                                    Apply
                                </button>
                            </div>


                        </div>

                        <p v-if="promoError" class="text-danger mt-1">@{{ promoError }}</p>
                        <p v-if="hasApplied">

                        <div v-if="codeApplied.coupons_type == 'percentage'" class="text-success mt-1">
                            @{{ codeApplied.coupons_title }} applied! You saved @{{ codeApplied.coupons_value }}%
                        </div>
                        <div v-else-if="codeApplied.coupons_type == 'amount'" class="text-success mt-1">
                            @{{ codeApplied.coupons_title }} applied! You saved @{{ codeApplied.coupons_value }}$
                        </div>
                        </p>
                    </div>
                    <div class="border-top mt-4 pt-4">
                        <div class="d-flex justify-content-between text-muted small">
                            <p class="h6 font-weight-bold mb-0">Subtotal</p>
                            <p class="h6 font-weight-bold mb-0">@{{ formatCash(totalItemValue) }}</p>
                        </div>
                        <div class="d-flex justify-content-between text-muted small">
                            <p class="h6 font-weight-bold mb-0">Platform Fees</p>
                            <p class="h6 font-weight-bold mb-0">@{{ formatCash(platformFee) }}</p>
                        </div>
                        <div v-if="hasApplied" class="d-flex justify-content-between text-muted small">
                            <div v-if="codeApplied.coupons_type == 'percentage'" class="h6 font-weight-bold">
                                Discount @{{ codeApplied.coupons_value }}%
                            </div>
                            <div v-else-if="codeApplied.coupons_type == 'amount'" class="h6 font-weight-bold">
                                Discount @{{ codeApplied.coupons_value }}$
                            </div>
                            <p class="h6 font-weight-bold mb-0">- @{{ formatCash(discount) }}</p>
                        </div>
                        <div class="d-flex font-weight-bold justify-content-between pb-3 text-muted small">
                            <p class="h6 text-success font-weight-bold mb-0">Grand Total</p>
                            <p class="h6 text-success font-weight-bold mb-0">@{{ formatCash(parseFloat(finalTotal) + platformFee) }}</p>
                        </div>
                        <button :disabled="hasChanges || items.length == 0" type="button"
                            class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"
                            @click="prepareKhqr">
                            Checkout
                        </button>
                        <span v-if="hasChanges" class="text-danger small mt-2">Please update your cart
                            in order to proceed</span>
                        <span v-if="items.length == 0" class="text-danger small mt-2">You have no tickets in your
                            cart</span>
                    </div>

                    <!-- KHQR QR Code -->
                    <div class="modal fade khqr-modal" id="exampleModalCenter" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="khqr-header" id="exampleModalLabel">KHQR Payment</div>
                                <div class="modal-body p-0">
                                    <div v-if="error" class="alert alert-danger">
                                        @{{ error }}
                                    </div>
                                    <div v-else-if="qrImageUrl" class="khqr-ticket position-relative">
                                        <img :src="qrImageUrl" alt="KHQR Code" class="img-fluid"
                                            style="width: 100%;" />
                                        <button type="button"
                                            class="btn btn-secondary position-absolute bottom-0 start-50 translate-middle-x mb-3"
                                            data-bs-dismiss="modal" @click="submitOrder()">Done</button>
                                    </div>
                                    <div v-else class="loading p-4">
                                        <span class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        @{{ processingMsg }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.0/build/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module">
        var appcart = new Vue({
            el: '#appcart',
            data: {
                user_id: "{{ $userId }}",
                items: [],
                coupons: {},
                totalItemValue: '',
                enteredPromocode: '',
                codeApplied: {},
                promoError: null,
                hasApplied: false,
                finalTotal: '',
                discount: '',
                hasChanges: false,
                initialItems: [],
                platformFee: null,
                qrImageUrl: null,
                responseData: {},
                error: null,
                khqrAmount: 0,
                processingMsg: ''

            },
            mounted() {
                this.fetchCartData();
                this.fetchCoupons()
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
                promocode: {
                    handler(newPromocode) {

                    }
                }
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
                            this.platformFee = response.data.platformFee;
                            this.finalTotal = this.totalItemValue
                            // console.log(typeof this.totalItemValue)

                            this.initialItems = JSON.parse(JSON.stringify(this.items));
                            this.hasChanges = false;
                        })
                        .catch(error => {
                            console.error('Error fetching cart data:', error);
                        });
                },
                fetchCoupons() {
                    axios.get('v1/user/coupon')
                        .then(response => {
                            this.coupons = response.data.data;
                            // console.log(this.coupons)
                        })
                        .catch(error => {
                            console.error('Error fetching coupons:', error);
                        });
                },
                formatCash(value) {
                    const toFloat = parseFloat(value);
                    return new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    }).format(toFloat);
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
                            this.finalTotal = this.totalItemValue
                            this.hasChanges = false;
                            Swal.fire({
                                title: "You updated your cart!",
                                html: 'Your cart has been updated successfully.',
                                icon: "success",
                            }).then((result) => {
                                window.location.reload();
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
                                    }).then((result) => {
                                        window.location.reload();
                                    })

                                })
                                .catch(error => {
                                    console.error('Error deleting cart:', error);
                                });
                        }
                    })
                },
                applyPromoCode() {
                    if (this.enteredPromocode === '') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please enter a promo code!',
                        });
                        this.foundPromoCode = null;
                        return;
                    }

                    const matchingCoupon = this.coupons.find(coupon =>
                        coupon.coupons_title.toLowerCase() === this.enteredPromocode.toLowerCase()
                    );

                    if (matchingCoupon) {
                        this.codeApplied = matchingCoupon;
                        this.promoError = null
                        this.hasApplied = true

                        this.finalTotal = this.totalItemValue
                        if (this.codeApplied.coupons_type == 'percentage') {
                            this.finalTotal = this.totalItemValue - (this.totalItemValue * (this.codeApplied
                                .coupons_value / 100))
                            this.discount = this.totalItemValue * (this.codeApplied.coupons_value / 100)
                        } else {
                            this.finalTotal = this.totalItemValue - this.codeApplied.coupons_value
                            this.discount = this.codeApplied.coupons_value
                        }
                    } else {
                        this.codeApplied = null;
                        this.promoError = 'Invalid Promo Code';
                        this.hasApplied = false
                    }

                    return this.codeApplied;
                },
                prepareKhqr() {
                    this.qrImageUrl = null;
                    this.error = null;
                    this.khqrAmount = parseFloat(this.finalTotal) + this.platformFee;
                    this.generateKhqr();
                },
                async generateKhqr() {
                    try {
                        this.processingMsg = 'Requesting QR code...';
                        const khqrResponse = await axios.post(
                            `/v1/user/khqr/generate`, {
                                "type": "merchant",
                                "accountId": "merchant@bakong",
                                "merchantName": "Ticket Booking By OG",
                                "merchantCity": "Phnom Penh",
                                "merchantId": "123456789",
                                "merchantBIC": "BANKKHPXXX",
                                "optional": {
                                    "currency": "usd",
                                    "amount": this.khqrAmount,
                                    "billNumber": "INV-001"
                                }
                            }, {
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json'
                                }
                            }
                        );

                        if (!khqrResponse.data.success) {
                            this.error = khqrResponse.data.error || 'Failed to generate KHQR string';
                            return;
                        }

                        this.responseData = khqrResponse.data.data;
                        this.processingMsg = 'Generating QR code...';


                        const webhookResponse = await axios.post(
                            'https://bot.gavined.com/webhook/qrcode', {
                                qr: khqrResponse.data.data.qrString
                            }, {
                                headers: {
                                    'Content-Type': 'application/json'
                                }
                            }
                        );

                        if (webhookResponse.data.Mime === 'image/png' && webhookResponse.data.base64) {
                            this.qrImageUrl = `data:image/png;base64,${webhookResponse.data.base64}`;
                        } else {
                            this.error = 'Invalid webhook response';
                        }
                    } catch (err) {
                        this.error = err.response?.data?.error || 'Failed to generate QR code';
                    }
                },
                async submitOrder() {
                    // console.log({
                    //     use_Coupon: this.codeApplied.coupons_id ? 1 : 0,
                    //     coupon_id: this.codeApplied.coupons_id || null,
                    //     total_amount: this.finalTotal,
                    //     user_id: this.user_id,
                    //     items: this.items
                    // })

                    await axios.post(`/v1/user/transactions`, {
                        use_Coupon: this.codeApplied.coupons_id ? 1 : 0,
                        coupon_id: this.codeApplied.coupons_id || 0,
                        total_amount: this.finalTotal,
                        user_id: this.user_id,
                        items: this.items
                    }).then(response => {
                        // console.log(response)
                        if (response.data.success) {
                            swal.fire({
                                title: "Order Placed Successfully",
                                html: `Your order has been placed successfully.`,
                                icon: "success",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            })
                        }
                    })
                }
            },
        });
    </script>


@endsection
