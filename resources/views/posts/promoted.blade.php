@extends('layouts.app')

@section('content')
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @if ($promotedPosts->isEmpty())
          <p>No promoted posts found.</p>
        @else
          @foreach ($promotedPosts as $post)
              <x-post :post="$post" />
          @endforeach
        @endif
      </div>
      <div class="mt-10">
        {{ $promotedPosts->links() }}
      </div>
    </div>
  </div>

@endsection
