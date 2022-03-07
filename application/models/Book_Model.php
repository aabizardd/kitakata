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

            $this->db->where($where);
        }

        $query = $this->db->get()->result();

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
        $this->db->join('t_categories c', 'a.book_category = c.category_id');
        $this->db->group_by('a.book_category');

        $query = $this->db->get()->result();

        return $query;
    }
}