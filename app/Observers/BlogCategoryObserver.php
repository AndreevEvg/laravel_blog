<?php

namespace App\Observers;

use App\Models\BlogCategory;

class BlogCategoryObserver
{
    /**
     * Handle the BlogCategory "created" event.
     *
     * @param BlogCategory $BlogCategory
     * @return void
     */
    public function created(BlogCategory $BlogCategory)
    {
        //
    }

    /**
     * @param BlogCategory $blogCategory
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    /**
     * Если поле слаг пустое, то заполняем его конвертацией заголовка
     *
     * @param BlogCategory $blogCategory
     */
    protected function setSlug(BlogCategory $blogCategory)
    {
        if(empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }

    /**
     * Handle the BlogCategory "updated" event.
     *
     * @param BlogCategory $BlogCategory
     * @return void
     */
    public function updated(BlogCategory $BlogCategory)
    {
        //
    }

    /**
     * @param BlogCategory $blogCategory
     */
    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    /**
     * Handle the BlogCategory "deleted" event.
     *
     * @param BlogCategory $BlogCategory
     * @return void
     */
    public function deleted(BlogCategory $BlogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "restored" event.
     *
     * @param BlogCategory $BlogCategory
     * @return void
     */
    public function restored(BlogCategory $BlogCategory)
    {
        //
    }

    /**
     * Handle the BlogCategory "force deleted" event.
     *
     * @param BlogCategory $BlogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $BlogCategory)
    {
        //
    }
}
