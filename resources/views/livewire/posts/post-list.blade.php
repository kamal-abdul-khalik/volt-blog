<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\{Computed, Url};

new class extends Component {
    use WithPagination;

    #[Url]
    public $sort = "desc";
    public function setSort($sort)
    {
        $this->sort = $sort === "desc" ? "desc" : "asc";
    }
    #[Computed]
    public function posts()
    {
        return Post::published()
            ->orderBy("published_at", $this->sort)
            ->paginate(5);
    }
}; ?>

<div class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === "desc" ? "text-gray-900 border-b border-gray-700" : "text-gray-500" }} py-4"
                wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === "asc" ? "text-gray-900 border-b border-gray-700" : "text-gray-500" }} py-4"
                wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item wire:key='post-{{ $post->id }}' :post=$post />
        @endforeach
    </div>
    {{ $this->posts->onEachSide(1)->links() }}
</div>
