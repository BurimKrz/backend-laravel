<?php
namespace App\Implementations;

use App\Http\Requests\FileRequest;
use App\Interfaces\FileUpdateDeleteInterface;
use App\Models\File;
use App\Models\FileHasProduct;
use App\Models\FileHasType;
use App\Services\ChangeLanguageService;

class FileUpdateDeleteImplementation implements FileUpdateDeleteInterface
{

    public function updateFile(FileRequest $request, $id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        
        $fileDataArray = $request->input('files', []);

        foreach ($fileDataArray as $fileData) {
            $file = File::find($id);

            if (!$file) {
                return response()->json(['message' => __('messages.fileUpdate')], 404);
            }

            $file->URL = $fileData['URL'];
            $file->save();

        }

        return __('message.fileUpdateS');
    }
    public function deleteFile($id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        $file = File::find($id);

        if (!$file) {
            return response()->json(['message' =>  __('messages.notFound')], 404);
        }

        FileHasProduct::where('file_id', $file->id)->delete();

        FileHasType::where('file_id', $file->id)->delete();

        $file->delete();

        return 'Data deleted successfully';

    }
}
