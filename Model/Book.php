<?php 
	Class Book{
		private $id;
		private $title;
		private $author;
		private $publisher;
		private $quantity;
		private $categoryId;

		function __construct(){}

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getAuthor()
        {
            return $this->author;
        }

        /**
         * @param mixed $author
         */
        public function setAuthor($author)
        {
            $this->author = $author;
        }

        /**
         * @return mixed
         */
        public function getPublisher()
        {
            return $this->publisher;
        }

        /**
         * @param mixed $publisher
         */
        public function setPublisher($publisher)
        {
            $this->publisher = $publisher;
        }

        /**
         * @return mixed
         */
        public function getQuantity()
        {
            return $this->quantity;
        }

        /**
         * @param mixed $quantity
         */
        public function setQuantity($quantity)
        {
            $this->quantity = $quantity;
        }

        /**
         * @return mixed
         */
        public function getCategoryId()
        {
            return $this->categoryId;
        }

        /**
         * @param mixed $categoryID
         */
        public function setCategoryId($categoryId)
        {
            $this->categoryId = $categoryId;
        }

	}
 ?>