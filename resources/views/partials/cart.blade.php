<div class="icon-cart show-modal">
    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
    </svg>
    {{-- <span>{{ count(session('cart', [])) }}</span> --}}
    <span id="count-cart">{{ count(session('cart', [])) }}</span>
</div>

<div class="bottom-sheet">
    <div class="sheet-overlay"></div>
    <div class="content">
        <div class="header">
            <div class="drag-icon"><span></span></div>
        </div>
        <div class="body">
            <section class="py-24 relative">
                <div class="w-full max-w-7xl px-4 md:px-5 lg-6 mx-auto">
                    <h2 class="title font-manrope font-bold text-4xl leading-10 mb-8 text-center text-black">
                        Keranjang Anda
                    </h2>
                    <div id="cart"></div>


                    <div>
                        <div
                            class="flex flex-col md:flex-row items-center md:items-center justify-between lg:px-6 pb-6 border-b border-gray-200 max-lg:max-w-lg max-lg:mx-auto">
                            <h5
                                class="text-gray-900 font-manrope font-semibold text-2xl leading-9 w-full max-md:text-center max-md:mb-4">
                                Total Harga</h5>

                            <div class="flex items-center justify-between gap-5 ">
                                <h6 class="font-manrope font-bold text-2xl lead-10 text-indigo-600"><span
                                        id="total-price">Rp.0</span></h6>
                            </div>
                        </div>
                        <div class="max-lg:max-w-lg max-lg:mx-auto">
                            <p class="font-normal text-base leading-7 text-gray-500 text-center mb-5 mt-6">Mari lanjut
                                ke halaman Checkout!</p>
                            <button onclick="sendCartDataToServer()" class="rounded-full py-4 px-6 bg-indigo-600 text-white font-semibold text-lg w-full text-center transition-all duration-500 hover:bg-indigo-700 ">Checkout
                            </button>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
