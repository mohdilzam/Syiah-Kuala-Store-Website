<div>
  <!-- Hero Section -->
  <div class="bg-gradient-to-r from-[#03AED2] to-[#2DFFF5] py-20">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Grid -->
      <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
        <div>
          <h1 class="block text-3xl font-bold text-white sm:text-4xl lg:text-6xl lg:leading-tight">What are you looking for?</h1>
          <p class="mt-3 text-lg text-white">Purchase your best USK’s Product here!</p>
          <!-- Buttons -->
          <div class="mt-7 grid gap-3 w-full sm:inline-flex">
            <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-[#FDDE55] text-gray-800 hover:bg-[#FEEFAD] disabled:opacity-50 disabled:pointer-events-none" href="/login">
              SHOP NOW
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>
          </div>
          <!-- End Buttons -->
        </div>
        <div class="relative ms-4">
          <img class="w-full rounded-md" src="{{ asset('images/hero_sec.png') }}" alt="Image Description">
          <div class="absolute inset-0 -z-[1] bg-gradient-to-tr from-[#03AED2] via-transparent to-transparent w-full h-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6"></div>
        </div>
      </div>
      <!-- End Grid -->
    </div>
  </div>
  <!-- End Hero Section -->

  <!-- Category Section Start -->
  <div class="bg-[#FDDE55] py-20">
    <div class="max-w-xl mx-auto">
      <div class="text-center">
        <div class="relative flex flex-col items-center">
          <h1 class="text-5xl text-[#03AED2]">Discover your needs</h1>
          <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded"></div>
        </div>
        <p class="mb-12 text-base text-center text-gray-700">
          Want to stay stylish with goods from USK? Find the style that suits you here!
        </p>
      </div>
      <div class="relative ms-4 mb-10">
        <img class="w-full rounded-md" src="{{ asset('images/almet_grup.png') }}" alt="Image Description">
      </div>
    </div>

    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
      <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
        
        @foreach ($categories as $category)
        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-[#68D2E8] dark:border-[#03AED2] dark:focus:outline-none 
        dark:focus:ring-1 dark:focus:ring-[#03AED2]" href="/products?selected_categories[0]={{ $category->id}}" wire:key="{{ $category->id }}">
          <div class="p-4 md:p-5">
            <div class="flex justify-between items-center">
              <div class="flex items-center">
                <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="{{ url('storage', $category->gambar) }}" alt="{{ $category->name }}">
                <div class="ms-3">
                  <h3 class="group-hover:text-[#03AED2] font-semibold text-gray-800 dark:group-hover:text-gray-200 dark:text-white">
                    {{ $category->name }}
                  </h3>
                </div>
              </div>
              <div class="ps-3">
                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="m9 18 6-6-6-6" />
                </svg>
              </div>
            </div>
          </div>
        </a>
        @endforeach
        
      </div>
    </div>
  </div>
  <!-- Category Section End -->
</div>
