<?php

namespace App\Core;


class Pagination
{

    private $total_pages;
    private $current_page;

    public function __construct(int $total_pages, int $current_page) {
        $this->total_pages = $total_pages;
        $this->current_page = $current_page;
    }

    public function generateMarkup() : string {
        $pagination_html = '<ul class="pagination">';
        $prev_page = ($this->current_page > 1) ? $this->current_page - 1 : 1;
        $next_page = ($this->current_page < $this->total_pages) ? $this->current_page + 1 : $this->total_pages;
    
        // Generate "First" and "Previous" links
        if ($this->current_page > 1) {
            $pagination_html .= '
                <li class="page-item">
                    <a class="page-link rounded text-center" href="' . linkPage($prev_page) . '">‹</a>
                </li>
            ';
        }
    
        // generate the page links
        $pagination_html .= '<li class="page-item';
        if ($this->current_page == 1) {
            $pagination_html .= ' active';
        }
        $pagination_html .= '"><a href="'.linkPage(1).'" class="page-link rounded text-center">1</a></li>';
    
        $start_page = max(2, $this->current_page - 2);
        $end_page = min($this->total_pages , $this->current_page + 1);
        
    
        if ($this->current_page > 4) {
            $pagination_html .= '
                <li class="page-item disabled">
                    <a class="page-link rounded text-center">...</a>
                </li>';
        }
    
        for ($i = $start_page; $i <= $end_page; $i++) {
            $active_class = ($i == $this->current_page) ? ' active' : '';
            $pagination_html .= '
                <li class="page-item' . $active_class . '">
                    <a href="' . linkPage($i) . '" class="page-link rounded text-center">' . $i . '</a>
                </li>';
        }
    
        if ($this->current_page < $this->total_pages - 2) {
            $pagination_html .= '
                <li class="page-item disabled">
                    <a class="page-link rounded text-center">...</a>
                </li>';
        }
        
        
        if($this->current_page != $this->total_pages && $this->current_page != $this->total_pages - 1) {
            $pagination_html .= '<li class="page-item';
            if ($this->current_page == $this->total_pages) {
                $pagination_html .= ' active';
            }
            $pagination_html .= '"><a href="' . linkPage($this->total_pages) . '" class="page-link rounded text-center">' . $this->total_pages . '</a></li>';
        }
    
        // Generate "Next" and "Last" links
        if ($this->current_page < $this->total_pages) {
            $pagination_html .= '
                <li class="page-item">
                    <a class="page-link rounded text-center" href="' . linkPage($next_page) . '">›</a>
                </li>';
        }

        $pagination_html .= '</ul>';
        return $pagination_html;
    }
}
