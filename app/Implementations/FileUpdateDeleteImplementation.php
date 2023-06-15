<?php
namespace App\Implementations;

use App\Http\Requests\FileRequest;
use App\Interfaces\FileUpdateDeleteInterface;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\FileUpload;
use Illuminate\Support\Facades\File;

class FileUpdateDeleteImplementation implements FileUpdateDeleteInterface
{

    public function updateFile(FileRequest $request, $id)
    {
        $fileData = FileUpload::find($id);

        if (!$fileData) {
            return response()->json(['message' => 'File not found'], 404);
        }

        $existingFilePath = public_path('storage/' . $fileData->URL);

        File::delete($existingFilePath);

        $filePath = $request->file('files')->store('pdf', 'public');

        $fileData->URL = $filePath;
        $fileData->save();

        return 'File updated successfully';

    }

    public function deleteFile($id)
    {
        $file = FileUpload::find($id);

        if (!$file) {
            return response()->json(['message' => 'File not found'], 404);
        }

        $filePath = public_path('storage/' . $file->URL);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        FileHasProduct::where('file_id', $file->id)->delete();

        FileHasType::where('file_id', $file->id)->delete();

        $file->delete();

        return 'Data deleted successfully';
    }
}
