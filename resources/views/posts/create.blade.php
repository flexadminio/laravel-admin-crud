<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Create Post') }}
    </h2>
  </x-slot>
  @if (session('status'))
    <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
    </div>
  @endif
  <div class="max-w-7xl mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
    <div class="sm:max-w-md ">
      <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        <div>
          <x-input-label for="title" :value="__('Title')" />
          <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" />
          @error('title')
            <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <x-input-label for="description" :value="__('Description')" />
          <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" />
          @error('description')
            <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="flex items-center gap-4">
          <x-primary-button>{{ __('Save') }}</x-primary-button>
          <a href="/posts" class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">Back</a>
        </div>
      </form>
    </div>
</x-app-layout>