@extends('layouts.app')

@prepend('scripts')
    <script>
        $(function() {
            $("#acquisition_date").datepicker({
                dateFormat: 'yy-mm-dd' //Input Display Format 변경
                ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                ,showMonthAfterYear:true //년도 먼저 나오고, 뒤에 월 표시
                ,changeYear: true //콤보박스에서 년 선택 가능
                ,changeMonth: true //콤보박스에서 월 선택 가능
                ,buttonImageOnly: true //기본 버튼의 회색 부분을 없애고, 이미지만 보이게 함
                ,buttonText: "선택" //버튼에 마우스 갖다 댔을 때 표시되는 텍스트
                ,yearSuffix: "년" //달력의 년도 부분 뒤에 붙는 텍스트
                ,monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'] //달력의 월 부분 텍스트
                ,monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'] //달력의 월 부분 Tooltip 텍스트
                ,dayNamesMin: ['일','월','화','수','목','금','토'] //달력의 요일 부분 텍스트
                ,dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'] //달력의 요일 부분 Tooltip 텍스트
            });
        })
    </script>
@endprepend

@section('content')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900" style="display: flex;align-items: center">
                <a href="{{url('/dashboard/')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;{{$disk_info['diskName']}}

            </h1>
        </div>
    </header>

    <main>
        <div class="group block px-8 grid place-items-center " >
                <img
                    src="{{url('/diskImage/'.$disk_info['diskImage'])}}"
                    alt=""
                    class="h-[150px] mt-8"
                />

            <div class="mt-3 flex justify-between text-sm">
                <div>
                    <h3 class="text-gray-900">
                        {{$disk_info['diskName']}}
                    </h3>

                    <p class="mt-1 text-pretty text-xs text-gray-500">
                        {{$disk_info['diskNumber']}}
                    </p>
                </div>
            </div>
        </div>

        <form class="px-8" method="post" action="{{route('gaoledisk-store')}}">
            @csrf
            <input type="hidden" id="gaoledisk_id" name="gaoledisk_id" value="{{$gaoledisk_id}}" >

            <div class="space-y-12 ">
                <div class="border-b border-gray-900/10 pb-12 pt-12">
                    @foreach($mydisks as $key => $value)
                        <div class="" style="padding: 10px 0px">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">{{$value['gaolestore']['title']}}</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">{{substr($value['acquisition_date'],0,11)}} {{$acquisition_method_list[$value['acquisition_method']]}} 로 획득</p>
                        </div>
                    @endforeach

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">매장</label>
                            <div class="mt-2">
                                <select id="gaolestore_id" name="gaolestore_id" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach($store_list as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">흭득 방법</label>
                            <div class="mt-2">
                                <select id="acquisition_method" name="acquisition_method" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach($acquisition_method_list as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900">흭득 날짜</label>
                            <div class="mt-2">
                                <input type="text" name="acquisition_date" id="acquisition_date" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="location.href='{{url('/dashboard/')}}'">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>

    </main>

@endsection
