<?php

App::import('Vendor', 'MinifyHtml.Minify_HTML', array('file' => 'html.php'));

class MinifyHtmlHelper extends AppHelper {

    public $view;

    public function __construct($view) {

        $this->view = $view;
        parent::__construct($view);
    }

    public function afterLayout($layoutFile = null) {

        $this->view->output = $this->minify_html($this->view->output);
    }

    protected function minify_html($html) {

        $options = array(
            'cssMinifier' => false,
            'jsMinifier' => false,
            'xhtml' => true
        );

        return Minify_HTML::minify($html, $options);
    }
}
