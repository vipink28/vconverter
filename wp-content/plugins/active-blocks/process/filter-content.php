<?php

function ad_filter_slides_content( $content ){
    if(!is_singular('slides')){
        return $content;
    }    
}