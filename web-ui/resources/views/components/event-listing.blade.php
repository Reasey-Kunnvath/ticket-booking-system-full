@props(['events', 'title'])

<div class="row">
    <div class="col-lg-12">
        <div class="heading">
            <h2>{{ $title }}</h2>
        </div>
    </div>
    @foreach ($events as $event)
        <x-cards.event-card :event="$event" />
    @endforeach
</div>
