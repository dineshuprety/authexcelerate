<x-app-layout title="jsonuploader list - Authexcelerate">
    <x-header/>
    <div class="mx-auto max-w-screen-lg px-4 py-8 sm:px-8">
        <div class="flex items-center justify-between pb-6">
            <div>
                <h2 class="font-semibold text-gray-700">Json Upload</h2>
                <span class="text-xs text-gray-500">View Json upload lists</span>
            </div>
            <div class="flex items-center justify-between">
                <div class="ml-10 space-x-8 lg:ml-40">
                    <a href="{{route('json-upload.create')}}"
                       class="flex items-center gap-2 rounded-md bg-black px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-gray-700">
                        Add
                    </a>
                </div>
            </div>
        </div>
        <div class="overflow-y-hidden rounded-lg border">
            @if(session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-white-700 px-4 py-3 rounded relative"
                     role="alert">
                    <span class="block sm:inline">{{ session()->get('success') }}</span>
                </div><br>
            @endif
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="bg-black text-left text-xs font-semibold uppercase tracking-widest text-white">
                        <th class="px-5 py-3">File Name</th>
                        <th class="px-5 py-3">User</th>
                        <th class="px-5 py-3">Created at</th>
                        <th class="px-5 py-3">Status</th>
                        <th class="px-5 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-500">
                    @if($jsonfiles)
                        @foreach($jsonfiles as $json)
                            <tr>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{$json->file_name}}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <img class="h-full w-full rounded-full"
                                                 src="{{$json->user->image}}"
                                                 alt=""/>
                                        </div>
                                        <div class="ml-3">
                                            <p class="whitespace-no-wrap">{{str($json->user->name)->title()}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <p class="whitespace-no-wrap">{{$json->created_at->diffForHumans()}}</p>
                                </td>

                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <span
                                        class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900">{{($json->status)? 'Exported to Json' : 'Click to export'}}</span>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <a href="{{ $json->status ? route('json-upload.download', ['json' => $json->id]) : route('json-upload.export', ['json' => $json->id]) }}"
                                       class="bg-black flex items-center justify-center rounded-md px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4 focus:ring-blue-300 hover:bg-gray-700">
                                        {{ $json->status ? 'Download' : 'Export' }}
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col items-center border-t bg-white px-5 py-5 sm:flex-row sm:justify-between">
                @if($jsonfiles->hasPages())
                    {{$jsonfiles->links()}}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
