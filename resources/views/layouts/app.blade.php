<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />

</head>
<body \>

<nav x-data="{ mobileMenuIsOpen: false }" @click.away="mobileMenuIsOpen = false" class="flex items-center justify-between bg-neutral-50 border-b border-neutral-300 px-6 py-4 dark:border-neutral-700 dark:bg-neutral-900" aria-label="penguin ui menu">
	<!-- Brand Logo -->
	<a href="{{url('/dashboard/')}}" class="text-2xl font-bold text-neutral-900 dark:text-white">
		<span>Oseong</span>
		<!-- <img src="./your-logo.svg" alt="brand logo" class="w-10" /> -->
	</a>
	<!-- Desktop Menu -->
	<ul class="hidden items-center gap-4 md:flex">
		<li><a href="{{url('/mypage/gaoledisk/')}}" class="font-medium text-black underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-white dark:hover:text-white" aria-current="page">내 디스크</a></li>
		<li><a href="{{url('/mypage/gaolestore')}}" class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">즐겨찾는 매장</a></li>
{{--		<li><a href="#" class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">Blog</a></li>--}}
		<li><a href="{{url('/logout')}}" class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-none focus:underline dark:text-neutral-300 dark:hover:text-white">LogOut</a></li>
	</ul>
	<!-- Mobile Menu Button -->
	<button @click="mobileMenuIsOpen = !mobileMenuIsOpen" :aria-expanded="mobileMenuIsOpen" :class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-neutral-600 dark:text-neutral-300 md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
		<svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
		</svg>
		<svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
			<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
		</svg>
	</button>
	<!-- Mobile Menu -->
	<ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-neutral-300 rounded-b-md border-b border-neutral-300 bg-neutral-50 px-6 pb-6 pt-20 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900 md:hidden">
		<li class="py-4"><a href="{{url('/mypage/gaoledisk/')}}" class="w-full text-lg font-medium text-black focus:underline dark:text-white" aria-current="page">내 디시크</a></li>
		<li class="py-4"><a href="{{url('/mypage/gaolestore')}}" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">즐겨찾는 매장</a></li>
{{--		<li class="py-4"><a href="#" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Blog</a></li>--}}
		<li class="py-4"><a href="{{url('/logout')}}" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">LogOut</a></li>
	</ul>
</nav>

    @yield('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

@stack('scripts')
</body>
</html>

