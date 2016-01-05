<?php
class m_book extends CI_Model{

    var $bookId = '';
    var $subjectId = '';
    var $state = '';
    var $bookName = '';
    var $publication = '';
    var $time = '';
    var $chiefEditor = '';
    var $associateEditor = '';
    var $superviseEditor = '';
    var $editorWorkplace = '';
    var $type = '';
    var $remark = '';

    function saveInfo(){
        $this->bookId = $this->input->post('bookId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->bookName = $this->input->post('bookName');
        $this->publication = $this->input->post('publication');
        $this->time = $this->input->post('time');
        $this->chiefEditor = $this->input->post('chiefEditor');
        $this->associateEditor = $this->input->post('associateEditor');
        $this->superviseEditor = $this->input->post('superviseEditor');
        $this->editorWorkplace = $this->input->post('editorWorkplace');
        $this->type = $this->input->post('type');
        $this->remark = $this->input->post('remark');

        $id = $this->bookId;
        if($id == 0){
            $this->db->insert('book', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('book', $this, array('bookId' => $this->bookId));
        }
        return $id;
    }

    function getBook($array){
        $this->db->select();
        $this->db->from('lz_book_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getBooks($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('lz_book_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('lz_book_subject');
        $this->db->where('bookId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('lz_book_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('bookId', $id);
        $this->db->update('book', $array);
    }

    function delete($id){
        $this->db->where('bookId',  $id);
        $this->db->delete('book');
    }

    // 获取审核状态
    function  getState($state){
        switch ($state){
            case 0:
                return "待审核";
            case 1:
                return "审核未通过";
            case 2:
                return "审核通过";
        }
    }
}
?>
