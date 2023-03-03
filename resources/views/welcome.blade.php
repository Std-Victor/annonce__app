@extends('layouts.main');
@section('content')
<div class="h-screen w-full grid place-items-center">
  <div class="w-48 border border-gray-400/50 h-48 rounded-md shadow-lg shadow-gray-500/50 grid place-items-center text-gray-600
  hover:bg-blue-600 hover:text-white hover:border-blue-600 hover:shadow-blue-500/50 cursor-pointer" onclick="window.location.href='{{ route('annonces.index') }}'">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zm-7.518-.267A8.25 8.25 0 1120.25 10.5M8.288 14.212A5.25 5.25 0 1117.25 10.5" />
    </svg>                        
  </div>
</div>
@endsection