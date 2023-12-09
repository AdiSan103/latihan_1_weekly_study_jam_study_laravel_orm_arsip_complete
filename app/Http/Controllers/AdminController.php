<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    
    protected $storage_blog;
    
    public function __construct()
    {
        $this->storage_blog = '/public/blog/';
    }

    // dashboard_view
    public function dashboard_view() {
        $data = [
            'items' => BlogModel::get(),
        ];
        return view('admin.dashboard', $data);
    }
    // create_view
    public function create_view() {
        $data = [
            'categories' => CategoryModel::get(),
        ];
        return view('admin.create', $data);
    }
    // create_action
    public function create_action(Request $request) {
        // https://laravel.com/docs/10.x/eloquent#inserting-and-updating-models

        // testing isi dari $request / inputan form
        // dd($request);

        // tahap 3
        // validation : https://laravel.com/docs/10.x/validation#manually-creating-validators
        $validator = Validator::make(
            $request->all(), 
            [
                'judul' => 'required',
                'image' => 'required',
                'description' => 'required',
                'id_category' => 'required'
            ],
            [
                'required' => ':attribute harus diisi'
            ]
        );

        if ($validator->fails()) {
            // dd($validator);
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        // tahap 2 upload file
        // time() -> https://www.w3schools.com/php/func_date_time.asp
        $image_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
        // https://laravel.com/docs/10.x/filesystem#automatic-streaming
        Storage::putFileAs(
            // lokasi storage
            // '/public/blog/',
            $this->storage_blog,
            // file
            $request->file('image'),
            // name
            $image_name
        );

        // tahap 1 
        $blog = BlogModel::create([
            'judul' => $request->judul,
            'image' => $image_name,
            'description' => $request->description,
            'id_category' => $request->id_category
        ]);

        // function untuk menyimpan
        $blog->save();

        // sweetalert realrashid
        Alert::success('Berhasiil','data berhasil ditambahkan', 'success');

        // mengarakan -> kembali
        return redirect()->back();
    }
    // detail_view
    public function detail_view($id) {
        // dd($id);
        // $blog = BlogModel::where('id', $id)->get();

        $blog = BlogModel::where('id', $id)->first();
        // https://laravel.com/docs/10.x/queries#retrieving-a-single-row-column-from-a-table
        
        // dd($blog);
        
        //compact -> https://www.w3schools.com/php/func_array_compact.asp
        return view('admin.detail',compact('blog'));
    }
    // update_view
    public function update_view($id) {
        $data = [
            'categories' => CategoryModel::get(),
            'blog' => BlogModel::where('id', $id)->first(),
        ];
        return view('admin.update',$data);
    }
    // update_action
    public function update_action(Request $request) {
        // https://laravel.com/docs/10.x/eloquent#updates

        // dd($request);

        // tahap 3
        // validation : https://laravel.com/docs/10.x/validation#manually-creating-validators
        $validator = Validator::make(
            $request->all(), 
            [
                'judul_baru' => 'required',
                // 'image' => 'required', // karena kondisi ketika tidak diisi maka gambar lama dipakai
                'description_baru' => 'required',
                'id_category_baru' => 'required'
            ],
            [
                'required' => ':attribute harus diisi'
            ]
        );

        if ($validator->fails()) {
            // dd($validator);
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // deklarasi variabel
        $image_lama = BlogModel::where('id', $request->id)->first()->image;

        // tahap 2
        // https://www.w3schools.com/php/func_var_empty.asp
        // empty -> ketika kosong true, sehingga kalau isi dia false, sedangkan kita ingin agar ketika isi menjadi true
        if(!empty($request->file('image_baru'))) {
            // 1. menghapus image lama
            // https://laravel.com/docs/10.x/filesystem#deleting-files
            Storage::delete($this->storage_blog . $image_lama);

            // 2. tambah image baru
            // time() -> https://www.w3schools.com/php/func_date_time.asp
            $image_name = time() . '.' . $request->file('image_baru')->getClientOriginalExtension();
            // https://laravel.com/docs/10.x/filesystem#automatic-streaming
            Storage::putFileAs(
                // lokasi storage
                $this->storage_blog,
                // file
                $request->file('image_baru'),
                // name
                $image_name
            );
        } else {
            // ketika tidak ada gambar baru di tambahkan, menggunakan gambar lama
            $image_name = $image_lama;
        }

        // tahap 1
        BlogModel::where('id', $request->id)->update([
            'judul' => $request->judul_baru,
            'image' => $image_name,
            'description' => $request->description_baru,
            'id_category' => $request->id_category_baru,
        ]);

        // alert
        Alert::success('Berhasil','Pembaharuan berhasil', 'success');

        return redirect()->back();
    }
    // delete_action
    public function delete_action(Request $request) {

        // delete image
        // https://laravel.com/docs/10.x/filesystem#deleting-files
        Storage::delete($this->storage_blog . BlogModel::where('id',$request->id)->first()->image);

        // https://laravel.com/docs/10.x/eloquent#deleting-models
        BlogModel::where('id',$request->id)->delete();
        
        // alert
        Alert::info('Dihapus', 'Berhasil Di Hapus', 'info');

        return redirect()->back();
    }
}
