<?php

namespace App\Http\Controllers;

use App\Models\Users\UserRepository;
use Illuminate\Http\Request;

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
    ], 200);
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
    list($rules, $messages) = $this->userRepository->validateNewUser($dataUser);
    CheckValidate($dataUser, $rules, $messages);
    $user = $this->userRepository->newUser($dataUser);

    return response([
      'user' => $user
    ], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = $this->userRepository->findByUsername($id);

    // Función que lanza la exepcion si el usuario no existe (Helpers.php)
    CheckModel($user, 'El usuario no existe');

    return response([
      'user' => $user
    ], 200);
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
