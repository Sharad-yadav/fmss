$(document).ready(function () {
    $('#faculty').select2({
        placeholder: 'Select Semester',
        allowClear: true,
    });
    $('#semester').select2({
        placeholder: 'Select Semester',
        allowClear: true,
    });
    $('#subject').select2({
        placeholder: 'Select Semester',
        allowClear: true,
    });
    $('#section').select2({
        placeholder: 'Select Section',
        allowClear: true,
    });

    $('#faculty').change(function () {
        var facultyId = $(this).val();
        getSemesterByFaculty(facultyId);
    });
    $('#semester').change(function () {
        var semesterId = $(this).val();
            getSectionBySemester(semesterId);
            getSubjectBySemester(semesterId);
    });
});

function getFaculties(defaultSelected = null) {
    var faculties = $('#faculty').select2({
        placeholder: 'Select Faculty',
        allowClear: true,
        ajax: {
            url: "/general/all-faculties",
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
        $.each(defaultSelected, function (key, data) {
            var option = new Option(data.text, data.id, true, true);
            faculties.append(option);
        })
        faculties.trigger('change');
    }
}

function getSemesterByFaculty(facultyId, defaultSelected = null) {
    var semesters = $('#semester').select2({
        placeholder: 'Select Semester',
        allowClear: true,
        ajax: {
            url: "/general/faculty/" + facultyId + '/semesters',
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
        $.each(defaultSelected, function (key, data) {
            var option = new Option(data.text, data.id, true, true);
            semesters.append(option);
        })
        semesters.trigger('change');
    }
}


function getSectionBySemester(semesterId, defaultSelected = null) {
    var sections = $('#section').select2({
        placeholder: 'Select Section',
        allowClear: true,
        ajax: {
            url: "/general/semester/" + semesterId + '/sections',
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
        $.each(defaultSelected, function (key, data) {
            var option = new Option(data.text, data.id, true, true);
            sections.append(option);
        })
        sections.trigger('change');
    }
}

function getSubjectBySemester(semesterId, defaultSelected = null) {
    var subjects = $('#subject').select2({
        placeholder: 'Select Subject',
        allowClear: true,
        ajax: {
            url: "/general/semester/" + semesterId + '/subjects',
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
        $.each(defaultSelected, function (key, data) {
            var option = new Option(data.text, data.id, true, true);
            subjects.append(option);
        })
        subjects.trigger('change');
    }
}
