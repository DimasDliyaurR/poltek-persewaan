<?php

namespace App\Services\handler\Midtrans;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Midtrans\Notification;

class Callback extends Midtrans
{
    protected $notification;
    protected $order;
    protected $serverKey;
    protected $model;

    public function __construct($model)
    {
        parent::__construct();

        $this->serverKey = config('midtrans.server_key');
        $this->model = $model;
        $this->_handleNotification();
    }

    public function isSignatureKeyVerified()
    {
        return ($this->_createLocalSignatureKey() == $this->notification->signature_key);
    }

    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraudStatus = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;

        return ($statusCode == 200 && $fraudStatus && ($transactionStatus == 'capture' || $transactionStatus == 'settlement'));
    }

    public function isExpire()
    {
        return ($this->notification->transaction_status == 'expire');
    }

    public function isCancelled()
    {
        return ($this->notification->transaction_status == 'cancel');
    }

    public function getNotification()
    {
        return $this->notification;
    }

    public function getOrder()
    {
        return $this->order;
    }

    protected function _createLocalSignatureKey()
    {
        $notification = new Notification();

        $orderId = $this->order->number;
        $statusCode = $this->notification->status_code;
        $grossAmount = $this->order->total_price;
        $serverKey = $this->serverKey;
        $input = $orderId . $statusCode . $grossAmount . $serverKey;
        $signature = openssl_digest($input, 'sha512');

        return $signature;
    }

    protected function _handleNotification()
    {
        $notification = new Notification();

        $orderNumber = $notification->order_id;
        $order = DB::table($this->model)->where('id', $orderNumber)->first();

        $this->notification = $notification;
        $this->order = $order;
    }
}
