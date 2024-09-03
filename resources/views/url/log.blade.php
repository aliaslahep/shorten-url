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

                        </div>



                        <br/>
                        <hr/>
                        <br/>

                        <div class="my-5">

                            <table class="w-full">

                                <tr class="bg-green-800">
                                    <th>User id</th>
                                    <th>Url</th>
                                    <th>No of Visit</th>
                                    <th>IP Address</th>
                                    <th>Time</th>
                                </tr>

                                @foreach($url_logs as $url_log) 

                                    <tr class="text-center">
                                        <td>{{$url_log->name}}</td>
                                        <td>{{$url_log->url}}</td>
                                        <td>{{$url_log->total_count }}</td>
                                        <td>{{$url_log->ip_address}}</td>
                                        <td>{{date('d M Y h:i a',strtotime($url_log->last_seen))}}</td>
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
