<?php

namespace App\Http\Controllers\api;

use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\handler\Midtrans\Callback;

class ApiController extends Controller
{
    public function getMerkKendaraanBySlug($slug)
    {
        $slugs = explode(",", $slug);
        $merkKendaraan = MerkKendaraan::with("kendaraans");

        foreach ($slugs as $key => $value) {
            $merkKendaraan->orWhere("mk_slug", $value);
        }

        return response()->json($merkKendaraan->get());
    }

    public function callback()
    {
        $callback = new Callback();

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();
            $category = $callback->model;

            if ($callback->isSuccess()) {
                DB::table($category)->where('code_unique', $order->id)->update([
                    'status' => "terbayar",
                ]);
            }

            if ($callback->isExpire()) {
                DB::table($category)->where('code_unique', $order->id)->update([
                    'status' => "kadaluarsa",
                ]);
            }

            if ($callback->isCancelled()) {
                DB::table($category)->where('code_unique', $order->id)->update([
                    'status' => "batal",
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}
