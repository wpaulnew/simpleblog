<?php

namespace vendor\core;

// https://code-live.ru/post/php-ajax-registration/

class View
{
    public $layout = "layout";
    public $description = "description";
    public $author = "author";
    public $keywords = "keywords";
    public $menu = "default";
    public $footer = "default";
    public $numbers = ["62", "25", "81"];
    public $scripts = "";

    // Отделить скрипты от кода
    public function unScript($template)
    {
        return preg_match('(<script>(.*)<\/script>)', $this->fetchPartial($template, $params), $script);
    }

    // Получить отрендеренный шаблон с параметрами $params
    public function fetchPartial($template, $params = array())
    {
        extract($params);
        ob_start();
        require_once(VIEWS . '/' . $template . '.php');
//        require_once(VIEWS . '/' . $template . '.php');
        return ob_get_clean();
    }

    // Получить отрендеренный в переменную $content layout-а
    // Шаблон с параметрами $params
    public function fetch($template, $params = array())
    {
        $content = $this->fetchPartial($template, $params);

//        $pattern = "#<script(.*?)>(.*?)</script>#si";
        $pattern = "#<script(.*?)>.*?</script>#si";
        preg_match_all($pattern, $content, $scripts);

        if (!empty($scripts)) {
            $this->scripts = $scripts[0];
            $content = preg_replace($pattern, "", $content);
        }

        return $this->fetchPartial("/layouts/".$this->layout, array(
                'description' => $this->description,
                'author' => $this->author,
                'keywords' => $this->keywords,

                'content' => $content,
                'scripts' => $this->scripts,

                'menu' => $this->menu,
                'footer' => $this->footer,

                'numbers' => $this->numbers
            )
        );
    }

    // вывести отрендеренный в переменную $content layout-а
    // шаблон с параметрами $params
    public function render($template, $params = array())
    {
        echo $this->fetch($template, $params);
    }
}