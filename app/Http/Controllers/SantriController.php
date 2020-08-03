<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function dataSantri(){
    	$santri1 = 'Garox';
    	$santri2 = 'Milos';
    	$asal1 = 'Depok';
    	$asal2 = 'Jakarta';

    	return view('santri',
    		compact('santri1','santri2','asal1','asal2')
    	);
    }
}
