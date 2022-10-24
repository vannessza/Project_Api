<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Mahasiswamodel');
    }

    public function index_get()
    {
        $result = $this->Mahasiswamodel->getMahasiswa();
        // var_dump($result);
        $this->response(
            [
                'status' => true,
                'code' => 200,
                'message' => 'Data Mahasiswa berhasil ditampilkan',
            ],
            REST_Controller::HTTP_OK
        );
    }

    public function sendmail_post()
    {
        $to_email = $this->post('email');
        $this->load->library('email');
        $this->email->from('vannesss@antech.my.id', 'Vanness');
        $this->email->to($to_email);
        $this->email->subject('Letter from Vanness');
        $this->email->message('
            <html>
                <head>
                    <title>Letter from Vanness</title>
                </head>
                <body>
                    <h1>Letter from Vanness</h1>
                    <p>Dear ' . $to_email . ',</p>
                    <p>Thank you for your interest in our company. We are pleased to inform you that we have received your application and we will be in touch with you shortly.</p>
                    <p>Best regards,</p>
                    <p>Vanness</p>
                </body>
            </html>
        ');

        if ($this->email->send()) {
            $this->response(
                [
                    'status' => true,
                    'code' => 200,
                    'message' => 'Email berhasil dikirim',
                ],
                REST_Controller::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'code' => 404,
                    'message' => 'Email gagal dikirim',
                ],
                REST_Controller::HTTP_BAD_REQUEST
            );
        }
    }
}
