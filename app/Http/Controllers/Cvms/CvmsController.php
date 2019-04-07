<?php

namespace App\Http\Controllers\Cvms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CvmsController extends Controller
{
  public function index()
  {
    return view('cvms.index');
  }
}
