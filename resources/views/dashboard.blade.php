@extends('layouts.app')

@prepend('scripts')
    <script>
        $(function() {
            $("#HeadlineAct").change(function () {
                // alert($(this).val());
                var tan = $(this).val();
                var url = "{{url('/dashboard/')}}/"+tan;
                $("#frm").attr("action", url).submit();

            })
        })
    </script>
@endprepend

@section('content')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">My DISK</h1>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <div class="px-3 pb-16">
                <label for="HeadlineAct" class="block text-sm font-medium text-gray-900"> 탄 선택 </label>

                <form name="frm" id="frm" method="get" action="">

                    <select

                        id="HeadlineAct"
                        class="mt-1.5 w-full rounded-lg border-b-gray-300  text-gray-700 sm:text-sm"
                        style="background-position: right 0.5rem center;background-repeat: no-repeat;background-size: 1.5em 1.5em;padding-right: 2.5rem;"

                    >
                        @foreach($tans as $key => $value)
                            <option value="{{$key}}" {{ ($sel_tan == $key) ? 'selected' : '' }} >{{$value}}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            @foreach($disks as $disk)
                <div class="group block px-8 grid place-items-center " >
                    <a href="{{url('/gaoledisk/'.$disk['diskId'])}}">
                        <img
                            src="{{url('/diskImage/'.$disk['diskImage'])}}"
                            alt=""
                            class="h-[150px] mt-8"
                        />
                    </a>
                    <div class="mt-3 flex justify-between text-sm">
                        <div>
                            <h3 class="text-gray-900">


                                {{$disk['diskName']}}
                                @if($disk['haveDisk'] > 0)
                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">확득</span>
                                @endif
                            </h3>

                            <p class="mt-1 text-pretty text-xs text-gray-500">
                                {{$disk['diskNumber']}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>



@endsection
