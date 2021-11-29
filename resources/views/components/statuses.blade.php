@foreach ($statuses as $status)
  <x-card>
    <div class="flex">
      <div class="flex-shrink-0 mr-3">
        <img class="h-15 w-15 rounded-full" src="{{ $status->user->gravatar() }}" alt="{{ $status->user->name }}">
      </div>
      <div>
        <div class="font-semibold">
          {{ $status->user->name }}
        </div>
        <div class="leading-relaxed">
          {{ $status->body }}
        </div>
        <div class="text-sm text-gray-600">
          {{ $status->created_at->diffForHumans() }}
        </div>
      </div>
    </div>
  </x-card>
@endforeach
