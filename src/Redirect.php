<?php

namespace WSForm_Login;

class Redirect {

    /**
     * Filters the login URL
     *
     * @param string $url    The login URL. Not HTML-encoded.
     * @param string $redirect     The path to redirect to on login, if supplied.
     * @param bool   $force_reauth Whether to force reauthorization, even if a cookie is present.
     *
     * @return string
     */
    public function login_url($url, $redirect, $force_reauth ){

        $post_id = (int) cmb2_get_option( 'wsform_login', 'login' );
        if (empty($post_id)) {
            return $url;
        }
        $url = get_permalink($post_id);

        $url = $this->add_redirect_arg($url, $redirect);

        if ( $force_reauth ) {
            $url = add_query_arg( 'reauth', '1', $url );
        }
        return $url;
    }

    /**
     * Filters the password reset url
     *
     * @param $url
     * @param string $redirect The path to redirect to after password forgot
     * @return string
     */
    public function lostpassword_url( $url, $redirect ){

        $post_id = (int) cmb2_get_option( 'wsform_login', 'forgot_password' );
        if (empty($post_id)) {
            return $url;
        }
        $url = get_permalink($post_id);

        $url = $this->add_redirect_arg($url, $redirect);

        return $url;
    }

    /**
     * @param string $url
     * @param string|null $redirect
     * @return string
     */
    private function add_redirect_arg(string $url, ?string $redirect): string {

        if ( ! empty( $redirect ) ) {
            $url = add_query_arg( 'redirect_to', urlencode( $redirect ), $url );
        }
        return $url;
    }

}