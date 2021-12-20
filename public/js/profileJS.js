$(document).ready(function() {
    var user_image = $(".user-image").attr("src");
    var trip_images_count = $("#trips_images").children('img').length;
    $("#edit_trips").click(function() {
        $(".pop-ups").css("display", "block")
    })

    $("#close_edittrips_button").click(function() {
        $(".pop-ups").css("display", "none");
    })

    $(".profile-settings img").click(function() {
        $(".profile-settings-dropdown ul").fadeToggle(500);
    })
    $(".profile-settings i").click(function() {
        $(".profile-settings-dropdown ul").fadeToggle(500);
    })

    $("#edit-profile-photo").click(function() {
        $(".pop-ups-2").fadeIn(500);

        // take the profile image and put it in the pop up
        $(".editable-photo").attr("src", user_image);
    })
    $(".close-edit-photo-popup").click(function() {
        $(".pop-ups-2").fadeOut(500);
    })

    // when Click On THE button the input of edititng photo will run

    $("#for-edit-photo-input").click(function() {
        $("#edit-profile-photo-input").click();
    })

    $("#edit-langs-btn").click(function() {
        $(".langs-pop-up").fadeIn(400);
    });
    $(".edit-langs-close-button").click(function() {
        $(".langs-pop-up").fadeOut(400);
    });
    $("#edit-Expertise-btn").click(function() {
        $(".Expertise-pop-up").fadeIn(400);
    });
    $(".edit-Expertise-close-button").click(function() {
        $(".Expertise-pop-up").fadeOut(400);
    });

    $(".edit-trip").click(function() {
        $(".pop-ups").fadeOut(500).delay(500);
        $(".edit-trip-pop-up").fadeIn(500);
    });

    $("#close_edittrip_button").click(function() {
        $(".edit-trip-pop-up").fadeOut(500);
    });

    $(".add-trip").click(function() {
        $(".pop-ups").fadeOut(500).delay(500);
        $(".add-trip-pop-up").fadeIn(500);
    });

    $("#close_addtrip_button").click(function() {
        $(".add-trip-pop-up").fadeOut(500);
    });

    $("#edit-profile-description").click(function() {
        $(".description-pop-up").fadeIn(500);
    });

    $(".edit-description-close-button").click(function() {
        $(".description-pop-up").fadeOut(500);
    });

    class CustomSelect {
        constructor(originalSelect) {
            this.originalSelect = originalSelect;
            this.customSelect = document.createElement("div");
            this.customSelect.classList.add("select");

            this.originalSelect.querySelectorAll("option").forEach((optionElement) => {
                const itemElement = document.createElement("div");

                itemElement.classList.add("select__item");
                itemElement.textContent = optionElement.textContent;
                this.customSelect.appendChild(itemElement);

                if (optionElement.selected) {
                    this._select(itemElement);
                }

                itemElement.addEventListener("click", () => {
                    if (
                        this.originalSelect.multiple &&
                        itemElement.classList.contains("select__item--selected")
                    ) {
                        this._deselect(itemElement);
                    } else {
                        this._select(itemElement);
                    }
                });
            });

            this.originalSelect.insertAdjacentElement("afterend", this.customSelect);
            this.originalSelect.style.display = "none";
        }

        _select(itemElement) {
            const index = Array.from(this.customSelect.children).indexOf(itemElement);

            if (!this.originalSelect.multiple) {
                this.customSelect.querySelectorAll(".select__item").forEach((el) => {
                    el.classList.remove("select__item--selected");
                });
            }

            this.originalSelect.querySelectorAll("option")[index].selected = true;
            itemElement.classList.add("select__item--selected");
        }

        _deselect(itemElement) {
            const index = Array.from(this.customSelect.children).indexOf(itemElement);

            this.originalSelect.querySelectorAll("option")[index].selected = false;
            itemElement.classList.remove("select__item--selected");
        }
    }

    document.querySelectorAll(".custom-select").forEach((selectElement) => {
        new CustomSelect(selectElement);
    });


    var trips_activities_template = '<div class="add-activities">\
    <input type="text" placeholder="Activity Title" name="act-title-1">\
    <input type="number" placeholder="Activity Price" name="act-price-1">\
    </div>';

    var counter_act = 0;
    var widthSaveButton = -110;

    $("#add-activity").click(function() {
        counter_act++;
        var trips_activities_template = '<div class="add-activities">\
    <input type="text" required placeholder="Activity Title" name="act-title-' + counter_act + '">\
    <input type="number" required placeholder="Activity Price" name="act-price-' + counter_act + '">\
    </div>';
        $("#save-add-trips").css("bottom", widthSaveButton)
        document.getElementById("addd-trip").innerHTML += trips_activities_template;
        widthSaveButton += -110;

    })





});