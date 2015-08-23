<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: ghidanh.php,v 1.0 2015/08/10 16:39 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers;

use NhaThieuNhi\Http\Requests\ghidanhfr;

class ghidanh extends Controller
{
    public function dangky(ghidanhfr $req)
    {
        \DB::table('hocvien')->insert([
            'email'=>$req->input('email'),
            'hoten'=>$req->input('htt'),
            'diachi'=>$req->input('dc'),
            'sdt'=>$req->input('sdt'),
            'hotenph'=>$req->input('ht'),
            'mhoc'=>$req->input('mh')
        ]);

        $req->session()->flash('status', 'Đăng ký thành công.');

        return redirect()->route('ghidanh');
    }
}