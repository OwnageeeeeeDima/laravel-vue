let profile = document.getElementById('profile')
    .addEventListener('click', function () {
        this.classList.toggle('active')
    })




$(function () {
    $("#burger").on("click", function () {
        $("#sidebar").addClass("open");


    });
    $(document).on("click", function (e) {
        if ($(e.target).is("#sidebar") == false && $(e.target).is('#burger') == false) {
            $("#sidebar").removeClass("open");
        }
    });
});
