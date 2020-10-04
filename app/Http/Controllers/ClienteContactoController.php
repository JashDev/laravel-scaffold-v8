<?php

namespace App\Http\Controllers;

use App\Models\ClienteContactos\ClienteContacto;
use App\Models\ClienteContactos\ClienteContactoRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteContactoController extends Controller
{
  protected $clienteContactoRepository;

  public function __construct(ClienteContactoRepository $clienteContactoRepository)
  {
    $this->clienteContactoRepository = $clienteContactoRepository;
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
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    $dataClienteContacto = request()->input();

    [$rules, $messages] = $this->clienteContactoRepository->validateNewClienteContacto();

    CheckValidate($dataClienteContacto, $rules, $messages);

    $newClienteContacto = new ClienteContacto($dataClienteContacto);

    $clienteContacto = $this->clienteContactoRepository->newClienteContacto($newClienteContacto);

    return response([
      'cliente_contacto' => $clienteContacto
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

  public function findByDni($dni)
  {
    $clienteContacto = $this->clienteContactoRepository->findByDni($dni);

    CheckModel($clienteContacto, 'No se ha encontrado un contacto de cliente con el DNI ingresado');

    return response([
      'message' => 'Contacto de cliente obtenido',
      'cliente_contacto' => $clienteContacto
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
