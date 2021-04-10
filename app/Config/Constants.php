<?php

namespace App\Config;

class Constants
{
    public const COREUI_CSS_STYLE = 'coreui/css/style.min.css';

    public const COREUI_ICONS_CSS_FREE = 'coreui/icons/css/free.min.css';

    public const COREUI_ICONS_SVG_FREE = 'coreui/icons/svg/free.svg';

    public const COREUI_JS_COREUIBUNDLE = 'coreui/js/coreui.bundle.min.js';
    public const COREUI_ICONS_JS_SVGXUSE = 'coreui/icons/js/svgxuse.min.js';

    public const API_URL_REGISTER = 'http://localhost:8001/api/user/create/';
    public const API_URL_TOKEN = 'http://localhost:8001/api/user/token/';

    public static function get_svg(string $svg, string $name)
    {
        return "{$svg}#{$name}";
    }
}
