function isEmpty(obj) {
    return Object.keys(obj).length === 0;
}

$(document).ready(function() {
    $(document).on('click', '.compare', function() {
        var id = $(this).attr('rel');
        var size_class = $('.card_check').length;
        var pro1 = $('#card_one').val();
        var pro2 = $('#card_two').val();
        console.log("size class =" + size_class);
        console.log("id =" + id);

        if(size_class < 1){
            console.log("IN HERE");
            $(".compare_card"+id).addClass("card_check");
            if(isEmpty(pro1)) {
                $('#card_one').val(id);
            }
        } else if(size_class < 2) {
            console.log("IN HERE SECOND");
            if(!$(".compare_card"+id).hasClass("card_check")) {
                $(".compare_card"+id).addClass("card_check")
                if(isEmpty(pro1)) {
                    $('#card_one').val(id);
                } else
                if(isEmpty(pro2)) {
                    $('#card_two').val(id);
                }
                $('#btn_compare').show();
            } else {
                $(".compare_card"+id).removeClass("card_check");
                $('#btn_compare').hide();
                if(JSON.stringify(pro1).replace(/['"]+/g, '') === id) {
                    console.log("IN HERE pro");
                    pro1 = $('#card_one').val('');
                }  else {
                    console.log("IN HERE pro2");
                    pro2 = $('#card_two').val('');
                }
            }
            
        } else {
            console.log("IN HERE 3");
            if($(".compare_card"+id).hasClass("card_check")) {
                $(".compare_card"+id).removeClass("card_check");
                $('#btn_compare').hide();
                console.log("HERE" + JSON.stringify(pro1));
                var test = JSON.stringify(pro1).replace(/['"]+/g, '');
                console.log("TEST:" + test);
                if(JSON.stringify(pro1).replace(/['"]+/g, '') === id) {
                    console.log("IN HERE pro");
                    pro1 = $('#card_one').val('');
                } 
                else {
                    console.log("IN HERE pro2");
                    pro2 = $('#card_two').val('');
                }

            } else {
                alert("You have already selected the maximum of 2 items to compare");
            }
        }
    });
});