<?php

namespace App\Traits;

use Illiuminate\Support\Facades\Log;

trait DeleteModelTrait{
    
    public function deleteModelTrait($id, $model){
        try{
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        
        }catch(\Exception $exception){
            
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',

            ]);
        }
    }
}