<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Edit Kategori Aset') }} - {{ $category->name }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- Nama Kategori -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nama Kategori')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $category->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-800 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition">
                        <span class="mr-2">➕</span>
                        Tambah Kategori Baru
                    </a>
                    
                    <div class="flex items-center gap-4">
                        <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-900">Batal</a>
                        <x-primary-button>
                            {{ __('Update Kategori') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</x-app-layout>