<x-layout>
  <section class="fixed top-0 left-0 w-full h-full bg-center bg-cover m-0 p-0 flex items-center justify-center overflow-hidden">
    <img src="{{url('storage/errorImages/error.png')}}" class="object-cover w-full h-full absolute top-0 left-0" style="max-width: none;">
    <div class="relative z-10">
      <a href="{{route('index')}}"
         class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        Go back home
      </a>
    </div>
  </section>
</x-layout> 