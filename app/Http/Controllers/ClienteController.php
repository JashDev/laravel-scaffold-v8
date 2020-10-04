<?php

namespace App\Http\Controllers;

use App\Models\Cliente\Cliente;
use App\Models\Cliente\ClienteRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteController extends Controller
{
  protected $clienteRepository;

  public function __construct(ClienteRepository $clienteRepository)
  {
    $this->clienteRepository = $clienteRepository;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    $dataCliente = request()->input();
    $isFromCliente = request('isCliente', false);

    [$rules, $messages] = $this->clienteRepository->validateNewCliente($dataCliente);

    CheckValidate($dataCliente, $rules, $messages);

    $newCliente = new Cliente($dataCliente);

    if ($isFromCliente) {
      $newCliente->created_by_cliente = true;
    }

    $cliente = $this->clienteRepository->newCliente($newCliente);

    return response([
      'cliente' => $cliente
    ], Response::HTTP_CREATED);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Obtener un cliente por su numero de documento
   */
  public function getByDocumento($documento)
  {
    $cliente = $this->clienteRepository->findByDocumento($documento);

    CheckModel($cliente, 'No se ha obtenido un registro con el documento solicitado');

    return response([
      'message' => 'Cliente obtenido',
      'cliente' => $cliente
    ], Response::HTTP_OK);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
