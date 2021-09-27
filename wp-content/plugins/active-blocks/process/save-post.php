<?php

function ad_save_post_admin($post_id, $post, $update){
    $slides_data  =  get_post_meta( $post_id, 'slides_data', true );
    $slides_data  = empty($slides_data) ? [] : $slides_data;

    update_post_meta( $post_id, 'slides_data', $slides_data );
}