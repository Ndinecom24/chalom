



jQuery(document).ready(function ($) {

    var stepsSlider = document.getElementsByClassName('steps-slider')[0];
    var input0 = document.getElementsByClassName('input-with-keypress-0')[0];

    var inputs = [input0];


noUiSlider.create(stepsSlider, {
    start: 60,

    // Disable animation on value-setting,
    // so the sliders respond immediately.
    animate: false,
    range: {
        min: 50,
        max: 100
    }
});

stepsSlider.noUiSlider.on('update', function(values, handle) {
    inputs[handle].value = values[handle];
});

// Listen to keydown events on the input field.
inputs.forEach(function(input, handle) {

    input.addEventListener('change', function() {
        stepsSlider.noUiSlider.setHandle(handle, this.value);
    });

    input.addEventListener('keydown', function(e) {

        var values = stepsSlider.noUiSlider.get();
        var value = Number(values[handle]);

        // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
        var steps = stepsSlider.noUiSlider.steps();

        // [down, up]
        var step = steps[handle];

        var position;

        // 13 is enter,
        // 38 is key up,
        // 40 is key down.
        switch (e.which) {

            case 13:
                stepsSlider.noUiSlider.setHandle(handle, this.value);
                break;

            case 38:

                // Get step to go increase slider value (up)
                position = step[1];

                // false = no step is set
                if (position === false) {
                    position = 1;
                }

                // null = edge of slider
                if (position !== null) {
                    stepsSlider.noUiSlider.setHandle(handle, value + position);
                }

                break;

            case 40:

                position = step[0];

                if (position === false) {
                    position = 1;
                }

                if (position !== null) {
                    stepsSlider.noUiSlider.setHandle(handle, value - position);
                }

                break;
        }
    });
});






});



jQuery(document).ready(function ($) {
var stepsSliderSecond = document.getElementsByClassName('amountSlider')[0];
var input1 = document.getElementsByClassName('amountInput')[0];

var inputs = [input1];

noUiSlider.create(stepsSliderSecond, {
    start: 3000,

    // Disable animation on value-setting,
    // so the sliders respond immediately.
    animate: false,
    range: {
        min: 1000,
        max: 5000
    },
    format: wNumb({
        decimals: 0,
        thousand: ',',
        prefix: ' $'
    })
});

stepsSliderSecond.noUiSlider.on('update', function(values, handle) {
    inputs[handle].value = values[handle];
});

// Listen to keydown events on the input field.
inputs.forEach(function(input, handle) {

    input.addEventListener('change', function() {
        stepsSliderSecond.noUiSlider.setHandle(handle, this.value);
    });

    input.addEventListener('keydown', function(e) {

        var values = stepsSliderSecond.noUiSlider.get();
        var value = Number(values[handle]);

        // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
        var steps = stepsSliderSecond.noUiSlider.steps();

        // [down, up]
        var step = steps[handle];

        var position;

        // 13 is enter,
        // 38 is key up,
        // 40 is key down.
        switch (e.which) {

            case 13:
                stepsSliderSecond.noUiSlider.setHandle(handle, this.value);
                break;

            case 38:

                // Get step to go increase slider value (up)
                position = step[1];

                // false = no step is set
                if (position === false) {
                    position = 1;
                }

                // null = edge of slider
                if (position !== null) {
                    stepsSliderSecond.noUiSlider.setHandle(handle, value + position);
                }

                break;

            case 40:

                position = step[0];

                if (position === false) {
                    position = 1;
                }

                if (position !== null) {
                    stepsSliderSecond.noUiSlider.setHandle(handle, value - position);
                }

                break;
        }
    });
});
});




jQuery(document).ready(function ($) {
var stepsSliderThird = document.getElementsByClassName('yearSlider') [0];
var input2 = document.getElementsByClassName('yearInput') [0];

var inputs = [input2];

noUiSlider.create(stepsSliderThird, {
    start: 2,

    // Disable animation on value-setting,
    // so the sliders respond immediately.
    animate: false,
    range: {
        min: 1,
        max: 10
    },
    format: wNumb({
        decimals: 0

    })

});

stepsSliderThird.noUiSlider.on('update', function(values, handle) {
    inputs[handle].value = values[handle];
});

// Listen to keydown events on the input field.
inputs.forEach(function(input, handle) {

    input.addEventListener('change', function() {
        stepsSliderThird.noUiSlider.setHandle(handle, this.value);
    });

    input.addEventListener('keydown', function(e) {

        var values = stepsSliderThird.noUiSlider.get();
        var value = Number(values[handle]);

        // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
        var steps = stepsSliderThird.noUiSlider.steps();

        // [down, up]
        var step = steps[handle];

        var position;

        // 13 is enter,
        // 38 is key up,
        // 40 is key down.
        switch (e.which) {

            case 13:
                stepsSliderThird.noUiSlider.setHandle(handle, this.value);
                break;

            case 38:

                // Get step to go increase slider value (up)
                position = step[1];

                // false = no step is set
                if (position === false) {
                    position = 1;
                }

                // null = edge of slider
                if (position !== null) {
                    stepsSliderThird.noUiSlider.setHandle(handle, value + position);
                }

                break;

            case 40:

                position = step[0];

                if (position === false) {
                    position = 1;
                }

                if (position !== null) {
                    stepsSliderThird.noUiSlider.setHandle(handle, value - position);
                }

                break;
        }
    });
});

});