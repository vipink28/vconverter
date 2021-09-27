<?php

function ad_enqueue_block_editor_assets(){
    wp_register_script(
        'ad_blocks_bundle',
        plugins_url('/customblocks/dist/bundle.js', ACTIVE_BLOCKS_URL),
        ['wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-api'],
        filemtime( plugin_dir_path( ACTIVE_BLOCKS_URL ) . '/customblocks/dist/bundle.js')
    );

    wp_enqueue_script( 'ad_blocks_bundle' );
}