<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel');
    }

    public function view()
    {
       $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5;

        $all = $this->UserModel->page($q, $records_per_page, $page);
        $data['users'] = $all['records'];
        $total_rows = $all['total_rows'];
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap'); // or 'tailwind', or 'custom'
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'users/view'.'?q='.$q);
        $data['page'] = $this->pagination->paginate();
        $this->call->view('users/view', $data);
    }

    public function create()
    {
        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $imagePath = null;

            // handle file upload
            if (!empty($_FILES['profile']['name'])) {
                $this->call->library('upload', $_FILES["profile"]);
                $this->upload
                    ->set_dir('uploads')
                    ->allowed_extensions(['jpg','jpeg','png'])
                    ->allowed_mimes(['image/jpeg','image/png'])
                    ->max_size(5)   // 5MB max
                    ->is_image()
                    ->encrypt_name();

                if ($this->upload->do_upload()) {
                    $imagePath = 'uploads/' . $this->upload->get_filename();
                } else {
                    echo implode('<br>', $this->upload->get_errors());
                    return;
                }
            }

            $data = [
                'username'   => $username,
                'email'      => $email,
                'image_path' => $imagePath
            ];

            try {
                $this->UserModel->insert($data);
                redirect('users/view');
            } catch (Exception $e) {
                echo 'Something went wrong while creating user: ' . htmlspecialchars($e->getMessage());
            }
        } else {
            $this->call->view('users/create');
        }
    }

    public function update($id)
    {
        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $imagePath = null;

            if (!empty($_FILES['profile']['name'])) {
                $this->call->library('upload', $_FILES["profile"]);
                $this->upload
                    ->set_dir('uploads')
                    ->allowed_extensions(['jpg','jpeg','png'])
                    ->allowed_mimes(['image/jpeg','image/png'])
                    ->max_size(5)
                    ->is_image()
                    ->encrypt_name();

                if ($this->upload->do_upload()) {
                    $imagePath = 'uploads/' . $this->upload->get_filename();
                } else {
                    echo implode('<br>', $this->upload->get_errors());
                    return;
                }
            }

            $data = [
                'username' => $username,
                'email'    => $email
            ];

            if ($imagePath !== null) {
                $data['image_path'] = $imagePath;
            }

            try {
                $this->UserModel->update($id, $data);
                redirect('users/view');
            } catch (Exception $e) {
                echo 'Something went wrong while updating user: ' . htmlspecialchars($e->getMessage());
            }
        } else {
            $data['user'] = $this->UserModel->find($id);
            $this->call->view('users/update', $data);
        }
    }

    public function delete($id)
    {
        if ($this->UserModel->delete($id)) {
            redirect('users/view');
        } else {
            echo 'Something went wrong while deleting user';
        }
    }
}
