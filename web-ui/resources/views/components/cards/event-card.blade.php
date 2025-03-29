@props(['event'])

<div class="col-lg-4">
    <div class="ticket-item">
        <div class="thumb">
            <img src="{{ asset($event['image'] ?? 'https://via.placeholder.com/300x200') }}" alt="Event Image" />
            <div class="price">
                <span>1 ticket<br />from <em>${{ $event['price'] ?? 'N/A' }}</em></span>
            </div>
        </div>
        <div class="down-content">
            <span>There Are {{ $event['tickets_left'] ?? 'N/A' }} Tickets Left For This Show</span>
            <h4>{{ $event['title'] ?? 'Event Name' }}</h4>
            <ul>
                <li>
                    <i class="fa fa-clock-o"></i> {{ $event['time'] ?? 'Time Not Available' }}
                </li>
                <li>
                    <i class="fa fa-map-marker"></i> {{ $event['location'] ?? 'Location Not Available' }}
                </li>
            </ul>
            <div class="main-dark-button">
                <a href="{{ $event['link'] ?? '#' }}">Purchase Tickets </a>
            </div>
        </div>
    </div>
</div>
