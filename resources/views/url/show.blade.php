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

                        <div class="m-5 flex justify-around">

                            <div class="h-[100px] w-[180px] bg-blue-500 rounded-md">
                                <div class="m-3  text-white text-xl ">
                                    
                                    <b class="flex justify-center">Total URLs</b>

                                    <p class="mt-5 flex justify-center">{{$total_urls}}</p>
                                
                                </div>
                            </div>

                            <div class="h-[100px] w-[180px] bg-blue-500 rounded-md">
                                <div class="m-3 text-white text-xl">

                                    <b class="flex justify-center">User URLs</b>

                                    <p class="mt-5 flex justify-center">{{$user_urls->count()}}</p>

                                </div>
                            </div>

                        </div>

                        <br/>
                        <hr/>
                        <br/>

                        <div class="my-5">

                            <table class="w-full">

                                <tr class="bg-green-800">
                                    <th>Sl.No</th>
                                    <th>URL</th>
                                    <th>Shorten Url</th>
                                </tr>

                                @php
                                    
                                    $i=1;


                                @endphp

                                @foreach( $user_urls as $user_url) 

                                    <tr class="text-center">
                                        <td>{{$i++}}</td>
                                        <td>{{$user_url->url}}</td>
                                        <td>{{$user_url->shorten_url}}</td>
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
