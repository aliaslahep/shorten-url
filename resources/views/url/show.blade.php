<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Urls') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    
                    <div>

                        <div class="my-5">

                            <table class="w-full">

                                <tr class="bg-green-800">
                                    <th>Shorten Url</th>
                                </tr>


                                @foreach( $total_urls as $total_url) 

                                    <tr class="text-center">

                                        <td><a href="{{ route('redirect', ['url' => urlencode($total_url->url)]) }}">{{$total_url->shorten_url}}</a></td>

                                    </tr>

                                @endforeach

                            </table>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
