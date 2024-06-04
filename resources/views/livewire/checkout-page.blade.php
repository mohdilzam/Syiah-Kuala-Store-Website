<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
	<h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
	  Checkout
	</h1>
	<form wire:submit.prevent='placeOrder'>
	  <div class="grid grid-cols-12 gap-4">
		<div class="md:col-span-12 lg:col-span-8 col-span-12">
		  <!-- Card -->
		  <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
			<!-- Shipping Address -->
			<div class="mb-6">
			  <h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
				Shipping Address
			  </h2>
			  <div class="mt-4">
				<div>
				  <label class="block text-gray-700 dark:text-white mb-1" for="nama">
					Name
				  </label>
				  <input wire:model='nama' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('nama') border-red-500 @enderror" id="nama" type="text">
				  </input>
				  @error('nama')
				  <div class="text-red-500 text-sm"> {{$message}} </div>
				  @enderror
				</div>
			  </div>
			  <div class="mt-4">
				<label class="block text-gray-700 dark:text-white mb-1" for="phone">
				  No HP
				</label>
				<input wire:model='no_hp' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('no_hp') border-red-500 @enderror" id="no_hp" type="text">
				</input>
				@error('no_hp')
				<div class="text-red-500 text-sm"> {{$message}} </div>
				@enderror
			  </div>
			  <div class="mt-4">
				<label class="block text-gray-700 dark:text-white mb-1" for="address">
				  Alamat
				</label>
				<input wire:model='alamat' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('alamat') border-red-500 @enderror" id="alamat" type="text">
				</input>
				@error('alamat')
				<div class="text-red-500 text-sm"> {{$message}} </div>
				@enderror
			  </div>
			  <div class="mt-4">
				<label class="block text-gray-700 dark:text-white mb-1" for="city">
				  Kota
				</label>
				<input wire:model='kota' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('kota') border-red-500 @enderror" id="kota" type="text">
				</input>
				@error('kota')
				<div class="text-red-500 text-sm"> {{$message}} </div>
				@enderror
			  </div>
			  <div class="mt-4">
				<div>
				  <label class="block text-gray-700 dark:text-white mb-1" for="zip">
					Kode Pos
				  </label>
				  <input wire:model='kode_pos' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('kode_pos') border-red-500 @enderror" id="kode_pos" type="text">
				  </input>
				  @error('kode_pos')
				  <div class="text-red-500 text-sm"> {{$message}} </div>
				  @enderror
				</div>
			  </div>
			</div>
			<div class="text-lg font-semibold mb-4">
			  Select Payment Method
			</div>
			<ul class="grid w-full gap-6 md:grid-cols-2">
			  <li>
				<input wire:model='metode_pembayaran' class="hidden peer" id="payment-cod" required="" type="radio" value="cod" />
				<label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-[#03AED2] peer-checked:border-[#03AED2] peer-checked:text-[#03AED2] hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="payment-cod">
				  <div class="block">
					<div class="w-full text-lg font-semibold">
					  Cash on Delivery
					</div>
				  </div>
				  <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
				  </svg>
				</label>
			  </li>
			  <li>
				<input wire:model='metode_pembayaran' class="hidden peer" id="payment-bca" type="radio" value="bca">
				<label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-[#03AED2] peer-checked:border-[#03AED2] peer-checked:text-[#03AED2] hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="payment-bca">
				  <div class="block">
					<div class="w-full text-lg font-semibold">
					  BCA
					</div>
				  </div>
				  <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
				  </svg>
				</label>
			  </li>
			  <li>
				<input wire:model='metode_pembayaran' class="hidden peer" id="payment-bsi" type="radio" value="bsi">
				<label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-[#03AED2] peer-checked:border-[#03AED2] peer-checked:text-[#03AED2] hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="payment-bsi">
				  <div class="block">
					<div class="w-full text-lg font-semibold">
					  BSI
					</div>
				  </div>
				  <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
				  </svg>
				</label>
			  </li>
			  <li>
				<input wire:model='metode_pembayaran' class="hidden peer" id="payment-qris" type="radio" value="qris">
				<label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-[#03AED2] peer-checked:border-[#03AED2] peer-checked:text-[#03AED2] hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="payment-qris">
				  <div class="block">
					<div class="w-full text-lg font-semibold">
					  Qris
					</div>
				  </div>
				  <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
				  </svg>
				</label>
			  </li>
			</ul>					
			@error('metode_pembayaran')
			<div class="text-red-500 text-sm"> {{$message}} </div>
			@enderror
		  </div>
		  <!-- End Card -->
		</div>
		<div class="md:col-span-12 lg:col-span-4 col-span-12">
		  <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
			<div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
			  ORDER SUMMARY
			</div>
			<div class="flex justify-between mb-2 font-bold">
			  <span>
				Subtotal
			  </span>
			  <span>
				{{ Number::currency($total_bayar, 'IDR') }}
			  </span>
			</div>
			<div class="flex justify-between mb-2 font-bold">
			  <span>
				Shipping Cost
			  </span>
			  <span>
				{{ Number::currency(0, 'IDR') }}
			  </span>
			</div>
			<hr class="bg-slate-400 my-4 h-1 rounded">
			<div class="flex justify-between mb-2 font-bold">
			  <span>
				Total
			  </span>
			  <span>
				{{ Number::currency($total_bayar, 'IDR') }}
			  </span>
			</div>
			</hr>
		  </div>
		  <button type="submit" class="bg-[#03AED2] mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-[#68D2E8]">
			<span wire:loading.remove>Place Order</span>
			<span wire:loading> Processing... </span>
		  </button>
		  <div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
			<div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
			  CART
			</div>
			<ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
			  @foreach ($cart_items as $ci)
			  <li class="py-3 sm:py-4" wire:key='{{ $ci['product_id'] }}'>
				<div class="flex items-center">
				  <div class="flex-shrink-0">
					<img alt="{{ $ci['name'] }}" class="w-12 h-12 rounded-full" src="{{ url ('storage', $ci['gambar']) }}">
					</img>
				  </div>
				  <div class="flex-1 min-w-0 ms-4">
					<p class="text-sm font-medium text-gray-900 truncate dark:text-white">
					  {{ $ci['name'] }}
					</p>
					<p class="text-sm text-gray-500 truncate dark:text-gray-400">
					  Quantity: {{ $ci['quantity'] }}
					</p>
				  </div>
				  <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
					{{ Number::currency($ci['jumlah_total'], 'IDR') }}
				  </div>
				</div>
			  </li>
			  @endforeach
			</ul>
		  </div>
		</div>
	  </div>
	</form>
  </div>  