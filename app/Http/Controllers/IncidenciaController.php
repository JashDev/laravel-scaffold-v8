<?php

namespace App\Http\Controllers;

use App\Models\Incidencias\Incidencia;
use App\Models\Incidencias\IncidenciaRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IncidenciaController extends Controller
{
  protected $incidenciaRepository;

  public function __construct(IncidenciaRepository $incidenciaRepository)
  {
    $this->incidenciaRepository = $incidenciaRepository;
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
    $dataIncidencia = request()->input();

    [$rules, $messages] = $this->incidenciaRepository->validateNewIncidencia();

    CheckValidate($dataIncidencia, $rules, $messages);

    $newIncidencia = new Incidencia($dataIncidencia);
    $newIncidencia->estado_id = 1;

    $incidencia = $this->incidenciaRepository->newIncidencia($newIncidencia);

    // TODO: enviar un correo al responsable que registar la incidencia con la información de su incidencia

    return response([
      'incidencia' => $incidencia
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
    $incidencia = $this->incidenciaRepository->findByID($id);

    CheckModel($incidencia, 'No se pudo encontrar ningun registro, verifique su código');

    return response([
      'message' => 'Incidencia obtenida',
      'incidencia' => $incidencia
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
