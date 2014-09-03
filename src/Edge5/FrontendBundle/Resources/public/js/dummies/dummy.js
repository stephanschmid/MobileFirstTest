define(["jquery", "dummies/dummy2"], function($, dummy2) {
    return {
        sayHello: function() {

			if($('h3').length)
			{
				$('h3').html(dummy2.saySomething('hello world'));

				return dummy2.saySomething('hello world');
			}
			else
			{
				return false;
			}
        }
    }
});