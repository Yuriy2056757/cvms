<?php

namespace App\Http\Controllers\Cvms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CvmsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('cvms.index');
  }
}