<input type="hidden" name="id" value="{{ $annonce->id ?? 00 }}" />

<div>
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900"
        >Titre</label
    >
    <input
        type="text"
        id="nom"
        name="titre"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none 
        @error('nom') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
        placeholder="Vente d'un appartement..."
        value="{{ $annonce->titre ?? old('titre') }}"
    />
    @error('titre')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900"
        >Description</label
    >
    <textarea name="description" id="desc" rows="4" class="block p-2.5 w-full text-sm outline-none text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Write your thoughts here...">
      {{ $annonce->description ?? old('description') }}
    </textarea>
    @error('description')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="filiere" class="block mb-2 text-sm font-medium text-gray-900"
        >Type</label
    >
    <select
        name="type"
        id="filiere"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
    >
      @foreach ($type_list as $item )
        <option @if(isset($annonce) and $item === $annonce->type) selected @endif value="{{ $item }}"> {{ $item }} </option>
      @endforeach
    </select>
</div>
<div>
  <label for="name" class="block mb-2 text-sm font-medium text-gray-900"
      >Ville</label
  >
  <input
      type="text"
      id="nom"
      name="ville"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none 
      @error('ville') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
      placeholder="Casablanca"
      value="{{ $annonce->ville ?? old('ville') }}"
  />
  @error('ville')
  <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
  @enderror
</div>
<div>
  <label for="name" class="block mb-2 text-sm font-medium text-gray-900"
      >Superficie</label
  >
  <input
      type="number"
      id="nom"
      name="superficie"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none 
      @error('nom') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
      placeholder="200"
      value="{{ $annonce->superficie ?? old('superficie') }}"
  />
  @error('superficie')
  <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
  @enderror
</div>
<div>
  <label class="inline-flex items-center cursor-pointer relative">
    <input type="checkbox" value="1" name="neuf" @if($annonce->neuf ?? old("neuf")) checked @endif class="sr-only peer">
    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none  outline-none  rounded-full  peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600 "></div>
    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Etat Neuf</span>
  </label>
</div>
<div>
  <label for="prix" class="block mb-2 text-sm font-medium text-gray-900"
      >Prix</label
  >
  <input
      type="text"
      id="prix"
      name="prix"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 outline-none 
      @error('nom') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
      placeholder="1200000,00"
      value="{{ $annonce->prix ?? old('prix') }}"
  />
  @error('prix')
  <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
  @enderror
</div>
<div class="w-2/5 flex gap-3 mt-3 justify-center">
    <button
        type="button"
        class="flex items-center gap-3 font-medium text-white bg-gradient-to-r rounded-md from-slate-400 to-gray-700 px-8 py-2 shadow-lg shadow-gray-500/50 hover:bg-gradient-to-br"
        onclick="window.location.href='{{ route('annonces.index') }}'"
    >
        Cancel
    </button>
    <button
        type="submit"
        name="action"
        value="update"
        class="flex items-center gap-3 font-medium text-white bg-gradient-to-r rounded-md from-emerald-400 to-green-700 px-8 py-2 shadow-lg shadow-green-500/50 hover:bg-gradient-to-br"
    >
        Save
    </button>
</div>
