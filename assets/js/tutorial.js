var wizardLength = $("#tutorial-modal").find('section').length;



		$(document).ready(function(){
            function animate(elements, callback) {
            /* get: array with hidden elements to be displayed, callback function */
                var i = 0;
                (function iterate() {
                    if (i < elements.length) {
                        elements[i].style.display = "inline-flex"; // show
                        animateNode(elements[i], iterate); 
                        i++;
                    } else
                    {
                        callback();
                    }
                })();
                function animateNode(element, callback) {
                    var pieces = [];
                    if (element.nodeType==1) {
                        while (element.hasChildNodes())
                            pieces.push(element.removeChild(element.firstChild));
                        setTimeout(function childStep() {
                            if (pieces.length) {
                                animateNode(pieces[0], childStep); 
                                element.appendChild(pieces.shift());
                            } else
                            {
                                callback();
                            }
                        }, 1000/10);
                    } else if (element.nodeType==3) {
                        pieces = element.data.match(/.{0,2}/g); // 2: Number of chars per frame
                        element.data = "";
                        (function addText(){
                            element.data += pieces.shift();
                            setTimeout(pieces.length
                                ? addText
                                : callback,
                              1000/10);
                        })();
                    }
                }
            }
            animate($("#code-animation").children());   

            $("#restart-code-animation").click(function(){
                $('#steps #clone-container #code-animation').css("display","none");
                $('#steps #clone-container #code-animation').css("display","block");
                $('#steps #clone-container #code-animation').remove().clone().appendTo('#steps #clone-container');
                $('#steps #clone-container #code-animation *').css("display","none");
                animate($("#code-animation").children());
            }); 
	});


        $("#steps").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slide",
    autoFocus: true,
    enableKeyNavigation: true,
    stepsOrientation: "horizontal",
    transitionEffectSpeed: 400,
    onFinished: function (event, currentIndex) {$('#tutorial-modal').modal('hide');},
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