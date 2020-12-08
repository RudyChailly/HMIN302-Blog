const $ = require('jquery');

/*function reportCommentOnSubmit(comment) {
    $('#commentTargetId').val(comment);
}*/
$('.reportCommentButton').click(function (){
    console.log("REPORT COMMENT : "+this.id.split('-')[1]);
    $('#report_comment_target').val(this.id.split('-')[1]);
    //$('#commentReportModal').show();
})