<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto"> 
  <section class="flex items-center font-poppins" style="background-color: #FEEFAD;">
    <div class="justify-center flex-1 max-w-6xl px-4 py-4 mx-auto bg-white border rounded-md" style="border-color: #FDDE55; background-color: #FEEFAD;">
      <div>
        <h1 class="px-4 mb-8 text-2xl font-semibold tracking-wide text-gray-800">
          Thank you. Your order has been received.
        </h1>
        <div class="flex border-b items-stretch justify-start w-full h-full px-4 mb-8 md:flex-row xl:flex-col md:space-x-6 lg:space-x-8 xl:space-x-0" style="border-color: #FDDE55;">
          <div class="flex items-start justify-start flex-shrink-0">
            <div class="flex items-center justify-center w-full pb-6 space-x-4 md:justify-start">
              <div class="flex flex-col items-start justify-start space-y-2">
                <p class="text-lg font-semibold leading-4 text-left text-gray-800">
                  {{ $order->address->nama }}
                </p>
                <p class="text-sm leading-4 text-gray-600">
                  {{ $order->address->alamat }}
                </p>
                <p class="text-sm leading-4 text-gray-600">
                  {{ $order->address->kota }} {{ $order->address->kode_pos }}
                </p>
                <p class="text-sm leading-4 cursor-pointer text-gray-600">
                  {{ $order->address->no_hp }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap items-center pb-4 mb-10 border-b" style="border-color: #FDDE55;">
          <div class="w-full px-4 mb-4 md:w-1/4">
            <p class="mb-2 text-sm leading-5 text-gray-600">
              Order Number:
            </p>
            <p class="text-base font-semibold leading-4 text-gray-800">
              {{ $order->id }}
            </p>
          </div>
          <div class="w-full px-4 mb-4 md:w-1/4">
            <p class="mb-2 text-sm leading-5 text-gray-600">
              Date:
            </p>
            <p class="text-base font-semibold leading-4 text-gray-800">
              {{ $order->created_at->format('d-m-Y') }}
            </p>
          </div>
          <div class="w-full px-4 mb-4 md:w-1/4">
            <p class="mb-2 text-sm font-medium leading-5 text-gray-800">
              Total:
            </p>
            <p class="text-base font-semibold leading-4" style="color: #0521d9;">
              {{ Number::currency($order->total_bayar, 'IDR') }}
            </p>
          </div>
          <div class="w-full px-4 mb-4 md:w-1/4">
            <p class="mb-2 text-sm leading-5 text-gray-600">
              Payment Method:
            </p>
            <p class="text-base font-semibold leading-4 text-gray-800">
              {{ $order->metode_pembayaran == 'cod'? 'Cash On Delivery' : 'Card' }}
            </p>
          </div>
        </div>
        <div class="px-4 mb-10">
          <div class="flex flex-col items-stretch justify-center w-full space-y-4 md:flex-row md:space-y-0 md:space-x-8">
            <div class="flex flex-col w-full space-y-6">
              <h2 class="mb-2 text-xl font-semibold text-gray-800">Order details</h2>
              <div class="flex flex-col items-center justify-center w-full pb-4 space-y-4 border-b" style="border-color: #FDDE55;">
                <div class="flex justify-between w-full">
                  <p class="text-base leading-4 text-gray-800">Subtotal</p>
                  <p class="text-base leading-4 text-gray-600">
                    {{ Number::currency($order->total_bayar, 'IDR') }}
                  </p>
                </div>
                <div class="flex items-center justify-between w-full">
                  <p class="text-base leading-4 text-gray-800">Discount</p>
                  <p class="text-base leading-4 text-gray-600">
                    {{ Number::currency(0, 'IDR') }}
                  </p>
                </div>
                <div class="flex items-center justify-between w-full">
                  <p class="text-base leading-4 text-gray-800">Shipping</p>
                  <p class="text-base leading-4 text-gray-600">
                    {{ Number::currency(0, 'IDR') }}
                  </p>
                </div>
              </div>
              <div class="flex items-center justify-between w-full">
                <p class="text-base font-semibold leading-4 text-gray-800">Total</p>
                <p class="text-base font-semibold leading-4 text-gray-600">
                  {{ Number::currency($order->total_bayar, 'IDR') }}
                </p>
              </div>
            </div>
            <div class="flex flex-col w-full px-2 space-y-4 md:px-8">
              <h2 class="mb-2 text-xl font-semibold text-gray-800">Shipping</h2>
              <div class="flex items-start justify-between w-full">
                <div class="flex items-center justify-center space-x-2">
                  <div class="w-8 h-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6" style="color: #03AED2;" viewBox="0 0 16 16">
                      <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                      </path>
                    </svg>
                  </div>
                  <div class="flex flex-col items-center justify-start">
                    <p class="text-lg font-semibold leading-6 text-gray-800">
                      Delivery<br><span class="text-sm font-normal text-gray-600">Delivery within 24 Hours</span>
                    </p>
                  </div>
                </div>
                <p class="text-lg font-semibold leading-6 text-gray-600">
                  {{ Number::currency(0, 'IDR') }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex items-center justify-start gap-4 px-4 mt-6">
          <a href="/products" class="w-full text-center px-4 py-2" style="color: #03AED2; border-color: #03AED2; border-width: 1px; border-style: solid; border-radius: 4px; background-color: transparent; hover:text-white; hover:bg: #68D2E8;">
            Go back shopping
          </a>
          <a href="/my-orders" class="w-full text-center px-4 py-2" style="color: #FEEFAD; background-color: #03AED2; border-radius: 4px; hover:bg: #68D2E8;">
            View My Orders
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
