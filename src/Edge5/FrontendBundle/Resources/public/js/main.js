/*!
 * Your Application
 * Copyright 2014 Edge5 AG
 * http://www.edge5.com
 *
 * Authors: You and yourself
 */

requirejs.config({
    "paths": {
        "jquery": "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min"
    }
});

require(['jquery', 'src/animatable'], function($, animatable){


    $(function() {

		// Run animatable
		animatable.init(null,null,null, 200);

    });

});