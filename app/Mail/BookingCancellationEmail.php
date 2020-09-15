<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCancellationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $cause;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cause)
    {
        $this->cause= $cause;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('BusTicketBooking@gmail.com', 'Bus Ticket Booking')
                    ->subject('Booking Cancellation')
                    ->markdown('emails.bookingCancelled');
    }
}
