$(function () {

    var competencesPath = Routing.generate('profile_competences');
    var competences = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
            url: competencesPath,
            filter: function (list) {
                return $.map(list, function (competence) {
                    return {name: competence};
                });
            },
            cache: false
        }
    });
    competences.initialize();

    $('#appbundle_profile_competencesTags').tagsinput({
        confirmKeys: [13, 188, 44],
        typeaheadjs: {
            name: 'competences',
            displayKey: 'name',
            valueKey: 'name',
            source: competences.ttAdapter()
        }
    });

    $('.bootstrap-tagsinput input').on('keypress', function (e) {
        if (e.keyCode == 13) {
            e.keyCode = 188;
            e.preventDefault();
        }
    });
});