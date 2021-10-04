<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id_ckeck, $name, $address, $phone, $email, $totalPrice;
    public function __construct($id_ckeck, $name, $address, $phone, $email, $totalPrice)
    {
        //
        $this->id_ckeck = $id_ckeck;
        $this->address = $address;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->from('duongmanh.lee@gmail.com', 'DUONGMANHSHOP')->subject('Đơn hàng xác nhận ngày ' . Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s'))->view('mailS.mail');
    }
}
