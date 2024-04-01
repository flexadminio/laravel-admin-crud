<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Post') }}
    </h2>
  </x-slot>

  <div class="pt-5">
    <div class="max-w-7xl mx-auto space-y-6">
      <div class="sm:p-8">
        <a class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150"
          href="{{ route('posts.create') }}"> Create Post</a>
      </div>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-5">
      <div class=" bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">
        <p>{{ $message }}</p>
        </span>
      </div>
    </div>
  @endif

  <div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

        <table class="table-auto w-full">
          <tr>
            <th class="border py-2">ID</th>
            <th class="border">Title</th>
            <th class="border">Description</th>
            <th class="border" width="280px">Action</th>
          </tr>
          @foreach ($posts as $nts)
            <tr>
              <td class="border text-center">{{ $nts->id }}</td>
              <td class="border p-2">{{ $nts->title }}</td>
              <td class="border p-2">{{ $nts->description }}</td>
              <td class="border p-2 text-center">
                <form action="{{ route('posts.destroy', $nts->id) }}" method="Post">
                  <a class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150"
                    href="{{ route('posts.edit', $nts->id) }}">Edit</a>
                  @csrf
                  @method('DELETE')

                  <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
  {!! $posts->links() !!}
</x-app-layout>
