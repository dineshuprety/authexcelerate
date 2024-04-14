<x-app-layout title="Authexcelerate - login">
    <div class="flex flex-wrap">
        <div class="flex w-full flex-col md:w-1/2">
            <div class="flex justify-center pt-12 md:-mb-24 md:justify-start md:pl-12">
                <a href="{{route('auth.index')}}"
                   class="border-b-gray-700 border-b-4 pb-2 text-2xl font-bold text-gray-900"> Authexcelerate . </a>
            </div>
            <div
                class="lg:w-[28rem] mx-auto my-auto flex flex-col justify-center pt-8 md:justify-start md:px-6 md:pt-0">
                @if(!auth()->user())
                    <p class="text-left text-3xl font-bold">Welcome to, Authexcelerate</p>
                    <p class="mt-2 text-left text-gray-500">SSO login</p>
                    <a href="{{route('auth.redirect')}}"
                       class="-2 mt-8 flex items-center justify-center rounded-md border px-4 py-1 outline-none ring-gray-400 ring-offset-2 transition focus:ring-2 hover:border-transparent hover:bg-black hover:text-white">
                        <img class="mr-2 h-5" src="https://www.cdnlogo.com/logos/g/60/github-icon.svg" alt/> Log in with
                        Github
                    </a>
                @else
                    <p class="text-left text-3xl font-bold">Welcome, {{str(auth()->user()->name)}}</p>
                    <p class="mt-2 text-left text-gray-500">Back to dashboard</p>
                    <a href="{{route('json-upload.index')}}"
                       class="-2 mt-8 flex items-center justify-center rounded-md border px-4 py-1 outline-none ring-gray-400 ring-offset-2 transition focus:ring-2 hover:border-transparent hover:bg-black hover:text-white">
                        <img class="mr-2 h-5" src="{{auth()->user()->image}}" alt/> Json Uploader dashboard
                    </a>
                @endif
            </div>
        </div>
        <div class="pointer-events-none relative hidden h-screen select-none bg-black md:block md:w-1/2">
            <div class="absolute bottom-0 z-10 px-8 text-white opacity-100">
                <p class="mb-8 text-3xl font-semibold leading-10">We work 10x faster than our compeititors and stay
                    consistant. While they're bogged won with techincal debt, we're realeasing new features.</p>
                <p class="mb-4 text-3xl font-semibold">John Elmond</p>
                <p class="">Founder, Emogue</p>
                <p class="mb-7 text-sm opacity-70">Web Design Agency</p>
            </div>
            <img class="-z-1 absolute top-0 h-full w-full object-cover opacity-90"
                 src="https://images.unsplash.com/photo-1565301660306-29e08751cc53?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"/>
        </div>
    </div>

</x-app-layout>
