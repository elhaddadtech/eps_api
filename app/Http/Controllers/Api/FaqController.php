<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller {
  public function index(Request $request, $destinationId) {
    $lang = $request->get('lang', 'fr');
    $faqs = Faq::where('destination_id', $destinationId)
      ->where('language', $lang)
      ->orderBy('order_index')
      ->get(['id', 'question', 'answer']);

    return response()->json($faqs);
  }
}
