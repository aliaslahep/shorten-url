<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create URL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div>
                        <form action="{{route('url.store')}}" method="POST" >
                    
                            @csrf

                            <div>
                                <x-input-label for="Url" :value="__('Url')" />
                                <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('url')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <x-primary-button class="ms-3">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>

                        </form>

                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
