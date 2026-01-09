var ComponentsNoUiSliders = function() {


    var demo1 = function() {
        $('#slider_0').noUiSlider({
            direction: (Metronic.isRTL() ? "rtl" : "ltr"),
            start: 40,
            connect: "lower",
            range: {
                'min': 0,
                'max': 100
            }
        });
    }

    var demo2 = function() {
        $("#slider_1").noUiSlider({
            direction: (Metronic.isRTL() ? "rtl" : "ltr"),
            start: [20, 80],
            range: {
                min: 0,
                max: 100
            },
            connect: true,
            handles: 2
        });
    }

    var demo3 = function() {
        // slider 2
        $("#nonlinear").noUiSlider({
            connect: true,
            behaviour: 'tap',
            start: [500, 4000],
            range: {
                // Starting at 500, step the value by 500,
                // until 4000 is reached. From there, step by 1000.
                'min': [0],
                '10%': [500, 500],
                '50%': [4000, 1000],
                'max': [10000]
            }
        });

        // Write the CSS 'left' value to a span.
        function leftValue(value, handle, slider) {
            $(this).text(handle.parent()[0].style.left);
        }

        // Bind two elements to the lower handle.
        // The first item will display the slider value, 
        // the second shows how far the handle moved
        // from the left edge of the slider.
        $("#nonlinear").Link('lower').to($('#lower-value'));
        $("#nonlinear").Link('lower').to($('#lower-offset'), leftValue);


        // Do the same for the upper handle.
        $("#nonlinear").Link('upper').to($('#upper-value'));
        $("#nonlinear").Link('upper').to($('#upper-offset'), leftValue);
    }

    var demo4 = function() {
        // Store the locked state and slider values.
        var lockedState = false,
            values = [10, 10, 10],
            slider1 = $("#slider1"),
            slider2 = $("#slider2");
            slider3 = $("#slider3");
            slider4 = $("#slider4");
            slider5 = $("#slider5");
            slider6 = $("#slider6");
            slider7 = $("#slider7");

        // When the button is clicked, the locked
        // state is inverted.
        $("#slider2-btn").click(function() {
            lockedState = !lockedState;
            $(this).text(lockedState ? 'unlock' : 'lock');
        });

        function crossUpdate(value, handle, slider) {

            // If the sliders aren't interlocked, don't
            // cross-update.
            if (!lockedState) return;

            // Select whether to increase or decrease
            // the other slider value.
            var lValue = slider1.is(slider) ? 1 : 0,
                hValue = lValue ? 0 : 1;

            // Modify the slider value.
            value -= (values[hValue] - values[lValue]);

            // Set the value
            $(this).val(value);
        }

        slider1.noUiSlider({
            start: 10,

            // Disable animation on value-setting,
            // so the sliders respond immediately.
            animate: false,
            range: {
                min: 10,
                max: 100
            }
        });

        slider2.noUiSlider({
            start: 10,
            animate: false,
            range: {
                min: 10,
                max: 100
            }
        });
        
        slider3.noUiSlider({
            start: 10,
            animate: false,
            range: {
                min: 10,
                max: 100
            }
        });
        slider4.noUiSlider({
            start: 10,
            animate: false,
            range: {
                min: 10,
                max: 100
            }
        });
        
        slider5.noUiSlider({
            start: 10,
            animate: false,
            range: {
                min: 10,
                max: 100
            }
        });
        
        slider6.noUiSlider({
            start: 10,
            animate: false,
            range: {
                min: 10,
                max: 100
            }
        });
        
        slider7.noUiSlider({
            start: 10,
            animate: false,
            range: {
                min: 10,
                max: 100
            }
        });

        $(".slider").on('set', function() {

            // The .val() function returns a string,
            // but we wan't to do substractions, so
            // convert the values to numbers.
            values = [
                Number(slider1.val()),
                Number(slider2.val()),
                Number(slider3.val()),
                Number(slider4.val()),
                Number(slider5.val()),
                Number(slider6.val()),
                Number(slider7.val())
            ];
        });

        // The value will be send to the other slider,
        // using a custom function as the serialization
        // method. The function uses the global 'lockedState'
        // variable to decide whether the other slider is updated.

        slider1.Link('lower').to(slider2, crossUpdate);
        slider1.Link('lower').to($("#slider1-span"));

        slider2.Link('lower').to(slider3, crossUpdate);
        slider2.Link('lower').to($("#slider2-span"));
        
        slider3.Link('lower').to(slider4, crossUpdate);
        slider3.Link('lower').to($("#slider3-span"));
        
        slider4.Link('lower').to(slider5, crossUpdate);
        slider4.Link('lower').to($("#slider4-span"));
        
        slider5.Link('lower').to(slider6, crossUpdate);
        slider5.Link('lower').to($("#slider5-span"));
        
        slider6.Link('lower').to(slider7, crossUpdate);
        slider6.Link('lower').to($("#slider6-span"));
        
        slider7.Link('lower').to(slider1, crossUpdate);
        slider7.Link('lower').to($("#slider7-span"));

    }

    var demo5 = function() {

        function timestamp(str){
            return new Date(str).getTime();   
        }

        // Create a list of day and monthnames.
        var
            weekdays = [
                "Sunday", "Monday", "Tuesday",
                "Wednesday", "Thursday", "Friday",
                "Saturday"
            ],
            months = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
            ];

        // Append a suffix to dates.
        // Example: 23 => 23rd, 1 => 1st.
        function nth(d) {
            if (d > 3 && d < 21) return 'th';
            switch (d % 10) {
                case 1:
                    return "st";
                case 2:
                    return "nd";
                case 3:
                    return "rd";
                default:
                    return "th";
            }
        }

        // Create a string representation of the date.
        function formatDate(date) {
            return weekdays[date.getDay()] + ", " +
                date.getDate() + nth(date.getDate()) + " " +
                months[date.getMonth()] + " " +
                date.getFullYear();
        }

        // Write a date as a pretty value.
        function setDate(value) {
            $(this).html(formatDate(new Date(+value)));
        }

        $("#slider-date").noUiSlider({
            // Create two timestamps to define a range.
            range: {
                min: timestamp('2010'),
                max: timestamp('2016')
            },

            // Steps of one week
            step: 7 * 24 * 60 * 60 * 1000,

            // Two more timestamps indicate the handle starting positions.
            start: [timestamp('2011'), timestamp('2015')],

            // No decimals
            format: wNumb({
                decimals: 0
            })
        });

        $("#slider-date").Link('lower').to($("#event-start"), setDate);

        $("#slider-date").Link('upper').to($("#event-end"), setDate);


    }

    var demo6 = function() {
        $('#soft').noUiSlider({
            start: 50,
            range: {
                min: 0,
                max: 100
            }
        });

        $('#soft').noUiSlider_pips({
            mode: 'values',
            values: [20, 80],
            density: 4
        });

        $('#soft').on('set', function ( event, value ) {
            if ( value < 20 ) {
                $(this).val(20);
            } else if ( value > 80 ) {
                $(this).val(80);
            }
        });

    }

    return {
        //main function to initiate the module
        init: function() {
            demo1();
            demo2();
            demo3();
            demo4();
            demo5();
            demo6();
        }

    };

}();