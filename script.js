// Serialnumber Dropdownmenü
$(document).ready(function(){
    $("select.dropdown_sn").change(function(){
    var selected_sn = $(this).children("option:selected").val();
    $.getJSON("https://www.simpli-biits.ch/db_call.php", {selected_sn: selected_sn}, function(data){
        $('#sn_res').val(data['serialnumber']);
        $('#man_res').val(data['manufacturer']);
        $('#mod_res').val(data['model']);
        $('#size_res').val(data['size']);
        $('#color_res').val(data['color']);
        $('#year_res').val(data['year']);
        // MGP General Abschnitt ReadOnly
        $('#sn_res_ro').val(data['serialnumber']);
        $('#man_res_ro').val(data['manufacturer']);
        $('#mod_res_ro').val(data['model']);
        $('#size_res_ro').val(data['size']);
        $('#color_res_ro').val(data['color']);
        $('#year_res_ro').val(data['year']);
        });
    });
});