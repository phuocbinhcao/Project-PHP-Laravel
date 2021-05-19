<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class SliderAdminController extends Controller
{
    use StorageImageTrait;

    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request){

        try{
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'Image_path', 'slider');
            
            if(!empty($dataImageSlider)){
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
    
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');

        }catch(\Exception $exception){
            Log::error('Loi :' . $exception->getMessage() . '--Line: ' . $exception->getLine());
        }
    }
}
