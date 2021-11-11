<div>
    {{-- Be like water. --}}
    <div class="flex justify-center">
        {{-- <form> --}}
        <div class="space-y-4">
            <div class="flex flex-col">
                <x-input placeholder="Email Address" type="email" wire:model='user.email'
                    :errors="$errors->first('user.email')" />
            </div>
            <div class="flex flex-col">
                <x-input placeholder="Password" type="password" wire:model='password'
                    :errors="$errors->first('password')" />
            </div>

            <div class="flex flex-col">
                <button type="button" wire:click="donUserLogin"
                    class="p-2 font-black transition-colors duration-200 bg-pink-400 rounded shadow text-cool-gray-100 focus:bg-pink-600 hover:bg-pink-600">Login</button>
            </div>
            {{-- <div class="flex justify-end">
                            <p class="text-sm">Don`t have an account ? <a href="{{ route('register') }}" class="text-pink-600">register here</a></p>
                        </div> --}}
            <p class="text-center">Train your mind to see the good in every situation</p>
        </div>
        {{-- </form> --}}
    </div>
</div>
