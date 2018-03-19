var wizardLength = $("#goal-modal").find('section').length;


        $("#steps").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slide",
    autoFocus: true,
    enableKeyNavigation: true,
    stepsOrientation: "horizontal",
    transitionEffectSpeed: 400,
    onFinished: function (event, currentIndex) {$('#goal-modal').modal('hide');},
    enableAllSteps: false,
    onInit: function(wizard){ var steps = getSteps(wizard);
    var count = 1;
    for (var i = 0 ; i <= steps.length; i++)
    {
        count = count + 1;
    }
    return count;},
    titleTemplate: '<span class="number">#index#/'+wizardLength+' </span> #title#',

    labels: {
        cancel: "Cancel",
        current: "Page ",
        pagination: "Pagination",
        finish: "Finish",
        next: "Next",
        previous: "Back",
        loading: "Loading ..."
    }

});

    $("#steps .steps").appendTo("#steps");
    $("#steps .content").appendTo("#steps");