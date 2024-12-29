@extends('layouts.app')

@prepend('scripts')
    <script>
        $(function() {

            $("#btn").click(function () {
                $("[name='frm']").submit();
            });

            $("[name='del_btn']").click(function () {

                $("[name='frm_list']").attr("action", "{{route('mypage-gaolestore-delete')}}/"+$(this).data("value"));
                $("[name='frm_list']").submit();
            });
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
                &nbsp;&nbsp;&nbsp;&nbsp;MY STORE
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
            <form name="frm" id="frm" method="post" action="{{route('mypage-gaolestore-store')}}">
                @csrf
                <div class="flex justify-between">

                        <div class="relative flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                            <label for="country" class="w-fit pl-0.5 text-sm">매장선택</label>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-4 top-8 h-5 w-5">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                            <select id="gaolestore_id" name="gaolestore_id" autocomplete="gaolestore_id"  class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                                @foreach($store_list as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col-reverse">
                            <button aria-label="create something epic" name="btn" id="btn" type="button" class="cursor-pointer inline-flex justify-center items-center aspect-square whitespace-nowrap rounded-full bg-black p-3 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-white dark:text-black dark:focus-visible:outline-white">
                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-4 fill-neutral-100 dark:fill-black" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                </div>
            </form>
            <br>
            <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
                <form name="frm_list" id="frm_list" method="post" action="{{route('mypage-gaolestore-delete', "")}}">
                @method('DELETE')
                @csrf

                <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                    <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                        <tr>
                            <th scope="col" class="p-4">매장명</th>
                            <th scope="col" class="p-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                    @foreach($mystores as $key => $value)
                        <tr>
                            <td class="p-4">{{$value['title']}}</td>
                            <td class="p-4">
                                <button type="button" name="del_btn" data-value="{{$value['id']}}"  class="cursor-pointer whitespace-nowrap rounded-md bg-red-500 px-4 py-2 text-xs font-medium tracking-wide text-white transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-red-500 dark:text-white dark:focus-visible:outline-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </form>
            </div>


    </div>
    </main>
@endsection
