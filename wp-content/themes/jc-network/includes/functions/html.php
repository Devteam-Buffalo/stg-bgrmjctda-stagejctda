<?php
/*
**  @file               html.php
**  @description        Generate an HTML element with escaped attributes and content. Content is NOT escaped.
**  @package            jctda
**  @since              2.1.0
**  @author             lpeterson
**  @date               5/5/18
**  
**  @param string $tag
**  
**  @return string
**  
**  Usage:
**  
**  Basic
**  
**      Input: html( 'p', 'Hello world!' );
**      Output: <p>Hello world!</p>
**  
**  Attributes
**  
**      Input: html( 'a', [ 'href' => 'http://example.com' ], 'A link' );
**      Output: <a href="http://example.com">A link</a>
**  
**  Boolean Attributes
**  
**      Input: html( 'input', [ 'type' => 'checkbox', 'name' => 'foo', 'checked' => true ] );
**  
**      Output: <input type="checkbox" name="foo" checked="checked" />
**  
**      Input: html( 'input', [ 'type' => 'checkbox', 'name' => 'foo', 'checked' => false ] );
**  
**      Output: <input type="checkbox" name="foo" />
**  
**  Multiple arguments as content
**  
**  Input:
**  
**  html( 'ul',
**    html( 'li', 'foo' ),
**    html( 'li', 'bar' )
**  );
**  
**  Output: <ul><li>foo</li><li>bar</li></ul>
**  
*/
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'html' ) ) :

	function html( $html = null ) {

		if ( isset( $html ) ) {

			// List of self-closing tags (void elements)
			//
			// A void element is an element whose content model never allows it to have contents under any circumstances.
			//
			// @link https://html.spec.whatwg.org/multipage/embedded-content.html#embedded-content
			static $void = [ 'area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'link', 'meta', 'param', 'source', 'track', 'wbr' ];


			$args = func_get_args();
			$html = array_shift( $args );


			if ( is_array( $args[0] ) ) {


				$close = $html;
				$atts = array_shift( $args );


				foreach ( $atts as $k => $v ) {

					if ( false === $v ) 
						continue;
					
					if ( true === $v ) 
						$v = $k;


					if ( array_key_exists( $k, [ 'href', 'src' ] ) ) {

						$v = esc_url_raw( $v, [ 'http', 'https' ] );

					}
					else {

						$v = esc_attr( $v );

					}


					$html .= ' ' . $k . '="' . $v . '"';

				}

			}
			else {

				[ $close ] = explode( ' ', $html, 2 );

			}


			if ( array_key_exists( $close, $void ) ) 
				return apply_filters( 'filter_html', wp_kses_post( "<{$html}>" ) );


			$content = implode( '', $args );


			return apply_filters( 'filter_html', wp_kses_post_deep( "<{$html}>{$content}</{$close}>" ) );

		}

	}

endif;