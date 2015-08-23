<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: ghidanhfr.php,v 1.0 2015/08/24 01:16 htien Exp $
 */

namespace NhaThieuNhi\Http\Requests;

class ghidanhfr extends Request
{
    public function authorize()
    {
        return TRUE;
    }

    public function rules()
    {
        return [
            'email'=>'required',
            'htt'=>'required',
            'dc'=>'required',
            'sdt'=>'required',
            'ht'=>'required',
            'mh'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Nhập thông tin :attribute.',
            'email.required'=>'Email đâu?'
        ];
    }
}