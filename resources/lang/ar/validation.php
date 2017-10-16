<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => ':attribute لابد أن يكون بصيغة صحيحة',
    'after'                => ':attribute يجب أن يكون بعد :date.',
    'alpha'                => ':attribute لابد ان يحتوي على حروف فقط.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'تأكيد :attribute غير صحيح.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => ':attribute لابد أن يكون بصيغة صحيحة.',
    'filled'               => ':attribute مطلوب لاتمام العملية.',
    'exists'               => 'The selected :attribute is invalid.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'max'                  => [
        'numeric' => ':attribute لابد ألا يزيد عن :max',
        'file'    => ':attribute لابد ألا يزيد عن :max كيلو بايت.',
        'string'  => ':attribute لابد ألا يزيد عن :max حرف.',
        'array'   => ':attribute لابد ألا يزيد عدده عن :max',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => ':attribute لابد ان يكون أكثر من :min.',
        'file'    => ':attribute لابد ان يكون أكثر من :min كيلو بايت.',
        'string'  => ':attribute لابد ان يكون أكثر من :min حروف.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => ':attribute لابد أن يكون رقم.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => ':attribute مطلوب لاتمام العملية.',
    'required_if'          => ':attribute مطلوب عندما يكون :other من نوع :value.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => ':attribute لا يساوي :other.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'لقد تم استخدام :attribute من قبل.',
    'url'                  => 'The :attribute format is invalid.',
    'section' => 'قسم',
    'captcha' => 'رمز التحقق غير صحيح',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'package_id' => [
            'required_if' => ':attribute مطلوب في حالة أن يكون المستخدم عضو في الموقع.',
        ],
        'phone_number_must_between' => [
            
            
        'required_if' =>  ':attribute  الرجاء إدخال رقم الهاتف الصحيح  9665XXXXXXXX، 05XXXXXXXX، 5XXXXXXXX'],
        'code' => [
            'regex' => ':attribute لابد أن يبدأ بعلامة " + " و أن يكون خمس أرقام أو أقل.',
        ],
        'start_date' => [
            'required_if' => ':attribute مطلوب في حالة أن يكون المستخدم عضو في الموقع.',
        ],
        'end_date' => [
            'required_if' => ':attribute مطلوب في حالة أن يكون المستخدم عضو في الموقع.',
        ],
        'playground_id' => [
            'required_if' => ':attribute مطلوب لاتمام حفظ خبر الملعب.',
        ],
        'contact_playground_id' => [
            'required_if' => ':attribute مطلوب لاتمام الملعب.',
        ],
        'body' => [
            'required_if' => ':attribute مطلوب لاتمام عملية الحفظ.',
        ],
        'percentage' => [
            'required_if' => ':attribute مطلوب لاتمام عملية الحفظ.',
        ],
        'price' => [
            'required_if' => ':attribute مطلوب لاتمام عملية الحفظ.',
        ],
        'user_id' => [
            'required_if' => 'المستخدم مطلوب لاتمام عملية الحفظ.',
        ],
        'login_user_name' => [
            'required' => 'من فضلك أدخل الايميل أو رقم الجوال',
        ],
        'login_password' => [
            'required' => 'من فضلك أدخل كلمة المرور',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'category' => 'التصنيف',
        'section' => 'القسم',
        'department' => 'القسم',
        'summary' => 'الملخص',
        'body' => 'المحتوى',
        'body_en' => 'المحتوى',
        'body_ar' => 'المحتوى',
        'title_ar' => 'العنوان',
        'title_en' => 'العنوان',
        'title' => 'العنوان',
        'summary_ar' => 'الملخص',
        'summary_en' => 'الملخص',
        'description_ar' => 'الوصف',
        'description' => 'الوصف',
        'mail' => 'البريد الالكتروني',
        'email' => 'البريد الالكتروني',
        'subject' => 'موضوع الرسالة',
        'message' => 'نص الرسالة',
        'name' => 'الاسم',
        'full_name' => 'الاسم',
        'phone' => 'رقم الهاتف',
        'cell_phone' => 'رقم الجوال',
        'image' => 'الصورة',
        'country' => 'الدولة',
        'country_id' => 'الدولة',
        'city_id' => 'المدينة',
        'area_id' => 'المنطقة',
        'name_ar' => 'الاسم',
        'name_en' => 'الاسم',
        'url' => 'الرابط',
        'main_image_id' => 'الصورة الرئيسية',
        'start_date' => 'تاريخ البدء',
        'end_date' => 'تاريخ الانتهاء',
        'first_answer' => 'الاجابة الأولى',
        'second_answer' => 'الاجابة الثانية',
        'gender' => 'الجنس',
        'answers' => 'الاجابات',
        'captcha' => 'رمز التحقق',
        'album' => 'الألبوم',
        'order_en' => 'الترتيب',
        'order_ar' => 'الترتيب',
        'order' => 'الترتيب',
        'url_en' => 'الرابط',
        'url_ar' => 'الرابط',
        'answer' => 'الصوت',
        'inclusion' => 'التضمين',
        'sound' => 'الملف الصوتي',
        'price' => 'السعر',
        'password' => 'كلمة المرور',
        'package_id' => 'الباقة',
        'playground_id' => 'الملعب',
        'owner_id' => 'العضو',
        'amount' => 'القيمة',
        'code' => 'الرمز',
        'fee_type_id' => 'نوع الرسم',
        'percentage' => 'النسبة',
        'count' => 'العدد',
        'months_count' => 'عدد الشهور',
        'package_price' => 'سعر الباقة',
        'account_owner_name' => 'اسم صاحب الحساب',
        'account_number' => 'رقم الحساب',
        'bank_name' => 'اسم المبنك',
        'note' => 'ملاحظات',
        'limit' => 'الحد الأقصى للاستخدام',
        'password_confirm' => 'تأكيد كلمة المرور',
        'contact_playground_id' => 'الملعب',
        'side' => 'جهة الارسال',
        'department_id' => 'القسم',
        'countryCode' => 'رمز الدولة',
        'terms_and_conditions' => 'الشروط و الأحكام',
        'terms_and_conditions_ar' => 'الشروط و الأحكام',
        'subscriber' => 'المشترك',
        'period' => 'الفترة',
        'periods' => 'الفترات',
        'max_periods_for_day' => 'الفترات التي يمكن اضافتها في اليوم الواحد',
        'max_years_for_pricing' => 'الحد الأقصي للتسعير المستقبلي',
        'username' => 'الجوال او البريد الإلكترونى',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'user_id' => 'رمز المستخدم',
        'area' => 'المنطقة',
        'province' => 'المحافظة',
        'city' => 'المدينة',
        'accept_roles' => 'الموافقة علي الشروط والقوانين',
        'icon ' => 'الايقونة',
        'model_id' => 'موديل السيارة ',
        'type_id'=>'نوع السيارة',
        'contact_info' => 'معلومات الاتصال',
        'contact_information' => 'معلومات الاتصال',
        'company_id'=>'التصنيف',
        'will_pay' => 'سوف تدفع الرسوم',
        'your_account_inactive' => 'لا يمكنك متابعة حسابك غير نشط',
        'confirmation_code_doesnt_match ' => 'Activation key is incorrect',
        'comment' => 'يرجى إضافة تعليق',
        'html_content' => 'حقل المحتوى مطلوب',
        'page_trans_title_ar' => 'يرجى ترجمة العنوان مطلوب توني لإكمال العملية.',
         'phone_number_must_between' => 'الرجاء إدخال رقم الهاتف الصحيح 9665XXXXXXXX، 05XXXXXXXX، 5XXXXXXXX',
    ],

];