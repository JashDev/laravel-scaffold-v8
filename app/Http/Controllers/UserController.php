<?php

namespace App\Http\Controllers;

use App\Models\Users\User;
use App\Models\Users\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
  protected $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = $this->userRepository->allUsers();

    return response([
      'users' => $users
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
    $dataUser = request()->input();

    [$rules, $messages] = $this->userRepository->validateNewEmpleado($dataUser);
    CheckValidate($dataUser, $rules, $messages);
    $newUser = new User($dataUser);
    $user = $this->userRepository->newUser($newUser);

    return response([
      'user' => $user
    ], Response::HTTP_CREATED);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $dni
   * @return \Illuminate\Http\Response
   */
  public function show($dni)
  {
    $empleado = $this->userRepository->findByDni($dni);

    CheckModel($empleado, 'El empleado no existe');

    return response([
      'empleado' => $empleado
    ], Response::HTTP_OK);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $dni
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
