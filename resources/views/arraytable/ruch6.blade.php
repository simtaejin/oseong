@extends('layouts.app')
@prepend('style')
    <style>

        .purple-background {
            background-color: #c102c1 !important;
            color: #ffffff;
        }
        .highlight {
            background-color: red !important;
        }
        .overline_red {
            text-decoration-line: line-through;
            text-decoration-color: red;
            text-decoration-style: double;
            text-decoration-thickness: 3px;
        }
    </style>
@endprepend
@prepend('scripts')
    <script>
        $(document).ready(function() {
            $('td[name^="5"]').addClass('purple-background');
        });
        $(function() {
            // $("[name='ruch5_table'] > tr > td").click(function () {
            //     alert($(this).text());
            // });
            $('td').click(function() {
                var clickedText = $(this).text().trim();
                $('td[name="' + clickedText + '"]').toggleClass('overline_red');
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
                &nbsp;&nbsp;&nbsp;&nbsp;러쉬 6 배열표
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

            <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">

                <table class="w-full text-left text-lg text-neutral-600 dark:text-neutral-300" style="table-layout: fixed">
                    <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                        <tr>
                            <th scope="col" class="w-24">1라인</th>
                            <th scope="col" class="w-24">2라인</th>
                            <th scope="col" class="w-24">3라인</th>
                            <th scope="col" class="w-24">4라인</th>
                            <th scope="col" class="w-24">5라인</th>
                            <th scope="col" class="w-24">6라인</th>
                            <th scope="col" class="w-24">7라인</th>
                            <th scope="col" class="w-24">8라인</th>
                        </tr>
                    </thead>
                    <tbody name="ruch5_table" class="divide-y divide-neutral-300 dark:divide-neutral-700">
                        @foreach($ruch_6 as $key => $value)
                                <tr>
                                    <td name="{{$value['line_1']}}">{{$value['line_1']}}</td>
                                    <td name="{{$value['line_2']}}">{{$value['line_2']}}</td>
                                    <td name="{{$value['line_3']}}">{{$value['line_3']}}</td>
                                    <td name="{{$value['line_4']}}">{{$value['line_4']}}</td>
                                    <td name="{{$value['line_5']}}">{{$value['line_5']}}</td>
                                    <td name="{{$value['line_6']}}">{{$value['line_6']}}</td>
                                    <td name="{{$value['line_7']}}">{{$value['line_7']}}</td>
                                    <td name="{{$value['line_8']}}">{{$value['line_8']}}</td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </main>
@endsection
