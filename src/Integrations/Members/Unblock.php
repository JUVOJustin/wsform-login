<?php

namespace WSForm_Login\Integrations\Members;

class Unblock
{

    public function unblock(bool $is_private) {

        global $post;
        if (empty($post)) {
            return $is_private;
        }

        $ids_to_unblock= [
            cmb2_get_option( 'wsform_login', 'login', null ),
            cmb2_get_option( 'wsform_login', 'forgot_password', null ),
            cmb2_get_option( 'wsform_login', 'reset_password', null )
        ];

        if (in_array($post->ID, $ids_to_unblock)) {
            return false;
        }

        return true;

    }

}