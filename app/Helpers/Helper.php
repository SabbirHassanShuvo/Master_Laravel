<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class Helper
{
    /**
     * Handle photo upload and return filename
     *
     * @param Request $request
     * @param string $inputName
     * @param string|null $folder
     * @return string|null
     */
    public static function handlePhoto(Request $request, $inputName = 'photo', $folder = 'uploads/users')
    {
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($folder), $filename);
            return $filename;
        }

        return null;
    }
}
