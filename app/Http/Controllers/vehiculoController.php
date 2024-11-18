<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\vehiculo;
use Illuminate\Support\Facades\Validator;

class vehiculoController extends Controller
{
    public function index(){
        $vehiculo = vehiculo::all();

        if ($vehiculo->isEmpty()){
            return response()->json(['message' => 'No hay vehiculos registrados'],200);
        }

        return response()->json($vehiculo, 200);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'tipovehiculo'=> 'required',
            'descripcion'=> 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $vehiculo = vehiculo::create([
            'tipovehiculo' => $request->tipovehiculo,
            'descripcion' => $request->descripcion,
        ]);

        if (!$vehiculo) {
            $data = [
                'message' => 'Error al resgistrar el vehiculo',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'vehiculo' => $vehiculo,
            'status' => 201
        ];

        return response()->json($data, 201);

    }

    public function show($id)
    {
        $vehiculo = vehiculo::find($id);

        if (!$vehiculo) {
            $data = [
                'message' => 'Vehiculo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'vehiculo' => $vehiculo,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
    
    public function destroy($id)
    {
        $vehiculo = vehiculo::find($id);

        if (!$vehiculo) {
            $data = [
                'message' => 'Vehiculo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        
        $vehiculo->delete();

        $data = [
            'message' => 'Vehiculo eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $vehiculo = vehiculo::find($id);

        if (!$vehiculo) {
            $data = [
                'message' => 'vehiculo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'tipovehiculo' => 'required|max:255',
            'descripcion' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $vehiculo->tipovehiculo = $request->tipovehiculo;
        $vehiculo->descripcion = $request->descripcion;
        $vehiculo->save();

        $data = [
            'message' => 'Vehiculo actualizado',
            'vehiculo' => $vehiculo,
            'status' => 200
        ];

        return response()->json($data, 200);

    }

    public function updatePartial(Request $request, $id)
    {
        $vehiculo = vehiculo::find($id);

        if (!$vehiculo) {
            $data = [
                'message' => 'vehiculo no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'tipovehiculo' => 'max:255',
            'descripcion' => '',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if ($request->has('tipovehiculo')) {
            $vehiculo->tipovehiculo = $request->tipovehiculo;
        }

        if ($request->has('descripcion')) {
            $vehiculo->descripcion = $request->descripcion;
        }

        $vehiculo->save();

        $data = [
            'message' => 'Vehiculo actualizado',
            'vehiculo' => $vehiculo,
            'status' => 200
        ];

        return response()->json($data, 200);

    }
}
