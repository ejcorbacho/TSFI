<?php

namespace App\Http\Controllers;
use App\Lib\Codebird\Codebird;
use Illuminate\Http\Request;

class beTwitterController extends Controller {

    private $codenird;

    public function __construct() {
        $this->codebird = new Codebird;
    }

    public function postToTwitter( Request $request ) {
        codebird::setConsumerKey( 'rYvJAXd3M3tCektEx93IeDHYu', '9ahe0Axcx1Hhn1nw5EFJvOaJDnaHzoYXyIdNTa3xwW7ncYlTTs' ); // static, see README

        $cb = codebird::getInstance();

        $cb->setToken( '824645144590880768-bxG3ymJD8AekDy6BSTfNvjbSRbLxWNp', '6nVUDtD7kcE2V201qbrgEW152XkePVDsXdC4lpThZzWmu' );

        $status = $request->input( 'data' );

        if ( isset( $status ) ) {
            $reply = $cb->statuses_update( 'status=' . urlencode( $status ) );
        }

        return 'Molt bé, ha funcionat';
    }
}