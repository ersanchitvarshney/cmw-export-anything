<?php
namespace CodeMyWP\Plugins\ExportAnything;

// Security check to prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<div class="d-flex justify-content-between p-3 bg-light rounded border mb-3" id="export-<?= esc_attr($export->id) ?>">
    <div class="export-info">
        <h5 class="mb-1">Export #<?= esc_html($export->id) ?></h5>
        <p class="mb-0"><span>Date: </span><span class="fw-semibold"><?= esc_html(date("d M Y h:i:s A", strtotime($export->created_at))) ?></span></p>
    </div>
    <div class="export-actions">
        <?php 
        switch($export->status) {
            case 'pending':
                if($export->page > 1) {
                    ?>
                    <a href="#" class="btn btn-primary btn-sm resume-export" data-export-id="<?= esc_attr($export->id) ?>">Resume</a>
                    <?php
                } else {
                    ?>
                    <a href="#" class="btn btn-primary btn-sm start-export" data-export-id="<?= esc_attr($export->id) ?>">Start</a>
                    <?php
                }
                break;
            case 'processing':
                ?>
                <a href="#" class="btn btn-secondary btn-sm disabled">Processing</a>
                <?php
                break;
            case 'completed':
                ?>
                <form class="d-inline-block" action="<?= esc_url(admin_url('admin-post.php')) ?>" method="POST">
                    <?php wp_nonce_field('cmw_ea_download_export', 'cmw_ea_nonce'); ?>
                    <input type="hidden" name="action" value="cmw_ea_download_export">
                    <input type="hidden" name="export_id" value="<?= esc_attr($export->id) ?>">
                    <button type="submit" class="btn btn-success btn-sm">Download</button>
                </form>
                <?php      
                break;
            case 'failed':
                ?>
                <a href="#" class="btn btn-secondary btn-sm disabled">Failed</a>
                <?php
                break;
        }
        ?>
        <a href="#" class="btn btn-outline-danger btn-sm delete-export" data-export-id="<?= esc_attr($export->id) ?>">Delete</a>
    </div>
</div>