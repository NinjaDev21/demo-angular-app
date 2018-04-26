<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Heros;

class HerosController extends Controller
{
    public function index(){

        $allHeros = Heros::get();
        return response()->json([
            'status' => 200,
            'response' =>  $allHeros
        ],200);
    }

    public function addHero(Request $request){
        try{
            $heroName = $request->name;
            if($heroName){
                $saveHero = new Heros;
                $saveHero->name = $heroName;
                $saveHero->dp = 'blank';
                if($saveHero->save()){
                    return response()->json([

                        'status' => 200,
                        'response' =>  $saveHero
                    ],200);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'faild to save hero !',
                        'data' => []
                    ], 400);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Enter hero name !',
                    'data' => []
                ], 400);
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }
    }

    public function deleteHero($id){
        try{
            if($id){
                $deleteHero = Heros::find($id);
                if(count($deleteHero)){
                    if($deleteHero->delete()){
                        return response()->json([
                            'status' => 200,
                            'message' => 'hero deleted !',
                            'response' =>  $deleteHero
                        ],200);
                    }
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'data not found !',
                        'data' => []
                    ], 400);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'hero id not found !',
                    'data' => []
                ], 400);
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }
    }

    public function getHero($id){
        try{
            if($id){
                $getHero = Heros::find($id);
                if(count($getHero)){
                        return response()->json([
                            'status' => 200,
                            'message' => 'hero deleted !',
                            'response' =>  $getHero
                        ],200);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'data not found !',
                        'data' => []
                    ], 400);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'hero id not found !',
                    'data' => []
                ], 400);
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }
    }

    public function updateHero(Request $request){
        try{
            $id = $request->id;
            $heroName = $request->name;
            if($id){
                $getHero = Heros::find($id);
                if(count($getHero)){
                    $getHero->name =$heroName;
                    if($getHero->save()){
                        return response()->json([
                            'status' => 200,
                            'message' => 'hero Updated !',
                            'response' =>  $getHero
                        ],200);
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => 'data not Updated !',
                            'data' => []
                        ], 400);
                    }
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'data not found !',
                        'data' => []
                    ], 400);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'hero id not found !',
                    'data' => []
                ], 400);
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }
    }

    public function searchHero(Request $request){
        try{
            $name = $request->name;
            if($name){
                $getHero = Heros::where('name','like','%'.$name.'%')->get();
                if($getHero){
//                    return response()->json([
//                        'status' => 200,
//                        'message' => 'hero found !',
//                        'response' => $getHero
//                    ],200);
                    return $getHero;
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'hero not found !',
                        'data' => []
                    ], 400);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'hero name is not found !',
                    'data' => []
                ], 400);
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'errorLineNo' => $e->getLine(),
                'data' => []
            ], 500);
        }
    }
}
