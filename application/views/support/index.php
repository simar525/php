<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="support">
                    <nav class="nav-breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo lang_base_url(); ?>"><?php echo trans("home"); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= trans("help_center"); ?></li>
                        </ol>
                    </nav>
                    <h1 class="page-title main-title"><strong><?= trans("how_can_we_help"); ?></strong></h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="search-container">
                                <div class="search">
                                    <form action="<?= generate_url('help_center', 'search'); ?>" method="get">
                                        <input type="text" name="q" class="form-control form-input" placeholder="<?= trans("search"); ?>" required>
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#222222" viewBox="0 0 16 16" class="mds-svg-icon">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php if (!empty($support_categories)):
                            foreach ($support_categories as $item):?>
                                <div class="col-sm-4">
                                    <?php if ($item->num_content > 0): ?>
                                        <a href="<?= generate_url('help_center') . '/' . html_escape($item->slug); ?>" class="a-box-support">
                                            <div class="box-support">
                                                <h3 class="title"><?= html_escape($item->name); ?></h3>
                                                <span><?= trans_with_field('num_articles', $item->num_content); ?></span>
                                            </div>
                                        </a>
                                    <?php else: ?>
                                        <div class="box-support">
                                            <h3 class="title"><?= html_escape($item->name); ?></h3>
                                            <span><?= trans_with_field('num_articles', $item->num_content); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach;
                        endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>