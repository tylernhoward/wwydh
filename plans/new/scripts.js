jQuery(document).ready(function($) {

    $(".advance").click(function() {
        var elem = $(this);
        var target = $(this).data("target");

        if (target == -1) {
            submitPlan(elem);
        } else {
            $(this).parents(".pane").addClass("done").removeClass("active");
            $(".pane[data-index=" + target + "]").addClass("active");
        }
    });

    $(".login input[type=submit]").click(function() {
        var elem = $(this);
        doLogin(elem);
    });

    $(".retreat").click(function() {
        var target = $(this).data("target");

        $(this).parents(".pane").removeClass("active");
        $(".pane[data-index=" + target + "]").removeClass("done").addClass("active");
    });

    // $(".pane[data-index=6] .button").click(function() {
    //     $(".pane[data-index=6] .button").removeClass("active");
    //
    //     if ($(this).data("leader") === 0) {
    //         $(".pane[data-index=6] .button[data-leader=0]").addClass("active");
    //         $(".pane[data-index=6] .login-warning").removeClass("active");
    //     } else {
    //         $(".pane[data-index=6] .button[data-leader=1]").addClass("active");
    //         $(".pane[data-index=6] .login-warning").addClass("active");
    //     }
    // });

    $(".add-checklist-item").click(function() {
        addItem($(this));
    });

    // $(".checklist-item").keyup(function(event){
    // if(event.keyCode == 13){
    //     $(".add-checklist-item").click();
    // }
    // });

    $(".accordion").click(function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block" || panel.style.display === "") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });

    function doLogin(elem) {
        var login = {
            username: $(".login input[name=user]").val(),
            password: $(".login input[name=pass]").val()
        };

        $.post("../../helpers/standalone-login.php", login, function(data) {

            if (data == 1) {
                submitPlan(elem);
            } else {
                // bad login information
                alert("Login information incorrect! Please try again!");
            }
        }, "text");
    }

    function submitPlan(elem) {
        // handle form submission
        var location_requirements = "";
        var contributions = "";

        $(".location-checklist .checklist-item").each(function(index, value) {
            if ($("input", value).val().length > 0) {
                if (index == 0) location_requirements += $("input", value).val();
                else location_requirements += "[-]" + $("input", value).val();
            }
        });

        $(".checklist .checklist-item").each(function(index, value) {
            if ($("input", value).val().length > 0) {
                if (index == 0) contributions += $("input", value).val();
                else contributions += "[-]" + $("input", value).val();
            }
        });

        var form = {
            leader: ($(".pane .button.active").data("leader") === 1) ? true : false,
            title: $("input[name=title]").val(),
            description: $("textarea").val(),
            category: $("[name=category]").val(),
            location_requirements: location_requirements,
            contributions: contributions,
            submit: "true"
        };

        console.log(form);

        $.post("../../helpers/ideas/new.php", form, function(data) {

            // if (data == -1) {
                // login required
                $(elem).parents(".pane").addClass("done").removeClass("active");
                $(".pane[data-index=-1]").addClass("active");
            // } else {
            //     // successfully inserted plans
            //     $(elem).parents(".pane").addClass("done").removeClass("active");
            //     $(".pane[data-index=-2]").addClass("active");
            // }
        }, "text");
    }

    function addItem(elem) {
        $(elem).siblings().prepend('<div class="checklist-item"><input type="text" placeholder="Enter another requirement here." /></div>');
    }

    function traverse(element) {
        $(element).parent().next().children("input").focus();
    }



});
