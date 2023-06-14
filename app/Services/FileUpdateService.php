<?php
namespace App\Services;

use App\Http\Requests\FileRequest;
use App\Models\File;

class FileUpdateService
{
    public function updateFile(FileRequest $request, $id)
    {
        $fileDataArray = $request->input('files', []);

        foreach ($fileDataArray as $fileData) {
            $file = File::find($id);

            if (!$file) {
                return response()->json(['message' => __('messages.fileUpdate')], 404);
            }

            $file->URL = $fileData['URL'];
            $file->save();

        }

        return response()->json(['message' => __('messages.fileUpdateS')], 200);
    }
}