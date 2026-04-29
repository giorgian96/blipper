@props(['blip'])

<div class="card bg-base-100 shadow mb-4">
    <div class="card-body">
        <div class="flex space-x-3">
            @if($blip->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($blip->user->name) }}"
                             alt="{{ $blip->user->name }}'s avatar"
                             class="rounded-full" />
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://ui-avatars.com/api/?name=Anonymous"
                        alt="Anonymous User"
                        class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1 ml-2">
                <div class="flex justify-between w-full">
                    <div class="flex items-center space-x-1">
                        <span class="text-sm font-semibold">{{ $blip->user ? $blip->user->name : 'Anonymous' }}</span>
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60">{{ $blip->created_at->diffForHumans() }}</span>
                        @if ($blip->updated_at->gt($blip->created_at->addSeconds(5)))
                            <span class="text-base-content/60">·</span>
                            <span class="text-sm text-base-content/60 italic">edited</span>
                        @endif
                    </div>

                    <div class="flex gap-1">
                        <a href="/blips/{{ $blip->id }}/edit" class="btn btn-ghost btn-xs">
                            Edit
                        </a>
                        <form method="POST" action="/blips/{{ $blip->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this blip?')"
                                class="btn btn-ghost btn-xs text-error">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <p class="mt-1">
                    {{ $blip->message }}
                </p>
            </div>
        </div>
    </div>
</div>