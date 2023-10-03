<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Thiagoalessio\TesseractOCR\TesseractOCR;

class OCRController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
        ]);

        if ($request->file('image')->isValid()) {
            // Get the uploaded image file
            $imagePath = $request->file('image')->getPathname();

            // Perform OCR on the image
            $text = (new TesseractOCR($imagePath))->run();

            // You can now use $text or save it to a database, display it, etc.

            return view('result_ocr', compact('text'));
        }

        return back()->withErrors(['image' => 'Invalid image file.']);
    }
}


