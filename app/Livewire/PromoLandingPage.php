<?php

namespace App\Livewire;

use App\Services\Promo\PromoService;
use Livewire\Component;

class PromoLandingPage extends Component
{
    public $kategori = "";

    public function render(PromoService $promoService)
    {
        switch ($this->kategori) {
            case 'kendaraans':
                $promo = $promoService->getValidatedKategoriPromo($this->kategori)->get();
                break;
            case 'gedung_laps':
                $promo = $promoService->getValidatedKategoriPromo($this->kategori)->get();
                break;
            case 'layanans':
                $promo = $promoService->getValidatedKategoriPromo($this->kategori)->get();
                break;
            case 'alat_barangs':
                $promo = $promoService->getValidatedKategoriPromo($this->kategori)->get();
                break;
            case 'asramas':
                $promo = $promoService->getValidatedKategoriPromo($this->kategori)->get();
                break;

            default:
                $promo = $promoService->getAllValidatedPromo()->get();
                break;
        }

        return view('livewire.promo-landing-page', [
            "promo" => $promo,
        ]);
    }
}
