<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php'); //Несмотря на выделение желтым, все равно работает

class Api_controller extends REST_Controller
{

    public function index_get()
    {
        /*$response = array(
          'sdfdsf' => 'dfdsfsdf'
        );*/
        $this->load->model('streets');
        $response= $this->streets->streetsLoad();
        $this->response(
            $response, 200
        );
    }

    public function create_post()
    {
      //  $response = array(            'dddddddddddddddddddddddd' => 'dfdsfsdf'        );
        $this->response(
            $response, 200
        );
    }

    public function update_put($id)
    {
      /*  $userId = (int)$id;
        //$databaseRequest = $userId;
        $this->response(
            'PUT'.'-'.$id, 200
        ); */
        $data = array('returned: '. $this->put('id'));
        $this->response($data,200);

    }

    public function remove_delete($id)
    {
        $userId = (int)$id;
        //$databaseRequest = $userId;

        $this->response(
            'DELETE'.'-'.$id, 200
        );
    }

}