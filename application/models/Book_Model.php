<?php

class Book_Model extends CI_Model
{




    public function get($table)
    {

        return $this->db->get($table)->result();
    }

    public function get_one_book($where)
    {

        return $this->db->get_where('t_books', $where)->row_array();
    }

    public function get_limit($table, $limit)
    {

        return $this->db->get($table, $limit, 0)->result();
    }

    public function get_book_discount()
    {

        $this->db->select('*');
        $this->db->from('t_books a');
        $this->db->join('t_book_detail b', 'a.book_id = b.book_id');
        $this->db->join('t_categories c', 'a.book_category = c.category_id');
        $this->db->where('a.book_discount !=', 0);

        $query = $this->db->get()->result();

        return $query;
    }

    public function get_books()
    {

        $this->db->select('*');
        $this->db->from('t_books a');
        $this->db->join('t_book_detail b', 'a.book_id = b.book_id');
        $this->db->join('t_categories c', 'a.book_category = c.category_id');

        $query = $this->db->get()->result();

        return $query;
    }

    public function get_books_where($where)
    {

        $this->db->select('*');
        $this->db->from('t_books a');
        $this->db->join('t_book_detail b', 'a.book_id = b.book_id');
        $this->db->join('t_categories c', 'a.book_category = c.category_id');

        if ($where != null) {

            $this->db->like($where);
        }

        $query = $this->db->get()->result();

        return $query;
    }

    public function ct_book($where)
    {

        $this->db->select('*');
        $this->db->from('t_books a');
        $this->db->join('t_book_detail b', 'a.book_id = b.book_id');
        $this->db->join('t_categories c', 'a.book_category = c.category_id');

        if ($where != null) {

            $this->db->like($where);
        }

        $query = $this->db->get()->num_rows();

        return $query;
    }

    public function get_book_detail($book_id)
    {

        $this->db->select('*');
        $this->db->from('t_books a');
        $this->db->join('t_book_detail b', 'a.book_id = b.book_id');
        $this->db->join('t_categories c', 'a.book_category = c.category_id');
        $this->db->where('a.book_id', $book_id);

        $query = $this->db->get()->row_array();

        return $query;
    }

    public function get_count_book_cat()
    {
        $this->db->select('*, count(a.book_category) book_count');
        $this->db->from('t_books a');
        $this->db->join('t_categories c', 'a.book_category = c.category_id', 'RIGHT');
        $this->db->group_by('c.category_id');

        $query = $this->db->get()->result();

        return $query;
    }

    public function get_order()
    {

        $this->db->select('*');
        $this->db->from('t_order a');
        $this->db->join('t_order_status b', 'a.order_status = b.status_id');
        $this->db->where('a.user_id', $this->session->userdata('user_id'));


        $query = $this->db->get()->result();

        return $query;
    }

    public function get_detail_order($order_id)
    {

        $this->db->select('*');
        $this->db->from('t_order a');
        $this->db->join('t_order_status b', 'a.order_status = b.status_id');
        $this->db->join('t_payments e', 'a.payment_id = e.payment_id');
        $this->db->where('a.order_id', $order_id);


        $query = $this->db->get()->row_array();

        return $query;
    }

    public function get_detail_book($order_id)
    {

        $this->db->select('*');
        $this->db->from('t_order_detail a');
        $this->db->join('t_books b', 'a.goods_id = b.book_id');
        $this->db->where('a.order_id', $order_id);


        $query = $this->db->get()->result();

        return $query;
    }

    public function get_all_order()
    {

        $this->db->select('*');
        $this->db->from('t_order a');
        $this->db->join('t_order_status b', 'a.order_status = b.status_id');


        $query = $this->db->get()->result();

        return $query;
    }
}