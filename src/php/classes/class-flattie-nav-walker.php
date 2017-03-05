<?php
class Flattie_Nav_Walker extends Walker_Nav_Menu {
    public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
        global $post;
        global $wp_query;
        $indent = '                    ' . ( $depth ? str_repeat( '    ' , $depth ) : '');
        if ( $depth > 0 ) {
            $indent .= str_repeat( '    ' , $depth );
        }

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $classes[] = 'nav-item';
        $classes[] = $args->has_children ? 'dropdown' : '';

        if ( $item->current || $item->current_item_ancestor || $item->current_item_parent ) {
            $classes[] = 'active';
        }
        if ( ! is_search() && isset( $post ) ) {
            if ( $item->object === 'page' ) {
                $current_post = $post;
                while ( $current_post->post_parent ) {
                    if ( (int) $item->object_id === $current_post->post_parent ) {
                        $classes[] = 'active';
                        break;
                    }
                    $current_post = get_post( $current_post->post_parent );
                }
            }
        }
        if ( $depth && $args->has_children ) {
            $classes[] = 'dropdown-submenu';
        }

        $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '    <li id="menu-item-' . $item->ID . '"' . $value . $class_names .'>';

        $attributes[] = ! empty( $item->attr_title ) ? 'title="' . esc_attr( $item->attr_title ) .'"' : '';
        $attributes[] = ! empty( $item->target )  ? 'target="' . esc_attr( $item->target ) .'"' : '';
        $attributes[] = ! empty( $item->xfn ) ? 'rel="' . esc_attr( $item->xfn ) .'"' : '';
        $attributes[] = ! empty( $item->url ) ? 'href="' . esc_attr( $item->url ) .'"' : '';

        if ( $args->has_children ) {
            $attributes[] = 'class="nav-link dropdown-toggle"';
        } else {
            $attributes[] = 'class="nav-link"';
        }

        $item_output = $args->before;
        $item_output .= '<a ' . implode( ' ', $attributes ) . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
        $item_output .= $args->link_after;

        if ( $args->has_children ) {
            $item_output .= ' <span class="caret"></span></a>';
        } else {
            $item_output .= '</a>';
        }
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function start_lvl( &$output, $depth = 0, $args = [] ) {
        $indent = '            ' . str_repeat( ' ', $depth );
        $output .= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
    }

    public function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}
