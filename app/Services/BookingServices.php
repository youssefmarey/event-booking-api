<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Booking;
use Exception;
use Illuminate\Support\Facades\DB;

class BookingServices
{
    /**
     * Create a new class instance.
     */
    public $booking;

    public function bookEvent(int $userId , int $eventId , int $quantity ){
        DB::transaction(function ()use($userId , $eventId , $quantity){
            $event = Event::lockforUpdate()->findOrFail($eventId);

            if($event->available_seats < $quantity){
                throw new Exception('Sorry! the quantity you selected is not available');
            }

            $event->decrement('available_seats', $quantity);

            $booking = Booking::create([
                'user_id' => auth()->id(),
                'event_id' => $eventId,
                'quantity' => $quantity,
                'status' => 'pending',
                'total_price' => $event->price * $quantity,                
            ]);

            $this->booking = $booking;
        });
        return $this->booking;
    }

    public function updateBooking(int $bookingId , array $data) {
        DB::transaction(function ()use($bookingId , $data){
            $booking = Booking::lockforUpdate()->findOrFail($bookingId);
            $event = Event::lockforUpdate()->findOrFail($booking->event_id);
            $event->increment('available_seats', $booking->quantity);
            $event->decrement('available_seats', $data['quantity']);
            $booking->update([
                'quantity' => $data['quantity'],
                'total_price' => $event->price * $data['quantity'],
            ]);
            $this->booking = $booking;
        });
        return $this->booking;
    }
}
