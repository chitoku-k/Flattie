<?php
class Flattie_Scripts extends WP_Scripts {
    public function print_extra_script( $handle, $echo = true ) {
        $output = parent::print_extra_script( $handle, false );

        if ( ! $output ) {
            return;
        }
        if ( ! $echo ) {
            return $output;
        }

        echo "<script>\n{$output}\n</script>\n";
        return true;
    }

    public function print_inline_script( $handle, $position = 'after', $echo = true ) {
        $output = parent::print_inline_script( $handle, $position, false );

        if ( ! $output ) {
            return false;
        }
        if ( $echo ) {
            echo "<script>\n{$output}\n</script>\n";
        }

        return $output;
    }
}
