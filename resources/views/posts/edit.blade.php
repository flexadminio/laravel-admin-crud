<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Edit Post') }}
    </h2>
  </x-slot>

  @if (session('status'))
    <div class="bg-red-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ session('status') }}</span>
    </div>
  @endif
  <div class="max-w-7xl mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
    <div class=" sm:max-w-md ">
      <form action="{{ route('posts.update', $post->id) }}" method="POST" class="mt-6 space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
          <x-input-label for="title" :value="__('Title')" />
          <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
            value="{{ $post->title }}" />
          @error('title')
            <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <x-input-label for="description" :value="__('Description')" />
          <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
            value="{{ $post->description }}" />
          @error('description')
            <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="flex items-center gap-4">
          <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
