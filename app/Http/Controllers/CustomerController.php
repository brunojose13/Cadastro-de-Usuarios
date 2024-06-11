<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        if (! empty($request->id)) {
            $customer = Customer::find($request->id);
        } else {
            $customer = Customer::all();
        }

        return response()->json([
            'clientes' => $customer->jsonSerialize()
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $customer = Customer::where('cpf', '=', $request->cpf);
        
        $customer->update([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'phone_number' => $request->phoneNumber,
            'age' => $request->age
        ]);
        
        return response()->json([
            'cliente' => $customer->first()->jsonSerialize()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $customer = Customer::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'phone_number' => $request->phoneNumber,
            'age' => $request->age
        ]);

        return response()->json([
            'mensagem' => 'cliente salvo com sucesso.',
            'dados' => $customer->jsonSerialize()
        ]);
    }

    public function delete(Request $request): JsonResponse
    {
        $customer = Customer::find($request->id);

        $cpf = $customer->get('cpf');

        $customer->delete();

        return response()->json([
            'mensagem' => 'cliente foi removido.',
            'cpf desativado do sistema' => $cpf
        ]);
    }
}
