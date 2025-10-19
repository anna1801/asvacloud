<?php 
// Pagination Arrow
    function pagination_arrow_shortcode() {
        $arrow ='<div class="pagination_arrow">
                    <div class="arrow arrow-prev">
                        <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="65.5" y="65.5" width="65" height="65" rx="32.5" transform="rotate(-180 65.5 65.5)" stroke="#575757"/>
                            <mask id="mask0_376_136" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="15" y="15" width="36" height="36">
                            <rect x="51" y="51" width="36" height="36" transform="rotate(-180 51 51)" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_376_136)">
                            <path d="M26.7375 31.4998L43.5 31.4998C43.925 31.4998 44.2813 31.6436 44.5688 31.9311C44.8563 32.2186 45 32.5748 45 32.9998C45 33.4248 44.8563 33.7811 44.5688 34.0686C44.2813 34.3561 43.925 34.4998 43.5 34.4998L26.7375 34.4998L34.0875 41.8498C34.3875 42.1498 34.5313 42.4998 34.5187 42.8998C34.5062 43.2998 34.35 43.6498 34.05 43.9498C33.75 44.2248 33.4 44.3686 33 44.3811C32.6 44.3936 32.25 44.2498 31.95 43.9498L22.05 34.0498C21.9 33.8998 21.7938 33.7373 21.7313 33.5623C21.6688 33.3873 21.6375 33.1998 21.6375 32.9998C21.6375 32.7998 21.6688 32.6123 21.7313 32.4373C21.7938 32.2623 21.9 32.0998 22.05 31.9498L31.95 22.0498C32.225 21.7748 32.5688 21.6373 32.9813 21.6373C33.3938 21.6373 33.75 21.7748 34.05 22.0498C34.35 22.3498 34.5 22.7061 34.5 23.1186C34.5 23.5311 34.35 23.8873 34.05 24.1873L26.7375 31.4998Z" fill="#575757"/>
                            </g>
                        </svg>
                    </div>
                    <div class="arrow arrow-next">
                        <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="65" height="65" rx="32.5" stroke="#575757"/>
                            <mask id="mask0_376_140" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="15" y="15" width="36" height="36">
                            <rect x="15" y="15" width="36" height="36" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_376_140)">
                            <path d="M39.2625 34.5002H22.5C22.075 34.5002 21.7188 34.3564 21.4312 34.0689C21.1437 33.7814 21 33.4252 21 33.0002C21 32.5752 21.1437 32.2189 21.4312 31.9314C21.7188 31.6439 22.075 31.5002 22.5 31.5002H39.2625L31.9125 24.1502C31.6125 23.8502 31.4688 23.5002 31.4813 23.1002C31.4938 22.7002 31.65 22.3502 31.95 22.0502C32.25 21.7752 32.6 21.6314 33 21.6189C33.4 21.6064 33.75 21.7502 34.05 22.0502L43.95 31.9502C44.1 32.1002 44.2062 32.2627 44.2687 32.4377C44.3312 32.6127 44.3625 32.8002 44.3625 33.0002C44.3625 33.2002 44.3312 33.3877 44.2687 33.5627C44.2062 33.7377 44.1 33.9002 43.95 34.0502L34.05 43.9502C33.775 44.2252 33.4312 44.3627 33.0187 44.3627C32.6062 44.3627 32.25 44.2252 31.95 43.9502C31.65 43.6502 31.5 43.2939 31.5 42.8814C31.5 42.4689 31.65 42.1127 31.95 41.8127L39.2625 34.5002Z" fill="#575757"/>
                            </g>
                        </svg>
                    </div>
                </div>';
        return $arrow;
    }
    add_shortcode('pagination_arrow', 'pagination_arrow_shortcode');
// End

// Limit category selection
    function limit_taxonomy_selection_to_one() {
        global $post_type;
        $allowed = array(
            'careers'  => 'career-categorychecklist',
            'expertises' => 'expertise-categorychecklist',
            'post'    => 'categorychecklist',
        );
        if ( array_key_exists( $post_type, $allowed ) ) {
            $checklist_id = esc_js( $allowed[ $post_type ] );
            ?>
            <script type="text/javascript">
            jQuery(document).ready(function($) {
                const catList = $('#<?php echo $checklist_id; ?> input[type="checkbox"]');
                catList.on('change', function() {
                    if ($(this).is(':checked')) {
                        catList.not(this).prop('checked', false);
                    }
                });
            });
            </script>
            <?php
        }
    }
    add_action( 'admin_footer-post.php', 'limit_taxonomy_selection_to_one' );
    add_action( 'admin_footer-post-new.php', 'limit_taxonomy_selection_to_one' );
// End





?>