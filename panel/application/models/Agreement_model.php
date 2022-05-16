<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agreement_model extends CI_Model{

     var $dir_path="";

    public function __construct(){
        parent::__construct();

    $this->dir_path=dirname(dirname(__dir__));

    }

public function add($data){
   
    if($this->db->insert('agreement', $data)){
        return $this->db->insert_id();
    }else{
        return false;
    }
}
    

  public function ownerAgreement(){
        $user=$this->auth_model->get_logged_user();
        $client_ids = implode(",", $this->input->post('client_id'));
        $property_ids = implode(",", $this->input->post('property_id'));
        if($this->input->post('sale') == 1){
            $asking_prices = implode(",", $this->input->post('asking_price'));
        }
       if($this->input->post('rent') == 1){
            $requested_rents = implode(",", $this->input->post('requested_rent'));
        }
        if($this->input->post('exclusivity') == 0){
            $from_date = null;
            $untill = null;
        }else{
            $from_date = $this->input->post('from_date');
            $untill    = $this->input->post('untill');
        }
        if($this->input->post('exclusivity') == 0){
            $data = array(
                'user_id'        => $user->id,
                'rent'           => $this->input->post('rent'),
                'months_of_rent' => $this->input->post('months_of_rent'),
                'sale'            => $this->input->post('sale'),
                'percent'        => $this->input->post('percent'),
                'comments'       => $this->input->post('comments'),
                'client_id'      => $client_ids,
                'property_id'    => $property_ids,
                'asking_price'   => $asking_prices,
                'requested_rent' => $requested_rents,
                'exclusivity'    => $this->input->post('exclusivity'),
                'from_date'      => $from_date,
                'untill'         => $untill,
                'status'         => $this->input->post('agree_pro'),
                'type'           => $this->input->post('type'),
            );
            $query = $this->db->insert('agreement', $data);
             $insert_id = $this->db->insert_id();
            $query = $this->db->get_where('agreement', array('id' => $insert_id)); //get inserted data
            return $query->result_array();
        }else{
                $data = array( 
                        array(
                            'user_id'        => $user->id,
                            'rent'           => $this->input->post('rent'),
                            'months_of_rent' => $this->input->post('months_of_rent'),
                            'sale'            => $this->input->post('sale'),
                            'percent'        => $this->input->post('percent'),
                            'comments'       => $this->input->post('comments'),
                            'client_id'      => $client_ids,
                            'property_id'    => $property_ids,
                            'asking_price'   => $asking_prices,
                            'requested_rent' => $requested_rents,
                            'exclusivity'    => $this->input->post('exclusivity'),
                            'from_date'      => $from_date,
                            'untill'         => $untill,
                            'status'         => $this->input->post('agree_pro'),
                            'type'           => $this->input->post('type'),
                        ),
                        array(
                            'user_id'        => $user->id,
                            'rent'           => $this->input->post('rent'),
                            'months_of_rent' => $this->input->post('months_of_rent'),
                            'sale'            => $this->input->post('sale'),
                            'percent'        => $this->input->post('percent'),
                            'comments'       => $this->input->post('comments'),
                            'client_id'      => $client_ids,
                            'property_id'    => $property_ids,
                            'asking_price'   => $asking_prices,
                            'requested_rent' => $requested_rents,
                            'exclusivity'    => $this->input->post('exclusivity'),
                            'from_date'      => $from_date,
                            'untill'         => $untill,
                            'status'         => $this->input->post('agree_pro'),
                            'type'           => 'exclusive',
                        ),
                        );
            $query = $this->db->insert_batch('agreement', $data);
             $insert_id = $this->db->insert_id();
            $query = $this->db->get_where('agreement', array('id' => $insert_id)); //get inserted data
            return $query->result_array();
        }
        
       
    }

public function get_data_by_id($id){

    $this->db->where('id',$id);
    return $this->db->get('agreement')->row();

}

public function get_data($order='DESC'){

    $this->db->order_by('agreement.id',$order);
    $this->db->join('users', 'agreement.user_id = users.id');
    $this->db->select('agreement.*,users.username, users.email,users.avatar,users.role');
    return $this->db->get('agreement')->result();
}

public function get_signed_agreements($order='DESC'){

    $this->db->order_by('customer_signed_agreements.id',$order);
    $this->db->join('agreement', 'customer_signed_agreements.agreement_id = agreement.id');
    $this->db->join('users', 'customer_signed_agreements.client_id = users.id');
    $this->db->select('customer_signed_agreements.*,users.username, users.email,users.avatar,users.role,agreement.user_id');
    return $this->db->get('customer_signed_agreements')->result();
}

public function get_data_row_by_where($where){

    $this->db->where($where);
    return $this->db->get('agreement')->row();

}  

public function get_pending_agreement(){
    $result=$this->get_data_table_by_where('agreement',['status'=>'0']);
   
    return $result;
}

   public function get_active_agreement(){
        $result=$this->get_data_table_by_where('agreement',['status'=>'1']);
       
        return $result;
    }

    public function get_data_table_by_where($table,$where=false,$order_by='DESC'){

        if($where){
           $this->db->where($where);
        } 

        $this->db->order_by('id',$order_by);
        $query = $this->db->get($table);
        return $query->result();
    }


 public function get_pending_agreement_count(){

    $this->db->where('status', "0");
    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results('agreement');
    return $result;
}

 public function get_active_agreement_count(){

    $this->db->where('status', "1");
    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results('agreement');
    return $result;
}

 
public function get_agreement_count(){

    $this->db->where('status','1');
    $this->db->order_by('id', 'DESC');
    $result = $this->db->count_all_results('agreement');
    return $result;

}

public function get_last_users(){

    $query=$this->db->get('agreement');
    return $query->result();
}

public function delete($id){
    $this->db->where('agreement_id',$id)->delete('customer_signed_agreements');
    $this->db->where('agreement_id',$id)->delete('deleted_agreements');
    $this->db->where('id',$id);
    $result=$this->db->delete('agreement');

    return $result;
}

   
}