<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Orders;
use App\Models\Cluster;
use App\Models\NomorBlok;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\AlamatCluster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class CheckoutController extends Controller
{
    /**
     * Show the checkout details form.
     */
    public function showCheckoutDetails()
    {
        $user = auth()->user();
        $clusters = Cluster::all();
        $nomors = AlamatCluster::all();
        $loginType = $user->email ? 'email' : 'phone';
        return view('checkout', compact('user', 'clusters', 'loginType', 'nomors'));
    }

    /**
     * Store a newly created order in storage.
     */



     public function storeOrder(Request $request)
     {
        // dd($request);
         $products = json_decode($request->products, true);
         $totalOrderPrice = $request->input('total_price');
         $metodeId = $request->input('cluster_id');
         $metode = Cluster::where('id', $metodeId)->first();

         if($metodeId == 3){
             $pengirimanId = $request->input('alamat_cluster_id');
             $pengiriman = AlamatCluster::where('id', $pengirimanId)->first();
         }


         // Validasi input produk dan total harga
         if ($products === null || !is_numeric($totalOrderPrice)) {
             Log::error('Data input tidak valid. Produk: ' . $request->input('products') . ', Total Harga: ' . $totalOrderPrice);
             return redirect()->back()->withErrors(['checkout' => 'Data input tidak valid. Silakan coba lagi.']);
         }

         try {
             $totalOrderPrice = 0; // Untuk menyimpan total harga dari semua produk dalam satu order
             $buyerId = auth()->id(); // Ambil ID pengguna yang sedang login


        foreach ($products as $product) {
            $toko = Toko::where('id_toko', $product['store_id'])->with('user')->first();

            if ($product['quantity'] < 1) {
                return redirect()->back()->withErrors(['checkout' => 'Jumlah produk tidak boleh menjadi nol.']);
            }

            // Cek apakah toko sedang tutup
            if (!$toko->isOpen()) {
                return redirect()->back()->withErrors([
                    'checkout' => 'Maaf, toko ' . $toko->nama_toko . ' sedang tutup. Anda tidak bisa checkout saat ini.'
                ])->with('status', 'TokoTutup');
            }

            // Cek apakah seller mencoba membeli produk mereka sendiri
            if ($toko && $toko->id_seller == $buyerId) {
                return redirect('/seller/seller-edit')->withErrors(['checkout' => 'Anda tidak dapat membeli produk Anda sendiri.']);
            }

            if($metodeId == 1){
                Http::withoutVerifying()->post('https://wakbk.grageweb.online/send-message', [
                    'number' => $request['checkout-phone'],
                    'message' => "Yth. Pelanggan Djajanan,
                    \n\nIni adalah konfirmasi pesanan Anda. Anda telah membeli:
                    \n\n* *" . $product['name'] . " sebanyak " . $product['quantity'] . " buah, dari toko " . $toko['nama_toko'] . "*.
                    \n\nTotal pembayaran: Rp " . number_format($product['quantity'] * $product['price']) . ".
                    \nSilahkan hubungi penjual: " . $toko['user']['phone'] .  "\nDan " . $request['alamat_cluster_default'] . " .
                    \n\nTerima kasih atas kepercayaan Anda. Tim Djajanan akan segera memproses pesanan Anda.
                    \n\nHormat kami,\nTim Djajanan",
                ]);

                Http::withoutVerifying()->post('https://wakbk.grageweb.online/send-message', [
                    'number' => $toko['user']['phone'],
                    'message' => "Yth. Penjual Djajanan,
                    \n\nKami informasikan bahwa produk Anda, *" . $product['name'] . "* (x" . $product['quantity'] . "), telah dipesan oleh *" . $request['checkout-name'] . "*.
                    \n\nDetail pesanan:\n* *Jumlah:* " . $product['quantity'] . " buah/pcs
                    \n* *Total harga:* Rp " . $product['quantity'] * $product['price'] . "\n* *Mohon Tunggu Sampai Pembeli Mengunjungi Toko Anda.*
                    \n* *Nomor telepon pembeli:* " . $request['checkout-phone'] . "
                    \n\nMohon segera proses pesanan ini dan informasikan kepada pembeli mengenai pembelian beli di tempat Anda. Terima kasih atas kerjasama Anda.
                    \n\nHormat kami,\nTim Djajanan",
                ]);
            }elseif($metodeId == 2){
                Http::withoutVerifying()->post('https://wakbk.grageweb.online/send-message', [
                    'number' => $request['checkout-phone'],
                    'message' => "Yth. Pelanggan Djajanan,
                    \n\nIni adalah konfirmasi pesanan Anda. Anda telah membeli:
                    \n\n* *" . $product['name'] . " sebanyak " . $product['quantity'] . " buah, dari toko " . $toko['nama_toko'] . "*.
                    \n\nTotal pembayaran: Rp " . number_format($product['quantity'] * $product['price']) . ".
                    \nSilahkan hubungi penjual: " . $toko['user']['phone'] .  ".
                    \n\nTerima kasih atas kepercayaan Anda. Tim Djajanan akan segera memproses pesanan Anda.
                    \n\nHormat kami,\nTim Djajanan",
                ]);

                Http::withoutVerifying()->post('https://wakbk.grageweb.online/send-message', [
                    'number' => $toko['user']['phone'],
                    'message' => "Yth. Penjual Djajanan,
                    \n\nKami informasikan bahwa produk Anda, *" . $product['name'] . "* (x" . $product['quantity'] . "), telah dipesan oleh *" . $request['checkout-name'] . "*.
                    \n\nDetail pesanan:\n* *Jumlah:* " . $product['quantity'] . " buah/pcs
                    \n* *Total harga:* Rp " . $product['quantity'] * $product['price'] . "\n* *Alamat pengiriman:* " . $request['alamat_cluster'] . "
                    \n* *Nomor telepon pembeli:* " . $request['checkout-phone'] . "
                    \n\nMohon segera proses pesanan ini dan informasikan kepada pembeli mengenai status pengiriman. Terima kasih atas kerjasama Anda.
                    \n\nHormat kami,\nTim Djajanan",
                ]);
            }elseif($metodeId == 3){
                Http::withoutVerifying()->post('https://wakbk.grageweb.online/send-message', [
                    'number' => $request['checkout-phone'],
                    'message' => "Yth. Pelanggan Djajanan,
                    \n\nIni adalah konfirmasi pesanan Anda. Anda telah membeli:
                    \n\n* *" . $product['name'] . " sebanyak " . $product['quantity'] . " buah, dari toko " . $toko['nama_toko'] . "*.
                    \n\nTotal pembayaran: Rp " . number_format($product['quantity'] * $product['price']) . ".
                    \nSilahkan hubungi penjual: " . $toko['user']['phone'] .  "\n\nPesanan Anda akan dikirim oleh: " . $pengiriman['alamat'] . " .
                    \n\nTerima kasih atas kepercayaan Anda. Tim Djajanan akan segera memproses pesanan Anda.
                    \n\nHormat kami,\nTim Djajanan",
                ]);

                Http::withoutVerifying()->post('https://wakbk.grageweb.online/send-message', [
                    'number' => $toko['user']['phone'],
                    'message' => "Yth. Penjual Djajanan,
                    \n\nKami informasikan bahwa produk Anda, *" . $product['name'] . "* (x" . $product['quantity'] . "), telah dipesan oleh *" . $request['checkout-name'] . "*.
                    \n\nDetail pesanan:\n* *Jumlah:* " . $product['quantity'] . " buah/pcs
                    \n* *Total harga:* Rp " . $product['quantity'] * $product['price'] . "\n* *Alamat pengiriman:* " . $request['alamat_cluster'] . "
                    \n* *Nomor telepon pembeli:* " . $request['checkout-phone'] . "
                    \n\nMohon segera proses pesanan ini dan konfirmasikan kepada jasa kirim: " . $pengiriman['alamat'] . " mengenai transaksi ini. Terima kasih atas kerjasama Anda.
                    \n\nHormat kami,\nTim Djajanan",
                ]);
            }
            // Kirim pesan ke pembeli dan penjual menggunakan API


            // Validasi data produk
            if (!isset($product['price'], $product['quantity'], $product['photo'], $product['product_id'], $product['category_id'], $product['store_id'])) {
                Log::error('Missing product data: ' . json_encode($product));
                return redirect()->back()->withErrors(['products' => 'Missing product data.']);
            }

            // Menghitung total harga untuk produk ini
            $unitPrice = $product['quantity'] * $product['price'];

            // Simpan data ke tabel orders
            $order = new Orders();

            // Membuat random nomor pesanan
            $randomNumber = mt_rand(1000, 9999); // Range
            $totalOrders = Orders::count();
            $transactionNumber = str_pad($totalOrders + 1, 3, '0', STR_PAD_LEFT); // Tiga digit terakhir

            $order->no_order = '#Djajanan' . $randomNumber . $transactionNumber;
            $order->tanggal_order = now();
            $order->quantity = array_sum(array_column($products, 'quantity'));
            $order->photo = $product['photo'];
            $order->order_date = now();
            $order->id_user = auth()->id();

            // Ambil cluster dan alamat cluster dari request
            // dd($request);
            $cluster = Cluster::find($request->input('cluster_id'));

            if($request->input('alamat_cluster')){
                $alamatCluster = $request->input('alamat_cluster');
            } elseif($request->input('alamat_cluster_id')) {
                $alamatCluster = AlamatCluster::find($request->input('alamat_cluster_id'));
                $alamatCluster = $alamatCluster->alamat;
            } elseif($request->input('alamat_cluster_default')){
                $alamatCluster = $request->input('alamat_cluster_default');
            } else {
                $alamatCluster = 'Unknown Cluster';
            }

            $nomorBlok = $request->input('nomor_id'); // null

            // Gabungkan nama cluster, alamat cluster, dan nomor blok untuk disimpan di location
            $order->location = ($cluster ? $cluster->nama_cluster : 'Unknown Cluster') . ' - ' .
                ($alamatCluster) . ' ' .
                ($nomorBlok ? $nomorBlok->nomor : ' ');

            $order->harga = $totalOrderPrice;
            $order->product_id = $product['product_id'];
            $order->category_id = $product['category_id'];
            $order->toko_id = $product['store_id'];
            $order->save();

            // Simpan data ke tabel order_details
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product['product_id'];
            $orderDetail->quantity = $product['quantity'];
            $orderDetail->unit_price = $unitPrice; // Menghitung total harga untuk setiap produk
            $orderDetail->save();

            // Tambahkan harga produk ini ke total harga order
            $totalOrderPrice += $unitPrice;
        }

        // Update harga di tabel orders untuk total harga dari seluruh produk
        $order->harga = $totalOrderPrice;
        $order->save();

            DB::commit(); // Commit transaksi jika semua berhasil
            return redirect('/history')->with('success', 'Order created successfully!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi kesalahan
            Log::error('Pembuatan order gagal: ' . $e->getMessage());
            return redirect()->back()->withErrors(['order' => 'Pembuatan order gagal ' . $e->getMessage()]);
        }
    }


    public function showOrderHistory()
    {
        $orders = Orders::orderBy('id', 'desc')->with(['orderDetails.products', 'orderDetails.products.toko', 'orderDetails.products.category'])->where('id_user', auth()->id())->get();
        return view('history', compact('orders'));
    }

    public function getAlamatByCluster($clusterId)
    {
        $alamatClusters = Cluster::find($clusterId)->alamatClusters;
        return response()->json($alamatClusters);
    }

    public function getNomorByBlok($blokId)
    {
        $alamatCluster = AlamatCluster::find($blokId);

        if ($alamatCluster) {
            $nomors = $alamatCluster->nomorBloks;
            return response()->json($nomors);
        } else {
            return response()->json(['error' => 'Blok tidak ditemukan.'], 404);
        }
    }

    public function destroyOrder($id)
    {
        try {
            // Cari order berdasarkan ID dan hapus
            $order = Orders::where('id', $id)->where('id_user', auth()->id())->firstOrFail();
            $order->delete();

            return redirect()->back()->with('success', 'Order berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus order: ' . $e->getMessage());
            return redirect()->back()->withErrors(['order' => 'Gagal menghapus order.']);
        }
    }
}
