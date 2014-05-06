<?php
/*
#########################
Model: Book
���Ѳ��: �.���ķ��� ͹ص���������
�Ѳ�������: 2014-02-11 11:11 AM
���㹻�Сͺ����
Database: BookStore
========
Book (books)
========
- bookId
- bookTitle
- bookAuthor
- bookISDN
- bookDate
========
+ add()
+ findByPK($bookId)
+ findByKeyword($field, $value)
+ findByAll()
+ delete()
#########################
*/
class Book extends CI_Model
{
	var $bookId; //PK
	var $bookTitle; //����˹ѧ���
	var $bookAuthor; //���ͼ����
	var $bookISDN; //����˹ѧ���
	var $bookDate; //�ѹ���˹ѧ������
	
	function __construct()
	{
		$this->load->database();
		parent::__construct();
	}
	
	###### SET : bookId (PK) ######
	function setBookId($bookId)
	{
		$this->bookId = $bookId;
	}

	###### GET : bookId (PK) ######
	function getBookId()
	{
		return $this->bookId;
	}

	###### SET : bookTitle (����˹ѧ���) ######
	function setBookTitle($bookTitle)
	{
		$this->bookTitle = $bookTitle;
	}

	###### GET : bookTitle (����˹ѧ���) ######
	function getBookTitle()
	{
		return $this->bookTitle;
	}

	###### SET : bookAuthor (���ͼ����) ######
	function setBookAuthor($bookAuthor)
	{
		$this->bookAuthor = $bookAuthor;
	}

	###### GET : bookAuthor (���ͼ����) ######
	function getBookAuthor()
	{
		return $this->bookAuthor;
	}

	###### SET : bookISDN (����˹ѧ���) ######
	function setBookISDN($bookISDN)
	{
		$this->bookISDN = $bookISDN;
	}

	###### GET : bookISDN (����˹ѧ���) ######
	function getBookISDN()
	{
		return $this->bookISDN;
	}
	
	###### SET : bookDate (�ѹ���˹ѧ������) ######
	function setBookDate($bookDate)
	{
		$this->bookDate = $bookDate;
	}

	###### GET : bookDate (�ѹ���˹ѧ������) ######
	function getBookDate()
	{
		return $this->bookDate;
	}

	function add()
	{
		$this->db->insert('books', $this);
	}
	
	function findByPK($bookId)
	{
		$where = array(
			'bookId'	=> $this->getBookId()
		);
		$query = $this->db->get_where('books', $where);
		return $query;
	}
	
	### $this->Book->findByKeyword('bookTitle', '����͵����') ###
	function findByKeyword($field, $value)
	{
		## Ẻ LIKE ##
		$this->db->like($field, $value);		
		$query = $this->db->get('books');
		
		## Ẻ WHERE ##		
		//$where = array(
		//	$field	=> $value
		//);		
		//$query = $this->db->get_where('books', $where);
		
		return $query;
	}

	function findByAll()
	{
		$query = $this->db->get('books');
		return $query;
	}
	
	function delete()
	{
		$where = array(
			'bookId'	=> $this->getBookId()
		);	
		$this->db->delete('books', $where);
	}
}
?>