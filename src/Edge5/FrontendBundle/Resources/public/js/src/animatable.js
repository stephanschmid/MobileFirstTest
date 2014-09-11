define(["jquery"], function($) {
    return {
		// initialize the parameters
        init: function(animatableClass, animClassPrefix, delta, intervalTime) {

			if(animatableClass) { this.animatableClass = animatableClass }
			if(animClassPrefix) { this.animClassPrefix = animClassPrefix }
			if(delta) { this.delta = delta }
			if(intervalTime) { this.intervalTime = intervalTime }

			this.prepare();

        },
		// Parameters
		animatableClass: 'animatable',
		animClassPrefix: 'anim-',
		delta: 150,
		intervalTime: 1000,

		// Variables
		animatables: [],
		windowHeight: null,
		bodyScrollTop: null,

		prepare: function() {

			// set animatable elements
			this.animatables = $('.' + this.animatableClass);

			// height of the window
			this.windowHeight = $(window).height();

			// start interval function
			this.startInterval();

		},
		startInterval: function() {

			var that = this;

			setInterval(function() {

				that.bodyScrollTop = $('body').scrollTop();
				that.animatables.each(function() {

					var thisElm = $(this);
					var offset = thisElm.offset();
					var animStart = thisElm.data('anim-start');
					var elmHeight = thisElm.height();
					var elmScrollOffset = offset.top - that.bodyScrollTop;

					// animation starts whena part of the element is in the viewport
					if(animStart == 'window')
					{
						if(
							// Mathematic query for element Range
							(Math.abs(elmScrollOffset + elmHeight / 2) < that.delta)
								|| (Math.abs(that.windowHeight - elmScrollOffset - elmHeight / 2) < that.delta)
							)
						{
							that.animate(this);
						}
					}

					// animation starts when whole element is in the viewport
					if(animStart == 'fullscreen')
					{
						if(
							// Mathematic query for element Range
							(Math.abs(elmScrollOffset) < that.delta)
								|| (Math.abs(that.windowHeight - elmScrollOffset - elmHeight) < that.delta)
							)
						{
							that.animate(this);
						}
					}

					// animation starts when element is in the center of the viewport
					if(animStart == 'center')
					{
						// Mathematic query for element Range
						if(Math.abs(that.windowHeight / 2 - elmScrollOffset - elmHeight / 2) < that.delta)
						{
							that.animate(this);
						}
					}
				});

			}, this.intervalTime);

		},
		animate: function(elm) {

			var bodyElm = $('body');
			var bodyClassValues = bodyElm.attr('class');
			var elmAnimClass = $(elm).data('anim-class');

			// check if element has class for the animation, if false -> set it
			if(!bodyElm.hasClass(elmAnimClass))
			{
				bodyElm.addClass(elmAnimClass);
			}

			// check if body has an animatable class
			if(bodyClassValues)
			{
				// split all classes with a space
				var bodyClasses = bodyClassValues.split(' ');

				// loop through all elements
				for (var i = 0; i < bodyClasses.length; i++)
				{
					// check if bodyclass starts with animatable class AND is not used for current animation, if true -> remove it
					if(bodyClasses[i].indexOf(this.animClassPrefix) == 0 &&  bodyClasses[i] != elmAnimClass)
					{
						bodyElm.removeClass(bodyClasses[i]);
					}
				}
			}
		}
    }
});