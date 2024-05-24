<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Locked;
use App\Livewire\Forms\UlasanForm;
use Illuminate\Support\Facades\DB;
use App\Livewire\Forms\LikeOrDislikeForm;

class Ulasan extends Component
{

    public UlasanForm $form;

    public $slug;
    public $slugColumn;
    public string $masterData = "";
    public string $ratingData = "";
    public string $likeTable = "";

    public $id;

    public function mount($slug, $master, $rating, $slugColumn)
    {
        $this->slugColumn = $slugColumn;
        $this->slug = $slug;
        $this->masterData = $master;
        $this->ratingData = $rating;
    }

    public function like()
    {
        // dd(!isset(auth()->user()->id));
        if (!isset(auth()->user()->id)) {
            return redirect("/login");
        } else {
            $oldData = DB::table("like_" . $this->masterData)->where("rating_" . rtrim($this->masterData, "s") . "_id", $this->id)->where("user_id", auth()->user()->id)->first();

            if ($oldData != null) {
                DB::table("like_" . $this->masterData)->whereId($oldData->id)->update([
                    "is_like" => 0
                ]);
            }
        }

        DB::table("like_" . $this->masterData)->insert([
            "rating_" . rtrim($this->masterData, "s") . "_id" => $this->id,
            "user_id" => auth()->user()->id,
            "is_like" => 1,
        ]);
    }

    public function dislike()
    {
        if (!isset(auth()->user()->id)) {
            return redirect("/login");
        } else {
            $oldData = DB::table("like_" . $this->masterData)->where("rating_" . rtrim($this->masterData, "s") . "_id", $this->id)->where("user_id", auth()->user()->id)->first();
            if ($oldData != null) {
                DB::table("like_" . $this->masterData)->whereId($oldData->id)->update([
                    "is_like" => 0
                ]);
            }
        }

        DB::table("like_" . $this->masterData)->insert([
            "rating_" . rtrim($this->masterData, "s") . "_id" => $this->id,
            "user_id" => auth()->user()->id,
            "is_like" => 0,
        ]);
    }

    public function save()
    {
        if (!isset(auth()->user()->id)) {
            return redirect("/login");
        }

        $this->form->validate();
        $slug_data = DB::table($this->masterData)->select("id")->where($this->slugColumn, $this->slug)->first();

        DB::table($this->ratingData)->insert([
            rtrim($this->masterData, "s") . "_id" => $slug_data->id,
            "user_id" => auth()->user()->id,
            "nilai" => $this->form->nilai,
            "ulasan" => $this->form->ulasan,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        $this->form->reset();
    }

    public function render()
    {
        $rating = DB::table("rating_" . $this->masterData)
            ->join($this->masterData, "rating_" . $this->masterData . "." . rtrim($this->masterData, "s") . "_id", "=", $this->masterData . "." . "id")
            ->join("users", "user_id", "=", "users.id")->where($this->masterData . "." . $this->slugColumn, "=", $this->slug)->get();


        return view('livewire.ulasan', [
            "rating" => $rating,
        ]);
    }
}
