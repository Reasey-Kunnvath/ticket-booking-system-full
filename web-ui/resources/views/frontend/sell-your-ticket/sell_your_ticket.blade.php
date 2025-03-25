

@extends('frontend.layout.master')
@section('title','Sell Your Ticket')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="container w-full">
                <div class="card card-style1 border-0">
                    <div class="card-body p-4 p-md-5 p-xl-6">
                        <form>
                            <h1>Event Creation Form</h1>
                            <br>
                            <h5>Create Your Own Event With Us!</h5>
                            <br>
                            <ul>
                                <li>Promote and pre-sell eTickets for your events on our platform!. app, no matter the size of your event or even if its are free.</li>
                                <li>Scan attendees at your event to admit them quickly and even check ID & vaccination status</li>
                                <li>Review detailed event insights with full access and sales visibility.</li>
                                <li>No need to print physical tickets</li>
                            </ul>
                            <br><hr>

                            <h1>Register Your Event</h1>
                            <br>
                            <h5>Your Organization</h5>
                            <br>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="organizationName" class="form-label">Organization Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="organizationName" placeholder="Enter organization name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="organizationType" class="form-label">Organization Type <span style="color:red">*</span></label>
                                    <select class="form-control" id="organizationType" required>
                                        <option value="">Select type</option>
                                        <option value="nonprofit">Non-Profit</option>
                                        <option value="corporate">Corporate</option>
                                        <option value="government">Government</option>
                                    </select>
                                </div>
                            </div>
                            <br><hr>

                            <h1>Contact Information</h1>
                            <br>
                            <h5>In case of problems our team will reach out to this contact</h5>
                            <br>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="fullName" class="form-label">Full Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="fullName" placeholder="Enter Your Fullname" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="fullName" placeholder="Enter Your Email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number <span style="color:red">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">+855</span>
                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="phoneNumber"
                                        placeholder="Enter Your Phone Number"
                                        pattern="[0-9]{8,10}"
                                        required
                                        aria-describedby="phoneHelp">
                                </div>
                            </div>
                            <br><hr>

                            <h1>About Event</h1>
                            <br>
                            <h5>Your Event Information</h5>
                            <br>
                            <div class="container">

                                    <div class="mb-3 row">
                                        <!-- Title -->
                                        <div class="col-md-12">
                                            <label for="eventTitle" class="form-label">Title <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="eventTitle" placeholder="Enter event title" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Subtitle -->

                                        <div class="col-md-6">
                                            <label for="organizationType" class="form-label">Event Category <span style="color:red">*</span></label>
                                            <select class="form-control" id="organizationType" required>
                                                <option value="">Select type</option>
                                                <option value="nonprofit">Sport</option>
                                                <option value="corporate">Concert</option>
                                                <option value="government">Conference</option>
                                            </select>
                                        </div>
                                        <!-- Event Date -->
                                        <div class="col-md-6">
                                            <label for="eventDate" class="form-label">Event Date <span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="eventDate" required>
                                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- Subtitle -->
                                        <div class="col-md-6">
                                            <label for="eventSubtitle" class="form-label">Event Venue <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="eventVenue" placeholder="Where does your event will be held?" required>
                                        </div>
                                        <!-- Event Date -->
                                        <div class="col-md-6">
                                            <label for="eventDate" class="form-label">Event Location Link (Preferably Google Maps)<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="eventVenue" placeholder="Paste the event map link here" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">

                                        <div class="col-md-6">
                                            <label for="eventImage" class="form-label">
                                                Upload Your Event Image (JPG, JPEG, PNG)<span style="color:red">*</span>
                                            </label>
                                            <input
                                                type="file"
                                                class="form-control mt-2"
                                                id="eventImage"
                                                accept=".jpg, .jpeg, .png"
                                                required
                                                onchange="previewImage(event)"
                                            >
                                                <br>
                                                <label   label for="eventPurpose" class="form-label">Event Purpose <span style="color:red">*</span></label>
                                                <textarea id="message" rows="10" class="form-control" placeholder="Write your event description" style="resize: none;"></textarea>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <label class="form-label">Preview</label>
                                            <div id="imagePreviewContainer" style="border: 1px dashed #ccc; padding: 10px; width: 540px; height: 364px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                                                <span class="text-muted" id="previewText">No image uploaded</span>
                                                <img id="imagePreview" src="" alt="Image Preview" style="display: none; max-height: 100%; max-width: 100%;">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">

                                        </div> --}}
                                    </div>
                                    <br><hr>

                                    <h1>Ticket Pricing</h1>
                                    <br>
                                    <h5>You can add ticket category and it's price here</h5>
                                    <br>

                                    <div class="container mt-4">
                                        <div id="ticketContainer">
                                            <!-- Dynamic ticket sections will be added here -->
                                        </div>
                                        <div class="border p-3 mt-3 text-white" style="border-style: dashed; background-color: rgba(108, 117, 125, 0.1);">
                                            <div class="text-center">
                                                <a id="addTicketBtn" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add Price</a>
                                            </div>
                                        </div>

                                    </div>



                                    <!-- Submit Button -->
                                    <div class="text-center mt-4">

                                            <button type="submit" class="btn btn-primary px-5">Complete</button>

                                    </div>

                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(event) {
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');
        const previewText = document.getElementById('previewText');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
                previewText.style.display = "none";
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
            previewText.style.display = "block";
        }
    }

        let ticketCount = 0;

        function addTicket() {
            ticketCount++;
            const ticketId = `ticket${ticketCount}`;
            const ticketSection = `
                <div class="mt-4 ticket-section" id="${ticketId}">
                    <div class="border border-primary p-3" style="border-style: dashed;">
                        <div class="text-center mb-2">
                            <div class="row align-items-center">
                                <div class="col">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#${ticketId}Collapse" aria-expanded="false" aria-controls="${ticketId}Collapse">
                                        Modify Ticket ${ticketCount}
                                    </a>
                                </div>
                                <div class="col-8">
                                    <h5 class="text-primary" id="${ticketId}Title">TICKET ${ticketCount} TITLE</h5>
                                    <h6 class="text-primary" id="${ticketId}Price">Price: $0</h6>
                                    <h6 class="text-primary" id="${ticketId}Date">Valid Date: </h6>
                                </div>
                                <div class="col">
                                    <a class="btn btn-danger ms-2" onclick="removeTicket('${ticketId}')"><i class="fa fa-trash"></i>&nbsp;Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="${ticketId}Collapse">
                            <div class="card card-body">
                                <form onsubmit="saveTicketTitle(event, '${ticketId}')">
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="ticketTitle${ticketCount}" class="form-label">Ticket Title <span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ticketTitle${ticketCount}" placeholder="Enter Ticket Title" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ticketPrice${ticketCount}" class="form-label">Ticket Price ($) <span style="color:red">*</span></label>
                                            <input type="number" class="form-control" id="ticketPrice${ticketCount}" placeholder="Enter price" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="ticketQuantity${ticketCount}" class="form-label">Quantity Available <span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="ticketQuantity${ticketCount}"
                                                    placeholder="Enter quantity"
                                                    required>
                                            </div>
                                        </div>                                                                                <div class="col-md-6">
                                            <label for="ticketValidDate${ticketCount}" class="form-label">Date Valid <span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="ticketValidDate${ticketCount}"
                                                    placeholder="Enter quantity"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-success" onclick="saveTicketTitle(event, '${ticketId}')">Save</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            `;
            $('#ticketContainer').append(ticketSection);
            updateTicketLabels();
        }

        // Function to save the ticket title
        function saveTicketTitle(event, ticketId) {
            event.preventDefault(); // Prevent default behavior
            const titleInput = $(`#${ticketId} input[type="text"]`).val(); // Get the ticket title
            const priceInput = $(`#${ticketId} input[type="number"]`).val(); // Get the ticket price
            const dateInput = $(`#${ticketId} input[type="date"]`).val(); // Get the ticket price
            $(`#${ticketId}Title`).text(titleInput || "EVENT TITLE"); // Update the title or fallback to "EVENT TITLE"
            $(`#${ticketId}Price`).text(`Price: $${priceInput || 0}`); // Update the price or fallback to 0
            $(`#${ticketId}Date`).text(`Valid Date: ${dateInput || ""}`); // Update the price or fallback to 0
        }

        // Function to remove the ticket
        function removeTicket(ticketId) {
            $(`#${ticketId}`).remove();
            ticketCount--;
            updateTicketLabels();
        }

        // Function to update ticket labels
        function updateTicketLabels() {
            let currentTicketNumber = 0;
            $('.ticket-section').each(function () {
                currentTicketNumber++;
                const ticketLink = $(this).find('.btn-primary');
                ticketLink.text(`Modify Ticket ${currentTicketNumber}`);
            });
        }

        // Event listener for the Add Ticket button
        $('#addTicketBtn').on('click', addTicket);
</script>


@endsection

