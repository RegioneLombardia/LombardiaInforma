<?php

return [
    'tb_composition' => 'Язык',
    'tb_properties' => 'Свойства',
    'tb_seo' => 'Оптимизация для поисковых движков',
    'tb_seo_title' => 'Заголовок',
    'tb_seo_description' => 'Описание',
    'tb_seo_description_notfound' => 'Описание еще не задано для этой страницы!',
    'tb_seo_link' => 'URL ссылка',
    'tb_seo_keywords' => 'Ключевые слова',
    'tb_seo_keywords_notfound' => 'Ключевые слова не найдены! Вы должны добавить ключевые слова.',
    'tb_seo_warning' => 'Некоторые ключевые слова не найдены в тексте. Лучше исправить это, изменив ключевые слова или текст.',
    'tb_edit_alt' => 'Отредактировать страницу в интерфейсе CMS',
    'tb_visible_not_alt' => 'Эта страница НЕ видна вашим посетителям',
    'tb_visible_alt' => 'Эта страница видна вашим посетителям',
    'block_html_html_label' => 'HTML код',
    'block_html_no_content' => 'HTML код пока не был добавлен.',
    'block_module_name' => 'Модуль',
    'block_module_modulename_label' => 'Название модуля',
    'block_module_modulecontroller_label' => 'Название контроллера (без суффикса)',
    'block_module_moduleaction_label' => 'Название действия (без суффикса)',
    'block_module_moduleactionargs_label' => 'Аргумент (json: {"var":"value"})',
    'block_module_no_module' => 'Модуль еще не создан.',
    'block_module_integration' => 'Интеграция модуля',
    'block_html_name' => 'HTML',
    'block_module_modulename_help' => 'Доступны только зарегистрированные конфигурационные модули.',
    'block_group_dev_elements' => 'Разработка',
    'block_group_layout_elements' => 'Шаблон',
    'block_group_basic_elements' => 'Общие',
    'block_group_project_elements' => 'Проект',
    'block_group_text_elements' => 'Текста',
    'block_group_media_group' => 'Медиа',
    
    // 1.0.0
    'block_module_strictrender' => 'Строгое отображение',
    'block_module_strictrender_help' => 'Когда включено строгое отображение, модуль будет выполнять только предоставленный маршрут (модуль, контроллер, действие, параметры) без выполнения действий и маршрутов контроллера.',
    'block_html_cfg_raw_label' => 'Отображение HTML в админ панели',

    // 3.4.0
    'tag_alias_readme' => 'The alias tag allows you to use aliases defined in your application as well as predefined aliases. As an example, you can use `alias[@web]` to link to images in the public html folder: `<img src="alias[@web]/image.jpg">`',
    'tag_menu_readme' => 'Generate a link to a menu item where the key is the page id (you can see the page ids when hovering over the site navigation in the administration).',
    'tag_page_readme' => 'Get the content of a full page or of a placeholder of a page. The first parameter is the page id (which you get by hovering over the site navigation in the administration): `page[1]`. If you only want to get the content of a placeholder of the cmslayout, use the second parameter: `page[1](placeholderName)`.',
    'block_mirror_language_name' => 'Mirror Language',
    'block_mirror_config_language_label' => 'Source Language',
    'block_mirror_admin_empty_language' => 'Configure a <b><span class="material-icons">edit</span> source language</b> to mirror its content for the current placeholder.',
    'block_mirror_admin_configured_language' => 'Mirroring this placeholder from <span class="material-icons">arrow_right_alt</span> <b>{name}</b>.',
];
