<?php
namespace App\Implementations;

use App\Http\Requests\FileRequest;
use App\Interfaces\FileUpdateDeleteInterface;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Models\FileUpload;
use Illuminate\Support\Facades\File;
use App\Services\ChangeLanguageService;

class FileUpdateDeleteImplementation implements FileUpdateDeleteInterface
{

    public function updateFile(FileRequest $request, $id, $languageId)
    {
        $fileData = FileUpload::find($id);
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        
        $fileDataArray = $request->input('files', []);

        if (!$fileData) {
            return response()->json(['message' => 'File not found'], 404);
        }

        $existingFilePath = public_path('storage/' . $fileData->URL);
        File::delete($existingFilePath);

        $typeId        = $request->typeId;
        $filePath      = '';
        $fileExtension = $request->file('files')->getClientOriginalExtension();
        $imgMimes      = ['jpg', 'png', 'jpeg'];

        if ($typeId == 1 && in_array($fileExtension, $imgMimes)) {
            $filePath = $request->file('files')->store('Images/cover', 'public');
        } elseif ($typeId == 2 && in_array($fileExtension, $imgMimes)) {
            $filePath = $request->file('files')->store('Images/slide', 'public');
        } elseif ($typeId == 3 && $fileExtension === 'pdf') {
            $filePath = $request->file('files')->store('Documents/pdf', 'public');
        } else {
            return response()->json(['error' => 'Invalid file type or type ID'], 400);
        }

        $fileData->URL = $filePath;
        $fileData->save();

        return response()->json(['message' => 'File updated successfully']);
    }
    public function deleteFile($id, $languageId)
    {
        $file = FileUpload::find($id);
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        $file = File::find($id);

        if (!$file) {
            return response()->json(['message' =>  __('messages.notFound')], 404);
        }

        $filePath = public_path('storage/' . $file->URL);
        if (File::exists($filePath)) {
            File::delete($filePath);
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
