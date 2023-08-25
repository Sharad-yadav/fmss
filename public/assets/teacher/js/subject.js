$(document).ready(function () {
    $('#faculty').change(function () {
        var facultyId = $(this).val();
        getSemesterByFaculty(facultyId);
    });
    $('#semester').change(function () {
        var semesterId = $(this).val();
        getSubjectBySemester(semesterId);
    });
});

function getSemesterByFaculty(facultyId, defaultSelected = null) {
    var semesters = $('#semester').select2({
        placeholder: 'Select Semester',
        allowClear: true,
        ajax: {
            url: "/teacher/faculty/" + facultyId + '/semesters',
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: $.map(data, function (obj) {
                        return {
                            id: obj.id,
                            text: obj.text
                        };
                    })
                }
            }
        },
    }).val(defaultSelected).trigger('change');

    if (defaultSelected) {
        _.each(defaultSelected, function (data) {
            var option = new Option(data.text, data.id, true, true);
            semesters.append(option);
        })
        semesters.trigger('change');
    }
}

function getSubjectBySemester(semesterId, defaultSelected = null) {
    var subjects = $('#subject').select2({
        placeholder: 'Select Subject',
        allowClear: true,
        ajax: {
            url: "/teacher/semester/" + semesterId + '/subjects',
            'dataType': 'json',
            processResults: function (data) {
                return {
                    results: $.map(data, function (obj) {
                        return {
                            id: obj.id,
                            text: obj.text
                        };
                    })
                }
            }
        },
    }).val(defaultSelected).trigger('change');

    if (defaultSelected) {
        _.each(defaultSelected, function (data) {
            var option = new Option(data.text, data.id, true, true);
            subjects.append(option);
        })
        subjects.trigger('change');
    }
}
