@extends('layouts.app')

@prepend('scripts')
    <script>
        $(function() {
            $("#tans").change(function () {
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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
  </header>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
        <div class="relative flex w-full flex-col gap-1 text-neutral-600 dark:text-neutral-300">
            <label for="country" class="w-fit pl-0.5 text-sm">탄 선택</label>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-4 top-8 h-5 w-5">
                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
            <form name="frm" id="frm" method="get" action="">
                <select id="tans" name="tans" autocomplete="tans"  class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                    @foreach($tans as $key => $value)
                        <option value="{{$key}}" {{ ($sel_tan == $key) ? 'selected' : '' }} >{{$value}}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <br/>

        <div class="relative w-full  flex-row space-y-7">
            @foreach($disks as $disk)
                <a href="{{url('/dashboard/detail/'.$disk['diskId'])}}" >
                    <article class="border-0 group flex rounded-md  flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                        <div class="h-44 overflow-hidden">
                            <img src="{{url('/storage/diskImage/'.$disk['diskImage'])}}" style="justify-self: center" class="h-[175px] object-cover transition duration-700 ease-out group-hover:scale-105" alt="a penguin robot talking with a human" />
                        </div>
                        <div style="text-align: center" class="flex flex-col gap-4 p-6">
                            <span class="text-sm font-medium">{{$disk['diskNumber']}}</span>
                            <h3 class="text-balance text-xl lg:text-2xl font-bold text-neutral-900 dark:text-white" aria-describedby="featureDescription">{{$disk['diskName']}}</h3>
                        </div>
                    </article>
                </a>
            @endforeach

        </div>

    </div>
  </main>

@endsection
