define(["jquery", "dummies/dummy2"], function($, dummy2) {
    return {
        sayHello: function() {

            console.log( dummy2.saySomething('hello world') );

            return true;
        }
    }
});