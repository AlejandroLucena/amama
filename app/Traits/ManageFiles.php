<?php

namespace App\Traits;

use App\Models\Media;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

trait ManageFiles
{
    public function storeFile(Request $request, $type = null, $path = '', $public = true) {
        try {
            $filename = $request->file($type)->store($path, 's3');

            if ($type == 'image') {
                $t = Media::MEDIA_TYPE_IMAGE;
                $s = 'complete';
                $fn = basename($filename);
                $sid = explode(".", basename($filename))[0];
                $u = str_replace('storage/', '', $filename);
            } elseif ($type == 'document') {
                $t = Media::MEDIA_TYPE_DOC;
                $s = 'complete';
                $fn = basename($filename);
                $sid = explode(".", basename($filename))[0];
                $u = str_replace('storage/', '', $filename);
            } elseif ($type == 'video') {
                $t = Media::MEDIA_TYPE_VIDEO;
                $s = 'pending';
                $fn = explode(".", basename($filename))[0] . '.m3u8';
                $sid = explode(".", basename($filename))[0];
                $u = Media::MEDIA_TYPE_VIDEO . '/' . Media::MEDIA_OBJ_UNIT . '/' . explode(".", basename($filename))[0] . '/' . explode(".", basename($filename))[0] . '.m3u8';
            }

            $media = Media::create([
                'filename' => $fn,
                's3_id' => $sid,
                'type' => $t,
                'status' => $s,
                'url' => $u,
            ]);
            Log::info('MediaController::store > 200 > MEDIA: ' . explode(".", basename($filename))[0]);
            return $media;
        } catch (Exception $e) {
            Log::error('MediaController::store > ' . $e->getMessage() . '[500 Error]');
            return false;
        }
    }

    public function removeFile(Media $media) {
        $this->removeS3File($media->url);
        $media->units()->detach();
        $media->delete();
    }

    public function getUrlFile($url) {
        
        if(Config::get('app.mode') == 'demo') :
            return asset('storage/' . $url);
        else:
            $disk = Storage::disk('s3');
            $client = $disk->getDriver()->getAdapter()->getClient();
            $expiry = "+2 seconds";
            $command = $client->getCommand('GetObject', [
                'Bucket' => Config::get('filesystems.disks.s3.bucket'),
                'Key'    => $url
            ]);
            
            $request = $client->createPresignedRequest($command, $expiry);
            return Config::get('filesystems.disks.s3.cloudfront_url') . $request->getUri()->getPath() .  '?' . $request->getUri()->getQuery();
        endif;
    }

    public function removeS3File($url) {
        try{
            if(Config::get('app.mode') == 'demo') :
                return Media::where($url)->delete();
            else :
                $s3 = Storage::disk('s3');
                $s3->delete(Config::get('filesystems.disks.s3.rootfolder') . $url);
                return true;
            endif;
        } catch ( Exception $e) {
            Log::error('MediaController::removeS3File > ' . $e->getMessage() . '[500 Error]');
            return false;
        }
    }

    public function getStorageFolder($type = null) {
        if(Config::get('app.env') == 'production') :
            return Config::get('filesystems.disks.s3.rootfolder');
        else :
            return Config::get('filesystems.disks.public.url');
        endif;
    }
}
