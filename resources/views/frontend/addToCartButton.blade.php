
<style>
    .max-w-md {
    max-width: 45rem;



}
</style>



  <button  data-modal-target="select-modal" data-modal-toggle="select-modal"  class=" product-cart fixed top-1/2 z-40 -mt-12 hidden flex-col items-center justify-center rounded bg-green-700 p-3 pt-3.5 text-sm font-semibold text-light shadow-900 transition-colors duration-200 hover:bg-accent-hover focus:outline-0 ltr:right-0 ltr:rounded-tr-none ltr:rounded-br-none rtl:left-0 rtl:rounded-tl-none rtl:rounded-bl-none lg:flex"><span class="flex pb-0.5"><svg width="14" height="16" class="shrink-0" viewBox="0 0 12.686 16"><g transform="translate(-27.023 -2)"><g transform="translate(27.023 5.156)"><g><path d="M65.7,111.043l-.714-9A1.125,1.125,0,0,0,63.871,101H62.459V103.1a.469.469,0,1,1-.937,0V101H57.211V103.1a.469.469,0,1,1-.937,0V101H54.862a1.125,1.125,0,0,0-1.117,1.033l-.715,9.006a2.605,2.605,0,0,0,2.6,2.8H63.1a2.605,2.605,0,0,0,2.6-2.806Zm-4.224-4.585-2.424,2.424a.468.468,0,0,1-.663,0l-1.136-1.136a.469.469,0,0,1,.663-.663l.8.8,2.092-2.092a.469.469,0,1,1,.663.663Z" transform="translate(-53.023 -101.005)" fill="currentColor"></path></g></g><g transform="translate(30.274 2)"><g><path d="M160.132,0a3.1,3.1,0,0,0-3.093,3.093v.063h.937V3.093a2.155,2.155,0,1,1,4.311,0v.063h.937V3.093A3.1,3.1,0,0,0,160.132,0Z" transform="translate(-157.039)" fill="currentColor"></path></g></g></g></svg><span class="flex ltr:ml-2 rtl:mr-2">{{count((array)session('cart'))}} Items</span></span>
@php
    $total=0
@endphp
@foreach ((array)session('cart') as $id=> $details )
@php
    $total+=$details['price']*$details['quantity']
@endphp

@endforeach
<p>Total:
    <span class="w-full px-2 py-2 mt-3 rounded bg-white text-green-700">${{ $total}}</span></p>
</button>


  <!-- Modal toggle -->
{{-- <button data-modal-target="select-modal" data-modal-toggle="select-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button> --}}

  <!-- Main modal -->
  <div id="select-modal" tabindex="-1" aria-hidden="true" class="mt-0 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">

                    <div class="flex font-semibold text-green-700"><svg width="24" height="22" class="shrink-0" viewBox="0 0 12.686 16"><g transform="translate(-27.023 -2)"><g transform="translate(27.023 5.156)"><g><path d="M65.7,111.043l-.714-9A1.125,1.125,0,0,0,63.871,101H62.459V103.1a.469.469,0,1,1-.937,0V101H57.211V103.1a.469.469,0,1,1-.937,0V101H54.862a1.125,1.125,0,0,0-1.117,1.033l-.715,9.006a2.605,2.605,0,0,0,2.6,2.8H63.1a2.605,2.605,0,0,0,2.6-2.806Zm-4.224-4.585-2.424,2.424a.468.468,0,0,1-.663,0l-1.136-1.136a.469.469,0,0,1,.663-.663l.8.8,2.092-2.092a.469.469,0,1,1,.663.663Z" transform="translate(-53.023 -101.005)" fill="currentColor"></path></g></g><g transform="translate(30.274 2)"><g><path d="M160.132,0a3.1,3.1,0,0,0-3.093,3.093v.063h.937V3.093a2.155,2.155,0,1,1,4.311,0v.063h.937V3.093A3.1,3.1,0,0,0,160.132,0Z" transform="translate(-157.039)" fill="currentColor"></path></g></g></g></svg><span class="flex ltr:ml-2 rtl:mr-2">{{count((array)session('cart'))}} Items</span></div>

                  </h3>




                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5">
                  <p class="text-gray-500 dark:text-gray-400 mb-4">Select your desired position:</p>
                  <ul class="space-y-4 mb-4">


                    @if (session('cart'))
                    @foreach (session('cart') as $id=> $details)


                      <li>
                        <a href="#">
                            <img style="width:200px;" src="{{ asset('images/fruits/')}}/{{$details['image']}}" alt="image">
                        </a>
                          <input type="radio" id="job-1" name="job" value="job-1" class="hidden peer" required />
                          <label for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                              <div class="block">
                                  <div class="w-full text-lg font-semibold">{{$details['name']}}</div>
                                  <div class="w-full text-gray-500 dark:text-gray-400">{{$details['price']}} Quantity: {{$details['quantity']}}</div>
                              </div>
                              <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>
                          </label>
                      </li>

                      @endforeach
                      @endif
                  </ul>
                  <a href="{{route('all_cart_page')}}" class=" inline-flex w-full justify-center  text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                      Checkout
                  </a>
              </div>
          </div>
      </div>
  </div>
