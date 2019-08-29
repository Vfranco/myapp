<?php

namespace Core;

use Database\Database;

class Components extends Helper
{
    static function logoSystem($empresa)
    {
        ?>
        <a class="navbar-brand pt-0" href="/dashboard/index/<?php echo self::encodeData($empresa); ?>">
            <img src="<?php echo BASE_URL ?>Content/assets/img/brand/blue.png" class="navbar-brand-img">            
        </a>
        <?php
    }

    static function isMobile()
    {
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
    }
}
