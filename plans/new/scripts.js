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

    $(".pane[data-index=3] .button").click(function() {
        $(".pane[data-index=3] .button").removeClass("active");

        if ($(this).data("leader") === 0) {
            $(".pane[data-index=3] .button[data-leader=0]").addClass("active");
            $(".pane[data-index=3] .login-warning").removeClass("active");
        } else {
            $(".pane[data-index=3] .button[data-leader=1]").addClass("active");
            $(".pane[data-index=3] .login-warning").addClass("active");
        }
    });

    $(".add-checklist-item").click(function() {
        addItem($(this));
    });

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
        var permits = "";
        var tasks = "";

        $(".permit-checklist .checklist-item").each(function(index, value) {
            if ($("input", value).val().length > 0) {
                if (index == 0) permits += $("input", value).val();
                else permits += "[-]" + $("input", value).val();
            }
        });

        $(".task-checklist .checklist-item").each(function(index, value) {
            if ($("input", value).val().length > 0) {
                if (index == 0) tasks += $("input", value).val();
                else tasks += "[-]" + $("input", value).val();
            }
        });

        var form = {
            leader: ($(".pane .button.active").data("leader") === 1) ? true : false,
            title: $("input[name=title]").val(),
            idea: $("[name=idea]").val(),
			location: $("[name=location]").val(),
            permits: permits,
            tasks: tasks,
			date: $("input[name=date]").val(),
            submit: "true"
        };

        console.log(form);

        $.post("../../helpers/plans/new.php", form, function(data) {

            if (data == -1) {
                // login required
                $(elem).parents(".pane").addClass("done").removeClass("active");
                $(".pane[data-index=-1]").addClass("active");
            } else {
                // successfully inserted idea
                $(elem).parents(".pane").addClass("done").removeClass("active");
                $(".pane[data-index=-2]").addClass("active");
            }
        }, "text");
    }

    function addItem(elem) {
        $(elem).siblings().prepend('<div class="checklist-item"><input type="text" placeholder="Enter another item here." /></div>');
    }

    function traverse(element) {
        $(element).parent().next().children("input").focus();
    }



});
