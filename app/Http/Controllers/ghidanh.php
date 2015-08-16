<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: ghidanh.php,v 1.0 2015/08/10 16:39 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers;

class ghidanh extends Controller
{
    public function dangky()
    {
        return view('pages.ghidanh');
    }
}