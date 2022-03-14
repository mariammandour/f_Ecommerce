<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\website_contact;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class contactController extends Controller
{
    public function index()
    {

        $links = website_contact::get();
        return view('Admin/links/index', compact('links'));
    }
    public function edit($links_id)
    {
        $links = website_contact::find($links_id);
        return view('Admin/links/edit', compact('links'));
    }
    public function update(request $request)
    {
        $data =$this->validate($request, [
            "address" => "required",
            "phone" => "required|regex:/^01[0125][0-9]{8}$/",
            "email" => "required|email",
            "facebook" => "required|regex:/^(?:.*)\/(?:pages\/[A-Za-z0-9-]+\/)?(?:profile\.php\?id=)?([A-Za-z0-9.]+)/",
            "twitter" => "required|regex:/^http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/",
            "instegram" => "required|regex:/^http(?:s)?:\/\/(?:www\.)?(?:instagram.com)\/(\w+)/",
            "googlemaps" => "required|regex:/^https?\:\/\/(www\.)?google\.[a-z]+\/maps\b/",
        ]);
        $data = website_contact::find($request->links_id);
        $data->update([
            "address" => $request->address,
            "phone" => $request->phone,
            "email" => $request->email,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "instegram" => $request->instegram,
            "googlemaps" => $request->googlemaps,
        ]);
        Alert::alert('Success', 'links update Successfully');
        return redirect(route('admin.links.index'));
    }
}
