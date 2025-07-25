<div class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Rooms</h2>
                    <p>Discover our comfortable and luxurious rooms designed for your perfect stay</p>
                </div>
            </div>
        </div>
        <div class="row">
            @if($rooms && $rooms->count() > 0)
                @foreach($rooms as $room)
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure>
                                @if($room->image)
                                    <img src="{{ asset('images/rooms/' . $room->image) }}" alt="{{ $room->room_title }}" style="width: 100%; height: 250px; object-fit: cover;"/>
                                @else
                                    <img src="images/room1.jpg" alt="{{ $room->room_title }}" style="width: 100%; height: 250px; object-fit: cover;"/>
                                @endif
                            </figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{ $room->room_title }}</h3>
                            <p>{{ Str::limit($room->description, 100) }}</p>
                            <div class="room-details" style="margin-top: 15px;">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <span class="price" style="font-size: 18px; font-weight: bold; color: #f1c40f;">
                                        ${{ number_format($room->price, 2) }}/night
                                    </span>
                                    <span class="room-type" style="background: #3498db; color: white; padding: 3px 8px; border-radius: 12px; font-size: 12px;">
                                        {{ ucfirst($room->room_type) }}
                                    </span>
                                </div>
                                <div style="margin-top: 8px; font-size: 14px; color: #666;">
                                    <span><i class="fa fa-users"></i> {{ $room->capacity }} {{ $room->capacity == 1 ? 'Guest' : 'Guests' }}</span>
                                    @if($room->wifi)
                                        <span style="margin-left: 15px;"><i class="fa fa-wifi"></i> Free WiFi</span>
                                    @endif
                                </div>
                                <button class="btn btn-primary" style="width: 100%; margin-top: 10px; background: #e74c3c; border: none;">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Fallback content if no rooms available -->
                <div class="col-md-4 col-sm-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure><img src="images/room1.jpg" alt="#"/></figure>
                        </div>
                        <div class="bed_room">
                            <h3>Sample Room</h3>
                            <p>No rooms available at the moment. Please check back later or contact us for more information.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        @if($rooms && $rooms->count() >= 6)
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 30px;">
                <a href="#" class="btn btn-outline-primary btn-lg" style="padding: 12px 30px; font-size: 16px;">
                    View All Rooms
                </a>
            </div>
        </div>
        @endif
    </div>
</div>