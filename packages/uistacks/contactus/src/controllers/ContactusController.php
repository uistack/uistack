<?php

namespace UiStacks\Contactus\Controllers;

use Illuminate\Http\Request;
use UiStacks\Contactus\Controllers\ContactusApiController as API;
use UiStacks\Contactus\Models\Contactus;
use UiStacks\Contactus\Models\ContactusSection;
use UiStacks\Contactus\Models\ContactusSectionTrans;
use UiStacks\Contactus\Models\ContactusTrans;
use UiStacks\Contactus\Models\ContactusReply;
use UiStacks\Contactus\Models\ContactusReplyTrans;
use UiStacks\Settings\Models\Setting;
use Lang;

//use UiStacks\Pages\Models\Section;

class ContactusController extends ContactusApiController {
    /*
      |--------------------------------------------------------------------------
      | UiStacks Pages Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles Pages for the application.
      |
     */

    public function __construct() {
        $this->api = new API;
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function index(Request $request) {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listItems($request);
//        dd($items);
//        $sections = Section::get();
        return view('Contactus::contactus.index', compact('items', 'sections'));
    }

    public function sectionIndex(Request $request) {
        $request->request->add(['paginate' => 20]);
        $items = $this->api->listSectionItems($request);
        return view('Contactus::contactus.section-index', compact('items', 'sections'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function show(Request $request, $id) {
        $repo = Contactus::where('id', $id)->first();
        $contact_request = ContactusTrans::where('contact_id', $id)->first();
//        $contact_request->is_read = "1";
//        $contact_request->save();
        $name = Setting::find(1)->value;
        $contact_email = Setting::find(3)->value;

        return view('Contactus::contactus.show', ['request' => $contact_request, 'contact_email' => $contact_email]);
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function view($id) {

    }

    /**
     *create contactus section
     */
    public function createSection() {
//        $sections = Section::get();
        return view('Contactus::contactus.create-edit-section', compact('sections'));
    }
    /**
     *create contactus section
     */
    public function create() {
//        $sections = Section::get();
        return view('Contactus::contactus.create-edit', compact('sections'));
    }

    /**
     *store contact section
     */
    public function storeSection(Request $request) {
        $store = $this->api->storeSection($request);
        $store = $store->getData();
        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }
        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Contactus\Controllers\ContactusController@sectionIndex'));
    }
    /**
     *store contact section
     */
    public function store(Request $request) {
        $store = $this->api->storePage($request);
        $store = $store->getData();

        if (isset($store->errors)) {
            return back()->withInput()->withErrors($store->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $store->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Pages\Controllers\PagesController@index'));
    }

    public function editSection($id) {
        $item = ContactusSection::findOrFail($id);
        $trans = ContactusSectionTrans::where('section_id', $id)->get()->keyBy('lang')->toArray();
        return view('Contactus::contactus.create-edit-section', compact('item', 'trans'));
    }

    public function updateSection(Request $request, $id)
    {
        $update = $this->api->updateContactSection($request, '', $id);

        if($update == "Duplicate Entry Present")
            return back();
        $update = $update->getData();

        if(isset($update->errors)){
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if($request->back){
            return back();
        }
        return redirect(action('\UiStacks\Contactus\Controllers\ContactusController@sectionIndex'));
    }
    /**
     *
     *
     * @param
     * @return
     */
    public function edit($id) {
        $item = Page::findOrFail($id);
        $trans = PageTrans::where('page_id', $id)->get()->keyBy('lang')->toArray();
//        $sections = Section::get();
        return view('Contactus::contactus.create-edit', compact('item', 'trans'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function update(Request $request, $id) {
        $update = $this->api->updatePage($request, '', $id);
        $update = $update->getData();

        if (isset($update->errors)) {
            return back()->withInput()->withErrors($update->errors);
        }

        \Session::flash('alert-class', 'alert-success');
        \Session::flash('message', $update->message);

        if ($request->back) {
            return back();
        }
        return redirect(action('\UiStacks\Pages\Controllers\PagesController@index'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function confirmDelete($id) {
        $item = Page::findOrFail($id);
        return view('Pages::ads.confirm-delete', compact('item'));
    }

    /**
     *
     *
     * @param
     * @return
     */
    public function bulkOperationsSection(Request $request) {
        if ($request->ids) {
            $items = ContactusSection::whereIn('id', $request->ids)->get();
            if ($items->count()) {
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if ($request->operation && $request->operation === 'activate') {
                        $item->active = true;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    } elseif ($request->operation && $request->operation === 'deactivate') {
                        $item->active = false;
                        $item->save();
                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }
                }
            }
            \Session::flash('alert-class', 'alert-success');
        } else {
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }

    public function bulkOperations(Request $request) {
        if ($request->ids) {
//            $items = Contactus::whereIn('id', $request->ids)->get();
            $items = ContactusTrans::whereIn('contact_id', $request->ids)->get();
//            dd($items);
            if ($items->count()) {
                foreach ($items as $item) {
                    // Do something with your model by filter operation
                    if ($request->operation && $request->operation === 'read') {
                        $item->is_read = true;
                        $item->save();
//                        \Session::flash('message', trans('Core::operations.activated_successfully'));
                    } elseif ($request->operation && $request->operation === 'unread') {
                        $item->is_read = false;
                        $item->save();
//                        \Session::flash('message', trans('Core::operations.deactivated_successfully'));
                    }
                }
            }
            \Session::flash('alert-class', 'alert-success');
        } else {
            \Session::flash('alert-class', 'alert-warning');
            \Session::flash('message', trans('Core::operations.nothing_selected'));
        }
        return back();
    }
    //contact us section
    public function changeSectionStatus($id = "") {
        if ($id != "") {
            $repo = ContactusSection::where('id', $id)->first();
            $repo->active = !($repo->active);
            $repo->save();
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('Contactus::contactus.status_changed_successfully'));
            return back();
        } else {
            return back();
        }
    }
    //contact us
    public function changeStatus($id = "") {
        if ($id != "") {
//            $repo = Contactus::where('id', $id)->first();
            $repo = ContactusTrans::where('contact_id', $id)->first();
            if($repo->is_read == "1"){
                $repo->is_read = 0;
            }else{
                $repo->is_read = 1;
            }
            $repo->save();
            \Session::flash('alert-class', 'alert-success');
            \Session::flash('message', trans('Contactus::contactus.status_changed_successfully'));
            return back();
        } else {
            return back();
        }
    }

}
