<?php
if(!empty(\Request::segment(3)) && \Request::segment(3) == "contactus" && intval(\Request::segment(4)) != 0) {
    $contact_request = \UiStacks\Contactus\Models\ContactusTrans::where('contact_id', \Request::segment(4))->first();
    if (count($contact_request) > 0){
        $contact_request->is_read = "1";
        $contact_request->save();
    }
}
//$unread_contact = \UiStacks\Contactus\Models\ContactusTrans::where('is_read', "0")->count();
$unread_contact = 0;
$adminMenu[12] = [
    'icon' => 'table',
    'list_head' => [
        'name' => trans('Contactus::contactus.manage').' '.trans('Contactus::contactus.contactus'),
        'link' => '/'.App::getLocale().'/admin/contactus',
    ],
    'list_tree'=> [
        0 => [
            'name' => trans('Contactus::contactus.contactus').' '.trans('Contactus::contactus.sections'),
            'link' => '/'.App::getLocale().'/admin/contactus-section',
        ],
        1 => [
            'name' => trans('Contactus::contactus.all').' '.trans('Contactus::contactus.contactus'),
            'link' => '/'.App::getLocale().'/admin/contactus',
            'badge' => "<span class='pull-right badge'>". intval($unread_contact) ."</span>",
        ]
    ]
];