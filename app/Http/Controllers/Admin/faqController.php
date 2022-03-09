<?php

namespace App\Http\Controllers\Admin;

use App\Models\faq;
use Illuminate\Http\Request;

use App\Http\Requests\faq\faqrequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\faq\deleterequest;
use App\Http\Requests\faq\updaterequest;
use RealRashid\SweetAlert\Facades\Alert;


class faqController extends Controller
{   
    public function index(){

        $faqs=faq::get();
        return view('Admin/faq/index',compact('faqs'));
    }
    public function create(){
        
        return view('Admin/faq/create');
        
    }
    public function store(faqrequest $request){
        faq::create([
            'question'=>$request->question,
            'answer'=>$request->answer,
        ]);
        Alert::success('Success', 'FAQ Added Successfully');
        return redirect()->back();
    }
    
    public function delete(deleterequest $request)
    {
        faq::where('id',$request->faq_id)->delete();
        Alert::alert('Success', 'FAQ delete Successfully');
        return redirect()->back();
    }
    public function edit($faq_id)
    {
        $faq=faq::find($faq_id);
        return view('Admin/faq/edit',compact('faq'));

    }
    public function update(updaterequest $request){
        $faq=faq::find($request->faq_id);
        $faq->update([
            'question'=>$request->question,
            'answer'=>$request->answer,
        ]);
        Alert::alert('Success', 'FAQ update Successfully');
        return redirect(route('admin.faq.index'));
    }
}
