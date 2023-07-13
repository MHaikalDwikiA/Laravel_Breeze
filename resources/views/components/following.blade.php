@foreach ($users as $user)
    <x-card>
        <div class="flex items-center">
            <div class="flex-shrink-0 mr-3">
                <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
            </div>
            <div>
                <div class="font-semibold">
                    {{ $user->name }}
                </div>
                <div class="mt-2">
                    @if(request()->routeIs('users.index'))
                <form action="{{ route('following.store', $user) }}" method="post">
                    @csrf
                    <x-button>
                        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                            UnFollow
                        @else
                            Follow
                        @endif
                    </x-button>
                </form>
                @endif
            </div>
                @if ($user->pivot)
                    <div class="text-sm text-gray-500">
                        {{ $user->pivot->created_at->diffForHumans() }}
                    </div>
                @endif
            </div>
        </div>
    </x-card>
@endforeach
