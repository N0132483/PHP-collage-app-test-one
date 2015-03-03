window.onload = function () {
    //-------------------------------------------------------------------------
    // define an event listener for the '#createCourseForm'
    //-------------------------------------------------------------------------
    var createCourseForm = document.getElementById('createCourseForm');
    if (createCourseForm !== null) {
        createCourseForm.addEventListener('submit', validateCourseForm);
    }

    function validateCourseForm(event) {
        var form = event.target;

        if (!confirm("Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // define an event listener for the '#createCourseForm'
    //-------------------------------------------------------------------------
    var editCourseForm = document.getElementById('editCourseForm');
    if (editCourseForm !== null) {
        editCourseForm.addEventListener('submit', validateCourseForm);
    }

    //-------------------------------------------------------------------------
    // define an event listener for any '.deleteCourse' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteCourse');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this course?")) {
            event.preventDefault();
        }
    }

};