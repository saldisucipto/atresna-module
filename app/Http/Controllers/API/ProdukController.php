<?php
namespace App\Http\Controllers\API;

use App\Http\Classes\FilesHandling;
use App\Http\Controllers\Controller;
use App\Models\ImagesProduk;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Str;

class ProdukController extends Controller
{
// kategori produk
    public function kat_index(Request $req)
    {
        if ($req->isMethod('get')) {
            $data = KategoriProduk::get()->all();
            if (empty($data)) {{
                return response()->json(['data' => 'Belum Ada Datanya', 'message' => 'berhasil memperoleh data'], 200);
            }}
            return response()->json(['data' => $data, 'message' => 'berhasil memperoleh data'], 200);
        } else {
            $dataParsing = $req->all();
            $fileHandling = new FilesHandling();
            $katProduk = new KategoriProduk();
            $katProduk->slugs = Str::slug($dataParsing['nama_kat_produk']);
            $katProduk->nama_kat_produk = $dataParsing['nama_kat_produk'];
            $katProduk->deskripsi_kat_produk = $dataParsing['deskripsi_kat_produk'];
            $katProduk->images_kat_produk = $fileHandling->upload($req->file('images_kat_produk'), 'kategori-produk', 'IMG-KAT-PRODUK');
            $katProduk->save();
            return response()->json(['data' => $dataParsing, 'message' => 'berhasil Membuat data'], 201);
        }
    }
// update dan get Sepesial Data
    public function updateData(Request $req, $slugs = null)
    {
        $dataParsing = $req->all();
        $imageParse = $req->file('images_kat_produk');
        $data = KategoriProduk::find($slugs);
        $fileHandling = new FilesHandling();
        if ($req->isMethod('GET')) {
            return response()->json(['data' => $data, 'message' => 'Data Berhasil di Ambil'], 200);
        } else if ($req->isMethod('POST')) {
            $data->slugs = Str::slug($dataParsing['nama_kat_produk']);
            $data->nama_kat_produk = $dataParsing['nama_kat_produk'];
            $data->deskripsi_kat_produk = $dataParsing['deskripsi_kat_produk'];
            if ($imageParse) {
                $fileHandling->update($data->images_kat_produk, 'kategori-produk');
                $data->images_kat_produk = $fileHandling->upload($req->file('images_kat_produk'), 'kategori-produk', 'IMG-KAT-PRODUK');
            }
            $data->update();
            return response()->json(['data' => $data, 'message' => 'Data Berhasil di Update'], 201);
        } else if ($req->isMethod('DELETE')) {
            $fileHandling->update($data->images_kat_produk, 'kategori-produk');
            $data->delete();
            return response()->json(['data' => $data, 'message' => 'Data Berhasil di Hapus'], 200);
        }
    }

    // produk and images produk
    public function pdk_index(Request $req)
    {
        if ($req->isMethod('get')) {
            $data = Produk::get()->all();
            if (empty($data)) {{
                return response()->json(['data' => [], 'message' => 'Belum Ada Data'], 200);
            }}
            return response()->json(['data' => $data, 'message' => 'berhasil memperoleh data'], 200);
        } else if ($req->isMethod('POST')) {
            $dataParsing = $req->all();
            $imagesFile = $req->file('images_produk');
            $fileHandling = new FilesHandling();
            $produkData = new Produk();
            $produkData->slugs = Str::slug($dataParsing['nama_produk']);
            $produkData->id_kat_produk = $dataParsing['id_kat_produk'];
            $produkData->nama_produk = $dataParsing['nama_produk'];
            $produkData->deskripsi_produk = $dataParsing['deskripsi_produk'];
            $produkData->link_produk_tokopedia = $dataParsing['link_produk_tokopedia'];
            $produkData->save();
            if ($imagesFile) {
                foreach ($imagesFile as $imagesProduk) {
                    $produkImagesDB = new ImagesProduk();
                    $produkImagesDB->id_produk = Str::slug($dataParsing['nama_produk']);
                    $produkImagesDB->images_produk_file = $fileHandling->upload($imagesProduk, 'produk-images', 'IMG-PRODUK');
                    $produkImagesDB->save();
                }
            }
            return response()->json(['data' => $dataParsing, 'message' => 'berhasil Membuat data'], 201);
        }
    }

    // get images produk
    public function getImagesProduk(Request $req, $produkID = null)
    {
        $imagesProduk = ImagesProduk::with('produk')->where('id_produk', $produkID)->get();
        return response()->json(['data' => $imagesProduk, 'message' => 'berhasil Mengambil data'], 200);

    }

}
