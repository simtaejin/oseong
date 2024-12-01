@extends('layouts.app')

@prepend('scripts')
    <script>
        $(function() {
            $("[name='del_btn']").click(function () {

                $("[name='frm_list']").attr("action", "{{url('/mypage/gaoledisk/destroy/')}}/"+$(this).data("value"));
                $("[name='frm_list']").submit();
            });
        })
    </script>
@endprepend

@section('content')

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900" style="display: flex;align-items: center">
                <a href="{{url('/mypage/gaoledisk')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                      <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z" clip-rule="evenodd" />
                    </svg>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;{{$disk_info['diskName']}}
            </h1>
        </div>
    </header>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
        <article class="group flex rounded-md  flex-col  border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
            <div class=" ">
                <img src="{{url('/diskImage/'.$disk_info['diskImage'])}}" style="justify-self: center" class="object-cover transition duration-700 ease-out group-hover:scale-105" alt="a penguin robot talking with a human" />
            </div>
            <div class="flex flex-col gap-4 p-6">
                <span class="place-self-center text-sm font-medium">{{$disk_info['diskNumber']}}</span>
                <h3 class="place-self-center text-balance text-xl lg:text-2xl font-bold text-neutral-900 dark:text-white" aria-describedby="featureDescription">{{$disk_info['diskName']}}</h3>

            </div>
        </article>
        <br>
            <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
                <form name="frm_list" id="frm_list" method="post" action="{{route('mypage-gaoledisk-delete', "")}}">
                @method('DELETE')
                @csrf

                <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                    <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                        <tr>
                            <th scope="col" class="p-4">획득 매장명</th>
                            <th scope="col" class="p-4">획득 방법</th>
                            <th scope="col" class="p-4">획득 날짜</th>
                            <th scope="col" class="p-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                    @foreach($mydisks as $key => $value)
                        <tr>
                            <td>{{$value['gaolestore_title']}}</td>
                            <td>{{$value['acquisition_method']}}</td>
                            <td>{{$value['acquisition_date']}}</td>
                            <td>
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
