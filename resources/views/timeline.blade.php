<x-app-layout>
  <x-container>
    <div class="grid grid-cols-12 gap-6">
      <div class="col-span-7">
        <div class="border rounded-xl p-5 ">
          <form action="{{ route('status.store') }}" method="post">
            @csrf
            <div class="flex">
              <div class="flex-shrink-0 mr-3">
                <img class="h-15 w-15 rounded-full" src="{{ Auth::user()->gravatar() }}"
                  alt="{{ Auth::user()->name }}">
              </div>
              <div class="w-full">
                <div class="font-semibold">
                  {{ Auth::user()->name }}
                </div>
                <div class="my-2">
                  <textarea name="body" id="body" placeholder="What is on your mine ?"
                    class="w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"></textarea>
                </div>
                <div class="text-right">
                  <x-button>Post</x-button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="space-y-6 mt-5">
          <div class="space-y-5">
            <x-statuses :statuses="$statuses" />
          </div>
        </div>
      </div>
      <div class="col-span-5">
        <div class="border p-5 rounded-xl">
          <h1 class="font-semibold mb-5">Recently follows</h1>
          <div class="space-y-5">
            @foreach (Auth::user()->follows()->limit(5)->get()
    as $user)
              <div class="flex items-center">
                <div class="flex-shrink-0 mr-3">
                  <img class="h-15 w-15 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
                </div>
                <div>
                  <div class="font-semibold">
                    {{ $user->name }}
                  </div>
                  <div class="text-sm text-gray-600">
                    {{ $user->pivot->created_at->diffForHumans() }}
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </x-container>
</x-app-layout>
