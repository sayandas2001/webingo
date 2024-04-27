<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination {
	/**
	 * Base URL
	 *
	 * The page that we're linking to
	 *
	 * @var	string
	 */
	protected $base_url		= '';

	/**
	 * Prefix
	 *
	 * @var	string
	 */
	protected $prefix = '';

	/**
	 * Suffix
	 *
	 * @var	string
	 */
	protected $suffix = '';

	/**
	 * Total number of items
	 *
	 * @var	int
	 */
	protected $total_rows = 0;

	/**
	 * Number of links to show
	 *
	 * Relates to "digit" type links shown before/after
	 * the currently viewed page.
	 *
	 * @var	int
	 */
	protected $num_links = 3;

	/**
	 * Items per page
	 *
	 * @var	int
	 */
	public $per_page = 15;

	/**
	 * Current page
	 *
	 * @var	int
	 */
	public $cur_page = 0;

	/**
	 * Use page numbers flag
	 *
	 * Whether to use actual page numbers instead of an offset
	 *
	 * @var	bool
	 */
	protected $use_page_numbers = true;

	/**
	 * First link
	 *
	 * @var	string
	 */
	protected $first_link = '&lt;&lt;';

	/**
	 * Next link
	 *
	 * @var	string
	 */
	protected $next_link = '&gt;';

	/**
	 * Previous link
	 *
	 * @var	string
	 */
	protected $prev_link = '&lt;';

	/**
	 * Last link
	 *
	 * @var	string
	 */
	protected $last_link = '&gt;&gt;';

	/**
	 * URI Segment
	 *
	 * @var	int
	 */
	protected $uri_segment = 0;

	/**
	 * Full tag open
	 *
	 * @var	string
	 */
	protected $full_tag_open = '<ul class="pagination">';

	/**
	 * Full tag close
	 *
	 * @var	string
	 */
	protected $full_tag_close = '</ul>';

	/**
	 * First tag open
	 *
	 * @var	string
	 */
	protected $first_tag_open = '<li class="page-item">';

	/**
	 * First tag close
	 *
	 * @var	string
	 */
	protected $first_tag_close = '</li>';

	/**
	 * Last tag open
	 *
	 * @var	string
	 */
	protected $last_tag_open = '<li class="page-item">';

	/**
	 * Last tag close
	 *
	 * @var	string
	 */
	protected $last_tag_close = '</li>';

	/**
	 * Current tag open
	 *
	 * @var	string
	 */
	protected $cur_tag_open = '<li class="page-item active"><span class="page-link">';

	/**
	 * Current tag close
	 *
	 * @var	string
	 */
	protected $cur_tag_close = '</span></li>';

	/**
	 * Next tag open
	 *
	 * @var	string
	 */
	protected $next_tag_open = '<li class="page-item">';

	/**
	 * Next tag close
	 *
	 * @var	string
	 */
	protected $next_tag_close = '</li>';

	/**
	 * Previous tag open
	 *
	 * @var	string
	 */
	protected $prev_tag_open = '<li class="page-item">';

	/**
	 * Previous tag close
	 *
	 * @var	string
	 */
	protected $prev_tag_close = '</li>';

	/**
	 * Number tag open
	 *
	 * @var	string
	 */
	protected $num_tag_open = '<li class="page-item">';

	/**
	 * Number tag close
	 *
	 * @var	string
	 */
	protected $num_tag_close = '</li>';

	/**
	 * Page query string flag
	 *
	 * @var	bool
	 */
	protected $page_query_string = true;

	/**
	 * Query string segment
	 *
	 * @var	string
	 */
	protected $query_string_segment = 'page';

	/**
	 * Reuse query string flag
	 *
	 * @var	bool
	 */
	protected $reuse_query_string = true;

	/**
	 * Attributes
	 *
	 * @var	string
	 */
	protected $_attributes = 'class="page-link"';

	/**
	 * Parse attributes
	 *
	 * @param	array	$attributes
	 * @return	void
	 */
	protected function _parse_attributes($attributes)
	{
		isset($attributes['rel']) OR $attributes['rel'] = TRUE;
		$this->_link_types = ($attributes['rel'])
			? array('start' => 'start', 'prev' => 'prev', 'next' => 'next')
			: array();
		unset($attributes['rel']);

		//$this->_attributes = '';
		foreach ($attributes as $key => $value)
		{
			$this->_attributes .= ' '.$key.'="'.$value.'"';
		}
	}
}