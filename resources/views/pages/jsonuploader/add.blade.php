<x-app-layout title="jsonuploader list - Authexcelerate">
    <x-header/>
    <div class="sm:w-[32rem] shadow-blue-100 mx-auto my-10 overflow-hidden rounded-2xl bg-white shadow-lg sm:max-w-lg">
        <div class="relative bg-black py-6 pl-8 text-xl font-semibold uppercase tracking-wider text-white">
            Upload Json Files
        </div>
        @error('jsonfile')
        <div class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">{{ $message }}</div>
        @enderror
        <form method="POST" action="{{route('json-upload.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4 px-8 py-10">
                <div class="flex flex-col items-center justify-center rounded-lg border-4 border-dashed px-4 py-10">
                    <p class="mt-4 text-center text-xl font-medium text-gray-800">
                        <input type="file" name="jsonfile" accept=".json"/>
                    </p>
                </div>

                <button type="submit" class="mt-4 rounded-full bg-black px-10 py-2 font-semibold text-white">Submit
                </button>
            </div>
        </form>
    </div>

</x-app-layout>
