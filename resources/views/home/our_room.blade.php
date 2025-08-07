<style>
    .our_room {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .our_room .titlepage h2 {
        font-size: 42px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .our_room .titlepage p {
        font-size: 18px;
        color: #666;
        text-align: center;
        margin-bottom: 50px;
    }
    
    .room {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .room:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .room_img img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .room:hover .room_img img {
        transform: scale(1.05);
    }
    
    .bed_room {
        padding: 25px;
    }
    
    .bed_room h3 {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }
    
    .bed_room p {
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    .price {
        font-size: 20px !important;
        font-weight: bold !important;
        color: #f1c232 !important;
    }
    
    .room-type {
        background: linear-gradient(135deg, #3498db, #2980b9) !important;
        color: white !important;
        padding: 5px 12px !important;
        border-radius: 15px !important;
        font-size: 12px !important;
        font-weight: 600 !important;
    }
    
    .btn {
        transition: all 0.3s ease;
        font-weight: 600;
        border-radius: 8px;
        padding: 12px 20px;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    
    .room-details {
        margin-top: 20px;
    }
    
    .room-details > div:first-child {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .room-details > div:nth-child(2) {
        margin-bottom: 20px;
        font-size: 14px;
        color: #666;
    }
    
    .room-details > div:nth-child(2) span {
        margin-right: 20px;
    }
</style>

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
                                <div style="display: flex; gap: 10px; margin-top: 10px;">
                                    <a href="{{ route('room.details', $room->id) }}" class="btn btn-info" style="width: 100%; background: #17a2b8; border: none; text-decoration: none; color: white; display: inline-block; text-align: center; padding: 12px 16px; border-radius: 4px;">
                                        View Details
                                    </a>
                                </div>
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