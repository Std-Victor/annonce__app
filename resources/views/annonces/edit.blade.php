@extends('layouts.main')
@section('title', 'Edit Annonce')
@section('content')
<main class="overflow-x-auto w-full py-12 ">
  <div class="mx-auto  w-2/5 mt-16 px-6 pb-4 border border-gray-400/50 rounded-md shadow-lg shadow-gray-500/50 relative">
    <form action="{{ route('annonces.update', $annonce) }}" method="POST" class="grid gap-y-6 py-5">
      @csrf 
      @method('put')
      @include('annonces._form')
    </form>
</div>
</main>
@endsection