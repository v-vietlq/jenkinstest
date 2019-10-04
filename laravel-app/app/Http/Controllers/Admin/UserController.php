<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\User\UserRepository;
use App\Repositories\Info\InfoRepository;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Controllers\Controller;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */

class UserController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.user.';

    /**
     * @var RouteName
     */
    private $route = 'admin.user.';

    /**
     * @var Message
     */
    private $message = 'message.user.';

    /**
     * @var UserRepository
     */
    private $user;

    /**
     * @var InfoRepository
     */
    private $info;

    /**
     * UserController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user,InfoRepository $info)
    {
        $this->user = $user;

        $this->info = $info;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = $this->user->getAllNoLimit();
        return view($this->view.'index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user_data = array(
            'email'    => $request->email,
            'password' => $request->password,
            'level'    => $request->level,
            'status'   => ($request->status == "on") ? "on": "off"
        );

        $user = $this->user->create($user_data);

        $user_info = array(
            'fullname'         => $request->fullname,
            'birthday'         => $request->birthday,
            'phone'            => $request->phone,
            'email'            => $request->email,
            'address'          => $request->address,
            'gender'           => $request->gender,
            'height'           => $request->height,
            'weight'           => $request->weight,
            'driver_license'   => $request->driver_license,
            'company_did'      => $request->company_did,
            'position_did'     => $request->position_did,
            'cv_file'          => $request->cv_file,
            'literacy'         => $request->literacy,
            'years_experience' => $request->years_experience,
            'marital_status'   => $request->marital_status,
            'zalo_phone'       => $request->zalo_phone,
            'user_id'          => $user->id
        );

        $this->info->create($user_info);
        
        if ($request->btnSave) {
            return redirect()->route($this->route.'create')->with('success',__($this->message.'create_success'));
        } else {
            return redirect()->route($this->route.'index')->with('success',__($this->message.'create_success'));
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user']  = $this->user->getById($id);
        $data['info']  = $this->info->getById($id);
        return view($this->view.'edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user_data = array(
            'email'    => $request->email,
            'level'    => $request->level,
            'status'   => ($request->status == "on") ? "on": "off"
        );

        if (empty($request->password)) {
            $user                  = $this->user->getById($id);
            $user_data['password'] = $user->password;
        } else {
            $request->validate(
                [
                    'password'           => 'confirmed|min: 6',
                ],
                [
                    'password.confirmed' => __($this->message.'password_confirmed'),
                    'password.min'       => __($this->message.'password_min')
                ]
            );
                
            $user_data['password'] = bcrypt($request->password);
        }

        $this->user->update($user_data,$id);

        $user_info = array(
            'fullname'         => $request->fullname,
            'birthday'         => $request->birthday,
            'phone'            => $request->phone,
            'email'            => $request->email,
            'address'          => $request->address,
            'gender'           => $request->gender,
            'height'           => $request->height,
            'weight'           => $request->weight,
            'driver_license'   => $request->driver_license,
            'company_did'      => $request->company_did,
            'position_did'     => $request->position_did,
            'cv_file'          => $request->cv_file,
            'literacy'         => $request->literacy,
            'years_experience' => $request->years_experience,
            'marital_status'   => $request->marital_status,
            'zalo_phone'       => $request->zalo_phone,
            'user_id'          => $id
        );

        $this->info->update($user_info,$id);
        
        if ($request->btnSave) {
            return redirect()->route($this->route.'edit',['id' => $id])->with('success',__($this->message.'edit_success'));
        } else {
            return redirect()->route($this->route.'index')->with('success',__($this->message.'edit_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->info->removeByUserId($id);
        $this->user->remove($id);
        return redirect()->route($this->route.'index')->with('success',__($this->message.'delete_success'));
    }
}
