<?php
class Pagination {
	private $queryString;
	private $pageKey;
	private $totalPage;
	private $totalRecord;
	public function __construct($queryString, $pageKey, $totalPage, $totalRecord) {
		$this->queryString = $queryString;
		$this->pageKey = $pageKey;
		$this->totalPage = $totalPage;
		$this->totalRecord = $totalRecord;
	}
	public function toString() {
		$paginationContainer = new HtmlTag ( 'div', array (
				'class' => 'pagination pagination-right'
		) );
		$paginationContainer->addChildren ( new HtmlTag ( 'div', array (
				'style' => 'float:left; padding-top:6px;'
		), lbl_total . $this->totalRecord . '/' . $this->totalPage . lbl_page ) );
		$paginationUl = new HtmlTag ( 'ul' );
		$paginationContainer->addChildren ( $paginationUl );
		$pageIndex = (isset ( $_GET [$this->pageKey] )) ? $_GET [$this->pageKey] : 1;
		$queryString = $this->queryString;

		$h = round ( $pageIndex / 2 );
		if ($h > 2) {
			$f = $pageIndex - 2;
			$l = $pageIndex + 2;
			$l = ($l > $this->totalPage) ? $this->totalPage : $l;
		} else {
			$f = 1;
			$l = 5;
			$l = ($this->totalPage < 5) ? $this->totalPage : $l;
		}

		if ($this->totalPage > 1) {
			if ($pageIndex > 1 && $this->totalRecord > 0) {
				$queryString [$this->pageKey] = 1;
				$paginationUl->addChildren ( new HtmlTag ( 'li', array (), '<a href="?' . http_build_query ( $queryString, '', '&' ) . '">First</a>' ) );
				$queryString [$this->pageKey] = $pageIndex - 1;
				$paginationUl->addChildren ( new HtmlTag ( 'li', array (), '<a href="?' . http_build_query ( $queryString, '', '&' ) . '">&laquo;</a>' ) );
			} else {
				$paginationUl->addChildren ( new HtmlTag ( 'li', array (
						'class' => 'disabled'
				), '<a>'.lbl_first.'</a>' ) );
				$paginationUl->addChildren ( new HtmlTag ( 'li', array (
						'class' => 'disabled'
				), '<a>&laquo;</a>' ) );
			}
				
			for($i = $f; $i <= $l; $i ++) {
				if ($i == $pageIndex) {
					$paginationUl->addChildren ( new HtmlTag ( 'li', array (
							'class' => 'active'
					), '<a>' . $i . '</a>' ) );
				} else {
					$queryString [$this->pageKey] = $i;
					$paginationUl->addChildren ( new HtmlTag ( 'li', array (), '<a href="?' . http_build_query ( $queryString, '', '&' ) . '">' . $i . '</a>' ) );
				}
			}
				
			if ($pageIndex != $this->totalPage && $this->totalRecord > 0) {
				$queryString [$this->pageKey] = $pageIndex + 1;
				$paginationUl->addChildren ( new HtmlTag ( 'li', array (), '<a href="?' . http_build_query ( $queryString, '', '&' ) . '">&raquo;</a>' ) );
				$queryString [$this->pageKey] = $this->totalPage;
				$paginationUl->addChildren ( new HtmlTag ( 'li', array (), '<a href="?' . http_build_query ( $queryString, '', '&' ) . '">Last</a>' ) );
			} else {
				$paginationUl->addChildren ( new HtmlTag ( 'li', array (
						'class' => 'disabled'
				), '<a>&raquo;</a>' ) );
				$paginationUl->addChildren ( new HtmlTag ( 'li', array (
						'class' => 'disabled'
				), '<a>'.lbl_last.'</a>' ) );
			}
		} else {
			$paginationUl->addChildren ( new HtmlTag ( 'li', array (
					'class' => 'disabled'
			), '<a>1</a>' ) );
		}

		return $paginationContainer->toString ();
	}
}