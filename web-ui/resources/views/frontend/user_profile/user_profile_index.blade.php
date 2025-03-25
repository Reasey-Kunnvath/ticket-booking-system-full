@extends('frontend.layout.master')
@section('title','Your Profile')
@section('content')

<style type="text/css">
    body {
      background: #f5f5f5;
      margin-top: 20px;
    }

    .ui-w-80 {
      width: 80px !important;
      height: auto;
    }

    .btn-default {
      border-color: rgba(24, 28, 33, 0.1);
      background: rgba(0, 0, 0, 0);
      color: #4e5155;
    }

    label.btn {
      margin-bottom: 0;
    }

    .btn-outline-primary {
      border-color: #26b4ff;
      background: transparent;
      color: #26b4ff;
    }

    .btn {
      cursor: pointer;
    }

    .text-light {
      color: #babbbc !important;
    }

    .btn-facebook {
      border-color: rgba(0, 0, 0, 0);
      background: #3b5998;
      color: #fff;
    }

    .btn-instagram {
      border-color: rgba(0, 0, 0, 0);
      background: #000;
      color: #fff;
    }

    .card {
      background-clip: padding-box;
      box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
    }

    .row-bordered {
      overflow: hidden;
    }

    .account-settings-fileinput {
      position: absolute;
      visibility: hidden;
      width: 1px;
      height: 1px;
      opacity: 0;
    }
    .account-settings-links .list-group-item.active {
      font-weight: bold !important;
    }
    html:not(.dark-style) .account-settings-links .list-group-item.active {
      background: transparent !important;
    }
    .account-settings-multiselect ~ .select2-container {
      width: 100% !important;
    }
    .light-style .account-settings-links .list-group-item {
      padding: 0.85rem 1.5rem;
      border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .light-style .account-settings-links .list-group-item.active {
      color: #4e5155 !important;
    }
    .material-style .account-settings-links .list-group-item {
      padding: 0.85rem 1.5rem;
      border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .material-style .account-settings-links .list-group-item.active {
      color: #4e5155 !important;
    }
    .dark-style .account-settings-links .list-group-item {
      padding: 0.85rem 1.5rem;
      border-color: rgba(255, 255, 255, 0.03) !important;
    }
    .dark-style .account-settings-links .list-group-item.active {
      color: #fff !important;
    }
    .light-style .account-settings-links .list-group-item.active {
      color: #8c54fd !important;
    }
    .light-style .account-settings-links .list-group-item {
      padding: 0.85rem 1.5rem;
      border-color: rgba(24, 28, 33, 0.03) !important;
    }

        /* Customize Cancel Button */
    .custom-cancel-btn {
        background-color: #f44336; /* Red */
        color: #fff;
        border: none;
    }
    .custom-cancel-btn:hover {
        background-color: #8b1515; /* Darker Red */
        color: #fff;
    }

    /* Customize Submit Button */
    .custom-submit-btn {
        background-color: #8c54fd ; /* Green */
        color: #fff;
        border: none;
    }
    .custom-submit-btn:hover {
        background-color: #3f1b87  ; /* Darker Green */
        color: #fff;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

<div class="container light-style flex-grow-1 container-p-y mt-4">
    <h4 class="fw-bold py-3 mb-4">Account settings</h4>
    <div class="card overflow-hidden">
        <div class="row row-bordered row-border-primary">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account-general-info">
                        <i class="fa fa-user me-2"></i> Your Information
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#your-order">
                        <i class="fa fa-shopping-cart me-2"></i> Your Orders
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#your-coupon">
                        <i class="fa fa-tags me-2"></i> Your Vouchers/Coupons
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#account-change-password">
                        <i class="fa fa-lock me-2"></i> Change Password
                    </a>
                    <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#billing-information">
                        <i class="fa fa-credit-card me-2"></i> Billing & Payment
                    </a>
                </div>
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item text-danger" href="{{url('/login')}}">
                        <i class="fa fa-sign-out-alt me-2"></i> Log Out
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account-general-info">
                        <!-- Account General Section -->
                        <div class="row mt-3 ms-1 me-3">
                            <div class="col-8">
                                <h2>Your Profile</h2>
                                <small class="mb-3">Manage your profile information</small>
                            </div>
                            <div class="text-end col-4">
                                <button type="button" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>
                        </div>

                        <div class="card-body d-flex align-items-center">
                            <img src="{{asset('frontend/assets/img/userprofile.png')}}" alt="" class="d-block ui-w-80" />
                            <div class="ms-4">
                                <label class="btn btn-outline-primary">
                                    Upload new photo
                                    <input type="file" class="account-settings-fileinput" />
                                </label>
                                &nbsp;
                                <button type="button" class="btn btn-default">Reset</button>
                                <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                            </div>

                        </div>
                        <hr class="border-light m-0" />
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" value="nmaxwell" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" value="Nelle Maxwell" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="text" class="form-control mb-1" value="nmaxwell@mail.com" />
                                <div class="alert alert-warning mt-3">Your email is not confirmed. Please check your inbox.<br />
                                    <a href="javascript:void(0)">Resend confirmation</a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control" value="Company Ltd." />
                            </div>
                        </div>
                        <!-- Account Info Section -->
                        <hr class="border-light m-0" />
                        <div class="card-body pb-2">
                            <div class="mb-3">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet...</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Birthday</label>
                                <input type="text" class="form-control" value="May 3, 1995" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Country</label>
                                <select class="form-select">
                                    <option>USA</option>
                                    <option selected>Canada</option>
                                    <option>UK</option>
                                    <option>Germany</option>
                                    <option>France</option>
                                </select>
                            </div>
                        </div>
                        <hr class="border-light m-0" />
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Contacts</h6>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" value="+0 (123) 456 7891" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="your-order">
                        <div class="m-3">
                            <h2>Orders</h2>
                            <small class="mb-3">All your order history are listed here</small>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center justify-content-center" style="margin: 2rem;">
                            <img src="{{ asset("frontend/assets/img/image.png") }}" alt="" style="max-width: 50%; height: auto;" />
                            <p class="mt-3"><h4><small>You don't have any order yet</small></h4></p>
                            <h5><small><a href="#"><u>Shop for ticket</u></a></small></h5>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="your-coupon">
                        <div class="m-3">
                            <h2>Coupons</h2>
                            <small class="mb-3">All your eligible coupons are listed here</small>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center justify-content-center" style="margin: 2rem;">

                            <img src="{{ asset("frontend/assets/img/image.png") }}" alt="" style="max-width: 50%; height: auto;" />
                            <p class="mt-3"><h4><small>You don't have any Coupons yet</small></h4></p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-change-password">
                        <div class="row mt-3 ms-1 me-3">
                            <div class="col-8">
                                <h2>Your Account Crediential</h2>
                                <small class="mb-3">You can change your password here</small>
                            </div>
                            <div class="text-end col-4">
                                <button type="button" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                        <div class="card-body pb-2">

                            <div class="mb-3">
                                <label class="form-label">Current password</label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New password</label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Repeat new password</label>
                                <input type="password" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="billing-information">
                        <div class="card-body pb-2">
                            <div class="mb-3">
                                <h2>Billing Information</h2>
                                <small class="mb-3">All your Billing Information are listed here</small>
                            </div>

                                <div class="mb-3">
                                    <label class="form-label">Payment Method</label>
                                    {{-- Credit Card --}}
                                    <div id="cardList">
                                        <div v-for="(card, index) in sharedState.card_list" :key="'card_list_' + index" class="card p-2 m-2">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="p-1 text-start">
                                                            <div class="d-flex align-items-center">
                                                                <img :src="card.cardIcon" width="30" height="30" alt="" />
                                                                <h6 class="mb-0 ms-2">@{{ card.cardType }} Ends in **@{{ card.cardNumber.slice(-2) }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <div class="p-1">
                                                            <button class="btn btn-outline-danger btn-sm" @click="removeCard(index)">Remove</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="p-1 text-start">
                                                            <div class="d-flex align-items-center">
                                                                <span>Expiry Date: @{{ card.expiryDate }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#creditCardModal">Add Payment Method</button>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Payment History</label>
                                <div class="border border-secondary bg-light p-3 text-center small">
                                    You have not made any payment.
                                </div>
                            </div>
                        </div>
                        <hr class="border-light m-0" />
                    </div>
                <div id="app">
                    <!-- Add Modal Structure -->
                    <div class="modal fade" id="creditCardModal" tabindex="-1" aria-labelledby="creditCardModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="creditCardModalLabel">Credit Card Information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                    <form>
                                        <div class="modal-body">
                                                <!-- Cardholder Name -->
                                                <div class="mb-3">
                                                    <label for="cardHolderName" class="form-label">Cardholder Name</label>
                                                    <input v-model="CardHolderName" type="text" class="form-control" id="cardHolderName" placeholder="Enter name as on card" required>
                                                </div>

                                                <!-- Card Number -->
                                                <div class="mb-3">
                                                    <label for="cardNumber" class="form-label">Card Number</label>
                                                    <div class="input-group">
                                                        <input v-model="CardNumber" @input="formatCardNumber()" type="text" class="form-control" id="cardNumber" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" required>
                                                        <span class="input-group-text text-primary" id="cardType">
                                                            <img :src="cardTypeIcon" alt="" width="30" height="30">
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row g-3">
                                                    <!-- Expiry Date -->
                                                    <div class="col-md-6">
                                                        <label for="expiryDate" class="form-label">Expiry Date</label>
                                                        <input v-model="ExpiryDate" @input="formatExpiryDate()" type="text" class="form-control" id="expiryDate" placeholder="MM/YY" maxlength="5" required>
                                                    </div>

                                                    <!-- CVV -->
                                                    <div class="col-md-6">
                                                        <label for="cvv" class="form-label">CVV</label>
                                                        <input v-model="CVC" type="password" class="form-control" id="cvv" placeholder="XXX" maxlength="3" required>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn custom-cancel-btn" data-bs-dismiss="modal">Cancel</button>
                                            <button @click.prevent="submitCard" class="btn custom-submit-btn">Save</button>
                                        </div>
                                    </form>


                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Add additional tabs as necessary -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
<script type="text/javascript">
    // Shared state for both Vue instances
    const sharedState = Vue.observable({
        card_list: []
    });

    var app = new Vue({
        el:'#app',
        data: {
            CardHolderName: null,
            CardNumber: null,
            type: null,
            CardType:  null,
            ExpiryDate: null,
            CVC: null,
            cardTypeIcon: null,
            baseImgUrl: '{{ asset("frontend/assets/img/") }}'
        },
        methods: {
            formatExpiryDate() {
                // Remove all non-digit characters
                let value = this.ExpiryDate.replace(/\D/g, '');

                // If there are more than 2 digits, insert a slash after the second digit
                if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }

                // Update the data property
                this.ExpiryDate = value;

            },
                  // Formats the card number as XXXX XXXX XXXX XXXX
            formatCardNumber() {
                let number = this.CardNumber.replace(/\D/g, '');
                let groups = number.match(/.{1,4}/g);
                this.CardNumber = groups ? groups.join(' ') : '';

                                // Remove spaces from the card number.
                const cleanNumber = this.CardNumber.replace(/\s/g, '');
                this.type = this.getCardType(cleanNumber);
                // Based on the type, return the corresponding image HTML.
                if (this.type === 'Visa') {
                    this.cardTypeIcon = this.baseImgUrl + '/visa.svg';
                } else if (this.type === 'Mastercard') {
                    this.cardTypeIcon = this.baseImgUrl + '/mastercard.svg';
                } else if (this.type === 'American Express' || this.type === 'amex') {
                    this.cardTypeIcon = this.baseImgUrl + '/amex.svg';
                } else if (this.type === 'Discover') {
                    this.cardTypeIcon = this.baseImgUrl + '/discover.svg';
                } else {
                // Return an empty string if no valid type is entered.
                    this.cardType = null;
                    this.cardTypeIcon = null;
                    this.type = null;
                    return null;
                }
                this.cardType = this.type;
            },
            // Determine the card type based on the card number.
            getCardType(cardNumber) {
                const visaRegex = /^4[0-9]{12}(?:[0-9]{3})?$/;
                const mastercardRegex = /^5[1-5][0-9]{14}$/;
                const amexRegex = /^3[47][0-9]{13}$/;
                const discoverRegex = /^6011[0-9]{12}$/;

                if (visaRegex.test(cardNumber)) {
                return 'Visa';
                } else if (mastercardRegex.test(cardNumber)) {
                return 'Mastercard';
                } else if (amexRegex.test(cardNumber)) {
                return 'American Express';
                } else if (discoverRegex.test(cardNumber)) {
                return 'Discover';
                } else {
                return null;
                }
            },

            submitCard() {
                // Validate the fields
                if (!this.CardHolderName || !this.CardNumber || !this.ExpiryDate || !this.CVC) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill in all the required fields!'
                    });
                    return;
                }else if(!this.cardType){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'The Credit Card Information you entered is invalid'
                    });
                    return;
                }

                // Push card to the shared state
                sharedState.card_list.push({
                    cardHolder: this.CardHolderName,
                    cardNumber: this.CardNumber,
                    cardType: this.CardType,
                    cardIcon: this.cardTypeIcon,
                    expiryDate: this.ExpiryDate,
                    cvc: this.CVC
                });

                  // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Card Saved!',
                    text: 'Your card has been successfully saved.',
                    timer: 2000,
                    showConfirmButton: false
                });

                // Clear the form fields
                this.CardHolderName = null;
                this.CardNumber = null;
                this.CardType = '';
                this.cardTypeIcon = null;
                this.ExpiryDate = null;
                this.CVC = null;


            },
        }
    })


    // Second Vue instance for card list management
    var cardList = new Vue({
        el: '#cardList',
        data: {
            sharedState,
            tempcardHolder: null,
            tempcardNum: null,
            tempExp: null,
            tempCvv: null,
            var_index: null,
        },
        methods: {
            removeCard(index) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        this.sharedState.card_list.splice(index, 1);
                    }
                });

            },
        }
    });

</script>


  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script
  data-cfasync="false"
  src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>

@endsection
