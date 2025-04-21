@extends('frontend.layout.master')
@section('title', 'Sell Your Ticket')
@section('content')

    <style>
        body {
            margin-top: 20px;
        }

        .steps .step {
            display: block;
            width: 100%;
            margin-bottom: 35px;
            text-align: center
        }

        .steps .step .step-icon-wrap {
            display: block;
            position: relative;
            width: 100%;
            height: 80px;
            text-align: center
        }

        .steps .step .step-icon-wrap::before,
        .steps .step .step-icon-wrap::after {
            display: block;
            position: absolute;
            top: 50%;
            width: 50%;
            height: 3px;
            margin-top: -1px;
            background-color: #e1e7ec;
            content: '';
            z-index: 1
        }

        .steps .step .step-icon-wrap::before {
            left: 0
        }

        .steps .step .step-icon-wrap::after {
            right: 0
        }

        .steps .step .step-icon {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
            border: 1px solid #e1e7ec;
            border-radius: 50%;
            background-color: #f5f5f5;
            color: #374250;
            font-size: 38px;
            line-height: 81px;
            z-index: 5
        }

        .steps .step .step-title {
            margin-top: 16px;
            margin-bottom: 0;
            color: #606975;
            font-size: 14px;
            font-weight: 500
        }

        .steps .step:first-child .step-icon-wrap::before {
            display: none
        }

        .steps .step:last-child .step-icon-wrap::after {
            display: none
        }

        .steps .step.completed .step-icon-wrap::before,
        .steps .step.completed .step-icon-wrap::after {
            background-color: #8141ca
        }

        .steps .step.completed .step-icon {
            border-color: #8141ca;
            background-color: #8141ca;
            color: #fff
        }

        @media (max-width: 576px) {

            .flex-sm-nowrap .step .step-icon-wrap::before,
            .flex-sm-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 768px) {

            .flex-md-nowrap .step .step-icon-wrap::before,
            .flex-md-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 991px) {

            .flex-lg-nowrap .step .step-icon-wrap::before,
            .flex-lg-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        @media (max-width: 1200px) {

            .flex-xl-nowrap .step .step-icon-wrap::before,
            .flex-xl-nowrap .step .step-icon-wrap::after {
                display: none
            }
        }

        .bg-faded,
        .bg-secondary {
            background-color: #f5f5f5 !important;
        }
    </style>
    <div id="app" class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="container w-full">
                    <div class="card card-style1 border-0">
                        <div class="card-body p-4 p-md-5 p-xl-6">
                            <h1>Partnership Request Form</h1>
                            <br>
                            <h5>Create Your Own Event With Us!</h5>
                            <br>
                            <ul>
                                <li>Promote and pre-sell eTickets for your events on our platform!. app, no matter the
                                    size of your event or even if its are free.</li>
                                <li>Scan attendees at your event to admit them quickly and even check ID & vaccination
                                    status</li>
                                <li>Review detailed event insights with full access and sales visibility.</li>
                                <li>No need to print physical tickets</li>
                            </ul>
                            <br>
                            <hr>
                            <h5>Partnership Request Process</h5>
                            <div class="container-fluid padding-bottom-3x pt-4">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div
                                            class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                    <div class="step-icon"><i class="fa-solid fa-file-lines"></i></div>
                                                </div>
                                                <h4 class="step-title">Fill in the form</h4>
                                            </div>
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                    <div class="step-icon"><i class="fa-solid fa-paper-plane"></i></div>
                                                </div>
                                                <h4 class="step-title">Submit Request</h4>
                                            </div>
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                    <div class="step-icon"><i class="fa-solid fa-magnifying-glass"></i>
                                                    </div>
                                                </div>
                                                <h4 class="step-title">Review Request</h4>
                                            </div>
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                    <div class="step-icon"><i class="fa-solid fa-comments"></i></div>
                                                </div>
                                                <h4 class="step-title">Negotiate Terms</h4>
                                            </div>
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                    <div class="step-icon"><i class="fa-solid fa-user-check"></i></div>
                                                </div>
                                                <h4 class="step-title">Request Approved</h4>
                                            </div>
                                            <div class="step completed">
                                                <div class="step-icon-wrap">
                                                    <div class="step-icon"><i class="fa-solid fa-truck-fast"></i></div>
                                                </div>
                                                <h4 class="step-title">Deliver CMS</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <em>After submission, It Usually takes 1-3 business days for our team to review
                                your request. Please stay alert of any call from our team at +855 23 456 789</em>
                            <br>
                            <hr>

                            <h1>Organization Information</h1>
                            <br>
                            <h5>Your Organization</h5>
                            <br>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="organizationName" class="form-label">Organization Name <span
                                            style="color:red">*</span></label>
                                    <input v-model="payload.orgName" type="text" class="form-control"
                                        id="organizationName" placeholder="Enter organization name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="organizationType" class="form-label">Organization Type <span
                                            style="color:red">*</span></label>

                                    <select class="form-control" id="organizationType" v-model="payload.orgType" required>
                                        <option value="nonprofit">Non-Profit</option>
                                        <option value="corporate">Corporate</option>
                                        <option value="government">Government</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="organizationName" class="form-label">Organization Email <span
                                            style="color:red">*</span></label>
                                    <input v-model="payload.orgEmail" type="text" class="form-control"
                                        id="organizationName" placeholder="Enter organization Email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="organizationType" class="form-label">Organization Phone Number <span
                                            style="color:red">*</span></label>
                                    <input v-model="payload.orgPhone" type="text" class="form-control"
                                        id="organizationName" placeholder="Enter organization Phone Number" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="organizationName" class="form-label">Organization Address <span
                                            style="color:red">*</span></label>
                                    <input v-model="payload.orgAddress" type="text" class="form-control"
                                        id="organizationName" placeholder="Enter organization Email" required>
                                </div>
                            </div>
                            <br>
                            <hr>

                            <h1>Contact Information</h1>
                            <br>
                            <h5>In case of problems our team will reach out to this contact</h5>
                            <br>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="fullName" class="form-label">Full Name <span
                                            style="color:red">*</span></label>
                                    <input v-model="payload.fullName" type="text" class="form-control" id="fullName"
                                        placeholder="Enter Your Fullname" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span
                                            style="color:red">*</span></label>
                                    <input v-model="payload.email" type="text" class="form-control" id="fullName"
                                        placeholder="Enter Your Email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number <span
                                        style="color:red">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">+855</span>
                                    <input v-model="payload.phoneNumber" type="tel" class="form-control"
                                        id="phoneNumber" placeholder="Enter Your Phone Number" pattern="[0-9]{8,10}"
                                        required aria-describedby="phoneHelp">
                                </div>
                            </div>
                            <br>
                            <hr>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button @click="validate()" class="btn btn-primary px-5">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Submission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <h5>Popover in a modal</h5> --}}
                        <p>
                        <h6>You are about to submit the following information:</h6>
                        <small><em>This action cannot be reverted once submit</em></small>
                        </p>
                        <hr>
                        <h5 class="pb-3">Organization Information</h5>
                        <div class="row">
                            <p class="col-6 pb-3">Organization Name:
                                <br><span class="fw-bold">@{{ payload.orgName }}</span>
                            </p>

                            <p class="col-6 pb-3">Organization Type:
                                <br><span class="fw-bold">@{{ payload.orgType }}</span>
                            </p>
                        </div>
                        <div class="row">
                            <p class="col-6 pb-3">Organization Email:
                                <br><span class="fw-bold">@{{ payload.orgAddress }}</span>
                            </p>

                            <p class="col-6 pb-3">Organization Phone Number:
                                <br><span class="fw-bold">@{{ payload.orgPhone }}</span>
                            </p>
                        </div>
                        <div class="row">
                            <p class="col-12 pb-3">Organization Phone Number:
                                <br><span class="fw-bold">@{{ payload.orgPhone }}</span>
                            </p>
                        </div>

                        <hr>
                        <div class="pb-3">
                            <h5>Individual Information</h5>
                            <small><em>This information will be used to contact</em></small>
                        </div>

                        <div class="row">
                            <p class="col-6 pb-3">Full Name:
                                <br><span class="fw-bold">@{{ payload.fullName }}</span>
                            </p>

                            <p class="col-6 pb-3">Email:
                                <br><span class="fw-bold">@{{ payload.email }}</span>
                            </p>
                        </div>
                        <div class="row">
                            <p class="col-12 pb-3">Phone Number:
                                <br><span class="fw-bold">@{{ payload.phoneNumber }}</span>
                            </p>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button @click="submitForm()" type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="module">
        new Vue({
            el: "#app",
            data: {
                payload: {
                    orgName: '',
                    orgType: '',
                    orgAddress: '',
                    orgEmail: '',
                    orgPhone: '',
                    fullName: '',
                    email: '',
                    phoneNumber: '',
                },
                validator: false

            },
            mounted() {},
            methods: {
                async submitForm() {
                    await axios.post('/become-a-partner', this.payload)
                        .then((response) => {
                            if (response.data.success) {
                                Swal.fire({
                                    title: "Request Submitted",
                                    text: "You will hear back from us shortly!",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                    // window.location.reload()
                                });
                            }
                        })
                        .catch((error) => {
                            Swal.fire({
                                title: "Womp Womp",
                                text: "Something Went Wrong. We will try to fix it as soon as possible.",
                                icon: "error"
                            })
                            console.log(error);
                        })
                },
                validate() {
                    for (let field in this.payload) {
                        if (this.payload[field] == '') {
                            this.validator = false
                            break
                        } else {
                            this.validator = true
                        }
                    }
                    if (this.validator) {
                        $('#exampleModal').modal('show');
                        return
                    }
                }
            }
        })
    </script>


@endsection
