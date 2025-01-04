@extends('layouts.app')

@prepend('scripts')

@endprepend

@section('content')



  <main>
    <form action="{{ route('register') }}" method="post">
        @csrf
      <div class="space-y-12">


        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base/7 font-semibold text-gray-900">Personal Information</h2>
          <p class="mt-1 text-sm/6 text-gray-600">Use a permanent address where you can receive mail.</p>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


            <div class="sm:col-span-2 sm:col-start-1">
              <label for="city" class="block text-sm/6 font-medium text-gray-900">Name</label>
              <div class="mt-2">
                <input type="text" name="name" id="name" autocomplete="address-level2" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="region" class="block text-sm/6 font-medium text-gray-900">Email</label>
              <div class="mt-2">
                <input type="text" name="email" id="email" autocomplete="address-level1" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="postal-code" class="block text-sm/6 font-medium text-gray-900">Password</label>
              <div class="mt-2">
                <input type="text" name="password" id="password" autocomplete="postal-code" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>
          </div>
        </div>


      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>

  </main>

@endsection
