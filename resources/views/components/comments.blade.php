<section class="relative overflow-hidden bg-zinc-100 border-2 border-gray mt-5">
    <div class="mt-0 flex items-center gap-x-4 text-xs">
        <time datetime="{{ $comment->created_at->toAtomString() }}" class="text-gray-500">
            {{ $comment->created_at->diffForHumans() }}
        </time>
    </div>
    <div class="mx-auto max-w-2xl lg:max-w-4xl">
        <figure class="mt-4">
            <blockquote class="text-center text-base font-normal text-gray-900 sm:text-base">
                <p>{{ $comment->body }}</p>
            </blockquote>
            <figcaption class="mt-1">
                <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                    <div class="italic text-gray-900">- {{ $comment->name }} -</div>
                </div>
            </figcaption>
        </figure>
    </div>
    <form method="POST" action="{{ route('comment.delete', ['comment' => $comment]) }}">
        @csrf
        @method('DELETE')    
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-red-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete Comment</button>
        </div>
    </form>

    

</section>
