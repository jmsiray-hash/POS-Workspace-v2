<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected UserModel $users;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->users = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->users->findAll();

        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/form', [
            'title' => 'New User',
            'user'  => [],
            'action' => base_url('users'),
        ]);
    }

    public function create()
    {
        $rules = [
            'username' => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return view('users/form', [
                'title' => 'New User',
                'user' => $this->request->getPost(),
                'action' => base_url('users'),
            ]);
        }

        $this->users->insert([
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(base_url('users'))->with('message', 'User created successfully.');
    }

    public function edit(int $id)
    {
        $user = $this->users->find($id);

        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('users/form', [
            'title' => 'Edit User',
            'user' => $user,
            'action' => base_url('users/' . $id),
        ]);
    }

    public function update(int $id)
    {
        $user = $this->users->find($id);

        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        }

        $rules = [
            'username' => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']',
            'full_name' => 'required|max_length[100]',
            'avatar' => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
        ];

        if (! $this->validate($rules)) {
            return view('users/form', [
                'title' => 'Edit User',
                'user' => array_merge($user, $this->request->getPost()),
                'action' => base_url('users/' . $id),
            ]);
        }

        $data = [
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];
        $file = $this->request->getFile('avatar');

        if ($file !== null && $file->isValid() && ! $file->hasMoved()) {
            $filename = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads';

            if (! is_dir($uploadPath) && ! mkdir($uploadPath, 0755, true) && ! is_dir($uploadPath)) {
                throw new \RuntimeException('Unable to create the avatar upload directory.');
            }

            $file->move($uploadPath, $filename);
            service('image')->withFile($uploadPath . DIRECTORY_SEPARATOR . $filename)
                ->fit(300, 300, 'center')
                ->save($uploadPath . DIRECTORY_SEPARATOR . $filename);
            $data['avatar'] = $filename;
        }

        $this->users->update($id, $data);

        return redirect()->to(base_url('users'))->with('message', 'User updated successfully.');
    }
}