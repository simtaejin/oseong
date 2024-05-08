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
            <img
                src="{{url('/diskImage/'.$disk['diskImage'])}}"
                alt=""
                class="h-[150px] mt-8"
            />
            <div class="mt-3 flex justify-between text-sm">
                <div>
                    <h3 class="text-gray-900 group-hover:underline group-hover:underline-offset-4">
                        {{$disk['diskName']}} {{$disk['haveDisk']}}
                    </h3>

                    <p class="mt-1 text-pretty text-xs text-gray-500">
                        {{$disk['diskNumber']}}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>


@endsection
