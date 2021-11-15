<?php

namespace App\Observers;

use App\Models\TypeFood;
use App\Models\User;

class TypeFoodObserver
{

    public function creating(TypeFood $typeFood)
    {
        $this->setAction($typeFood, 'created_by');
    }


    /**
     * Handle the TypeFood "created" event.
     *
     * @param TypeFood $typeFood
     *
     * @return void
     */
    public function created(TypeFood $typeFood)
    {
        //
    }


    /**
     * Handle the TypeFood "updated" event.
     *
     * @param TypeFood $typeFood
     *
     * @return void
     */
    public function updated(TypeFood $typeFood)
    {
        $this->setAction($typeFood, 'updated_by');
    }


    /**
     * Handle the TypeFood "deleted" event.
     *
     * @param TypeFood $typeFood
     *
     * @return void
     */
    public function deleted(TypeFood $typeFood)
    {
        $this->setAction($typeFood, 'deleted_by');
    }


    /**
     * Handle the TypeFood "restored" event.
     *
     * @param TypeFood $typeFood
     *
     * @return void
     */
    public function restored(TypeFood $typeFood)
    {
        //
    }


    /**
     * Handle the TypeFood "force deleted" event.
     *
     * @param TypeFood $typeFood
     *
     * @return void
     */
    public function forceDeleted(TypeFood $typeFood)
    {
        //
    }


    private function setAction(TypeFood $typeFood, string $field)
    {
        if (auth()->check()) {
            $typeFood->{$field} = auth()->id();
        } else {
            $typeFood->{$field} = request()->get('user_id', User::query()
                                                                  ->select('id')
                                                                  ->inRandomOrder()
                                                                  ->value('id'));
        }
    }
}
