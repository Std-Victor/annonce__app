@extends('layouts.main')
@section('title', 'All Annonces')
@section('content')
<main>
  <div class="overflow-x-auto w-full py-12">
    <div class="mx-auto w-4/5 flex justify-between items-center px-5 pb-4">
      <div>
        <h1 class="text-lg font-semibold my-2">All annonces</h1>
        <p class="text-gray-500 text-base">La liste de tous les annonces y compris leur titre, description, type, ville, superficie en m<sup>2</sup>, etat et sa prix en (dhs).</p>
      </div>
      <button type="button" class="font-medium text-white bg-gradient-to-r rounded-md from-cyan-500 to-blue-700 px-4 py-3 shadow-lg shadow-blue-500/50 hover:bg-gradient-to-br" onclick="window.location.href='{{ route('annonces.create') }}'">Add Annonce</button>
    </div>
    @if ($message = session('message'))
      <div class="mx-auto w-4/5 flex p-4 my-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Success alert!</span> {{ $message }}
        </div>
      </div>
    @endif
      <table
          class="mx-auto w-4/5 text-sm text-left text-gray-500 rounded-md overflow-hidden"
      >
          <thead
              class="text-sm font-medium text-white bg-gray-400"
          >
              <tr>
                  <th scope="col" class="px-6 py-3 w-44 ">Titre</th>
                  <th scope="col" class="px-6 py-3">Description</th>
                  <th scope="col" class="px-6 py-3 w-40">Type</th>
                  <th scope="col" class="px-6 py-3 w-40">Ville</th>
                  <th scope="col" class="px-6 py-3 w-40">Superficie (m<sup>2</sup>)</th>
                  <th scope="col" class="px-6 py-3 w-40">Etat</th>
                  <th scope="col" class="px-6 py-3 w-40">Prix (dhs)</th>
                  <th scope="col" class="px-6 py-3 w-44">Action</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($annonces as $anc )
              <tr class="bg-white border-b">
                <td
                  scope="row"
                  class="px-6 py-2 font-medium text-gray-900  w-44 "
                >
                  {{ $anc->titre }}
                </td>
                <td class="px-6 py-2"> {{ implode(' ', array_slice(explode(' ',$anc->description), 0,12)) }}... </td>
                <td class="px-6 py-2"> {{ $anc->type }} </td>
                <td class="px-6 py-2"> {{ $anc->ville }} </td>
                <td class="px-6 py-2"> {{ $anc->superficie }} </td>
                <td class="px-6 py-2"> {{ $anc->neuf ? 'Neuf' : 'Ancien'  }} </td>
                <td class="px-6 py-2"> {{ $anc->prix }} </td>
                <td class="px-6 py-2 gap-1 w-40 ">
                  <button type="button" class="px-2 py-1 hover:text-blue-600 hover:drop-shadow-lg " onclick="window.location.href='{{ route('annonces.show', $anc->id ) }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>                                                   
                  </button>
                  <button type="button" class="px-2 py-1 hover:text-green-600 hover:drop-shadow-lg " onclick="window.location.href='{{ route('annonces.edit', $anc) }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>                                
                  </button>
                  <form class="inline " action="{{ route('annonces.destroy', $anc) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('delete')
                  <button type="submit" class="px-2 py-1 hover:text-red-600 hover:drop-shadow-lg ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>                                
                  </button>
                </form>
                </td>
              </tr>
              @empty
                <tr>
                  <td colspan="4">No Data Founded</td>
                </tr>
              @endforelse
          </tbody>
      </table>
  </div>
</main>
@endsection