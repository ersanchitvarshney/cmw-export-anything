<?php
namespace CodeMyWP\Plugins\ExportAnything;

// Security check to prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div class="d-flex align-items-center justify-content-center p-3 bg-light rounded border">
    <p class="py-5 fs-4 mb-0 text-secondary"><?php esc_html_e('No exports added yet. Please export to get started!', 'export-anything') ?></p>
</div>