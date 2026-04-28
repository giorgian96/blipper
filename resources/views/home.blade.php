<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @forelse ($blips as $blip)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold"> {{ $blip->user ? $blip->user->name : 'Anonymous' }}</div>
                        <div class="mt-1">{{ $blip->message }}</div>
                        <div class="text-sm text-gray-500 mt-2">
                            {{ $blip->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No blips yet. Be the first to blip!</p>
        @endforelse
    </div>
</x-layout>