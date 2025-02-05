<?php

namespace Shopper\Framework\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;
use Shopper\Framework\Models\Shop\Review;

class DeleteReview extends ModalComponent
{
    public int $reviewID;

    public function mount(int $reviewID)
    {
        $this->reviewID = $reviewID;
    }

    public function delete()
    {
        Review::query()->find($this->reviewID)->delete();

        session()->flash('success', __('shopper::pages/products.reviews.modal.success_message'));

        $this->redirectRoute('shopper.reviews.index');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public function render()
    {
        return view('shopper::livewire.modals.delete-review');
    }
}
