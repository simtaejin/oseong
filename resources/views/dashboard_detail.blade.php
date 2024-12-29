@extends('layouts.app')

@prepend('scripts')
    <script>
        $(function() {
            document.getElementById('acquisition_date').value = new Date().toISOString().substring(0, 10);
        })
    </script>
@endprepend

@section('content')

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900" style="display: flex;align-items: center">
                <a href="{{url('/dashboard/')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                      <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
                    </svg>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;{{$disk_info['diskName']}}
            </h1>
        </div>
    </header>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">
        <script>
            new PartnersCoupang.G({"id":823680,"template":"carousel","trackingCode":"AF6935902","width":"100%","height":"140","tsource":""});
        </script>
      </h1>
    </div>
    <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
        <article class="group flex rounded-md  flex-col  border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
            <div class=" ">
                <img src="{{url('/storage/diskImage/'.$disk_info['diskImage'])}}" style="justify-self: center" class="object-cover transition duration-700 ease-out group-hover:scale-105" alt="a penguin robot talking with a human" />
            </div>
            <div class="flex flex-col gap-4 p-6">
                <span class="place-self-center text-sm font-medium">{{$disk_info['diskNumber']}}</span>
                <h3 class="place-self-center text-balance text-xl lg:text-2xl font-bold text-neutral-900 dark:text-white" aria-describedby="featureDescription">{{$disk_info['diskName']}}</h3>
{{--                <p id="featureDescription" class="text-pretty text-sm">--}}
{{--                    Learning JavaScript doesn't need to be difficult. Our penguin AI--}}
{{--                    robot can learn how much you know and will go at your speed.--}}
{{--                    Although Penguai is small, he's got a mighty big CPU.--}}
{{--                </p>--}}
            </div>
        </article>
        </br>
        <form class="space-y-7" method="post" action="{{route('store')}}">
            @csrf
            <input type="hidden" id="gaoledisk_id" name="gaoledisk_id" value="{{$gaoledisk_id}}" >
            <div class="relative flex w-full flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                <label for="os" class="w-fit pl-0.5 text-sm">획득 매장</label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-4 top-8 h-5 w-5">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
                <select id="gaolestore_id" name="gaolestore_id" class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                    @foreach($mystores as $key => $value)
                        <option value="{{$value['id']}}">{{$value['title']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="relative flex w-full flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                <label for="os" class="w-fit pl-0.5 text-sm">획득 방법</label>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-4 top-8 h-5 w-5">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
                <select id="acquisition_method" name="acquisition_method" class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                    @foreach($acquisition_method_list as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex w-full  flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                <label for="textInputDefault" class="w-fit pl-0.5 text-sm">획득 날짜</label>
                <input id="acquisition_date" name="acquisition_date" type="date" class="w-full rounded-md border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white" name="name" placeholder="Enter your name" autocomplete="name"/>
            </div>

            <div class="flex w-full  flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                <button type="submit" style="justify-self: right" class="cursor-pointer whitespace-nowrap bg-transparent rounded-md border border-black px-4 py-2 text-lg font-medium tracking-wide text-black transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:border-white dark:text-white dark:focus-visible:outline-white">저장</button>
            </div>

        </form>

    </div>
    </main>

@endsection
