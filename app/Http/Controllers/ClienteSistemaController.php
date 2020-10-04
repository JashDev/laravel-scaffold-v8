<?php

namespace App\Http\Controllers;

use App\Models\ClienteSistemas\ClienteSistema;
use App\Models\ClienteSistemas\ClienteSistemaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClienteSistemaController extends Controller
{
  protected $clienteSistemaRepository;

  public function __construct(ClienteSistemaRepository $clienteSistemaRepository)
  {
    $this->clienteSistemaRepository = $clienteSistemaRepository;
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

  public function loadByCliente($clienteID)
  {
    $clienteSistemas = $this->clienteSistemaRepository->loadByCliente($clienteID);

    CheckArray($clienteSistemas->toArray());

    return response([
      'message' => 'Sistemas del cliente obtenidos',
      'cliente_sistemas' => $clienteSistemas
    ], Response::HTTP_OK);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    $dataClienteSistema = request()->input();

    [$rules, $messages] = $this->clienteSistemaRepository->validateNewClienteSistema();

    CheckValidate($dataClienteSistema, $rules, $messages);

    $newClienteSistema = new ClienteSistema($dataClienteSistema);

    $clienteSistema = $this->clienteSistemaRepository->newClienteSistema($newClienteSistema);

    return response([
      'cliente_sistema' => $clienteSistema
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
